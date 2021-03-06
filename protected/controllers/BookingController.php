<?php

class BookingController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','getDatesShowing','getTimesShowing','getSeatsAvailable','calculateTotalPrice','calculatePrice','view'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','update','admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{        
        $data=Booking::model()->find('booking_id=:booking_id', array(':booking_id'=> $id));
        if ($data->user_id == Yii::app()->user->getId() || Yii::app()->user->getName() == 'admin') {
            $this->render('view',array(
                'model'=>$this->loadModel($id),
            ));
        } else
            throw new CHttpException(404,'The specified post cannot be found.');
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Booking;

		if(isset($_POST['showing_id']))
		{
            $no_of_seats_available = $this->actionGetNoOfSeatsAvailable($_POST['showing_id']);
            
            if ($no_of_seats_available > 0) {
                $model->user_id=Yii::app()->user->getId();
                $model->showing_id=$_POST['showing_id'];
                $model->no_of_seats_booked=$_POST['no_of_seats_booked'];
                $model->total_price=(BookingController::actionCalculatePrice($_POST['showing_id']) * $_POST['no_of_seats_booked']);
                if($model->save())
                    $this->redirect(array('view','id'=>$model->booking_id));
            }
            else
                throw new CHttpException(400,'Showing has no seats available. Sold out.');
		}
        
        $connection=Yii::app()->db;
        $sql='SELECT DISTINCT f.film_id, title
              FROM tbl_film AS f
              INNER JOIN tbl_showing AS s
              ON f.film_id=s.film_id
              WHERE s.start_date BETWEEN :start_date AND :end_date
              ORDER BY title ASC';
        
        $start_date=date("Y-m-d");
        $end_date = strtotime('+12 week', strtotime($start_date));
        $end_date = date('Y-m-d', $end_date);

        $command=$connection->createCommand($sql);
        $command->bindParam(":start_date",$start_date,PDO::PARAM_STR);
        $command->bindParam(":end_date",$end_date,PDO::PARAM_STR);
        $rows=$command->queryAll();

        $filmlist=CHtml::listData($rows,'film_id','title');

		$this->render('create',array(
			'model'=>$model,
            'filmlist'=>$filmlist
            
		));
	}
	
	public function actionGetDatesShowing()
	{
		$sql='SELECT start_date
		      FROM tbl_showing
			  WHERE film_id=:film_id
              AND start_date BETWEEN :start_date AND :end_date
			  ORDER BY start_date ASC';
        
        $start_date=date("Y-m-d");
        $end_date = strtotime('+12 week', strtotime($start_date));
        $end_date = date('Y-m-d', $end_date);
        
		$params=array(':film_id'=>(int) $_POST['film_id'], 'start_date'=>$start_date, ':end_date'=>$end_date);
		
		$data=Showing::model()->findAllBySql($sql,$params);
		
		$data=CHtml::listData($data,'start_date','start_date');
		echo '<option value="">Choose a date</option>';
		foreach($data as $value=>$name)
		{
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
		}
	}
	
	public function actionGetTimesShowing()
	{
		$sql='SELECT showing_id, start_time
		      FROM tbl_showing
			  WHERE film_id=:film_id
			  AND start_date=:start_date
			  ORDER BY start_time ASC';
		$params=array(':film_id'=>(int) $_POST['film_id'],':start_date'=>$_POST['start_date']);
		
		$data=Showing::model()->findAllBySql($sql,$params);
		
		$data=CHtml::listData($data,'showing_id','start_time');
		echo '<option value="">Choose a time</option>';
		foreach($data as $value=>$name)
		{
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
		}
	}
    
    public function actionGetSeatsAvailable()
	{
        $no_of_seats_available = $this->actionGetNoOfSeatsAvailable($_POST['showing_id']);
        
        if ($no_of_seats_available == 0) {
            //echo 'No seats available';
            echo '<option>No seats available</option>';
        }
        else if ($no_of_seats_available > 0) {
            $no_of_seats = array();
            $no_of_seats[] = 'Number of seats?';
            
            for ($i = 1; $i <= $no_of_seats_available && $i <= 9; $i++) {
                $no_of_seats[] = $i;
            }
            
            echo CHtml::dropDownList('no_of_seats_booked','', $no_of_seats, array('ajax' => array('type'=>'POST','url'=>CController::createUrl('calculateTotalPrice'),'update'=>'#price')));
        }
        else {
            echo 'Error';
        }
        
	}
    
    public function actionCalculateTotalPrice()
    {        
        if(isset($_POST['no_of_seats_booked']) && isset($_POST['showing_id']))
        {
            $totalPrice = $this->actionCalculatePrice($_POST['showing_id']) * $_POST['no_of_seats_booked'];
            echo number_format((float)$totalPrice, 2, '.', '');
        }
        else
            echo 'Error';
    }
    
    public function actionGetNoOfSeatsAvailable($showing_id)
	{
        $connection=Yii::app()->db;
        $sql='SELECT (seating_capacity - (IFNULL(SUM(no_of_seats_booked),0))) AS "Seats Available",
                     seating_capacity AS "Seating Capacity"
              FROM {{showing}} AS h
              INNER JOIN {{booking}} AS b
              ON h.showing_id = b.showing_id
              INNER JOIN {{screen}} AS c
              ON h.screen_id = c.screen_id
              WHERE h.showing_id = :showing';
        
        $command=$connection->createCommand($sql);
        $command->bindParam(":showing",$showing_id,PDO::PARAM_STR);
        $row=$command->queryRow();
        
        return $row['Seats Available'];    
	}
    
    public static function actionCalculatePrice($showing_id)
    {
        $connection=Yii::app()->db;
        $sql='SELECT price
              FROM {{price}} AS p
              INNER JOIN {{showing}} AS h
              ON h.price_id = p.price_id
              WHERE h.showing_id = :showing';
        
        $command=$connection->createCommand($sql);
        $command->bindParam(":showing",$showing_id,PDO::PARAM_STR);
        $row=$command->queryRow();
        
        return $row['price'];
    }
      

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Booking']))
		{
			$model->attributes=$_POST['Booking'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->booking_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Booking');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Booking('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Booking']))
			$model->attributes=$_GET['Booking'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Booking::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='booking-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
