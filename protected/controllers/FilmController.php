<?php
Yii::import('application.vendors.*');
require_once('class.rotten_potatoes.php');
require_once('class.get.image.php');

class FilmController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform all other actions
				'actions'=>array('create','update','admin','delete','rt'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Film;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Film']))
		{
			$model->attributes=$_POST['Film'];
                        
            $rp = new rotten_potatoes(array("API_KEY" => Yii::app()->params['rtApiKey']));
            $movie = $rp->get_movie($_POST['Film']['rt_id']);
            
            $model->title=$movie->title;
            $model->year=$movie->year;
            $model->runtime=$movie->runtime;
            
			if($model->save()) {
                $image = new GetImage;
                $image->source = $movie->posters['detailed'];
                $image->save_to = 'images/posters/';
                $image->filename = $model->film_id;
                $image->download();

				$this->redirect(array('view','id'=>$model->film_id));
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
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

		if(isset($_POST['Film']))
		{
			$model->attributes=$_POST['Film'];
			if($model->save()) {
                $rp = new rotten_potatoes(array("API_KEY" => Yii::app()->params['rtApiKey']));
                $movie = $rp->get_movie($_POST['Film']['rt_id']);
                
                $image = new GetImage;
                $image->source = $movie->posters['detailed'];
                $image->save_to = 'images/posters/';
                $image->filename = $model->film_id;
                $image->download();
                
				$this->redirect(array('view','id'=>$model->film_id));
            }
            
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
		$dataProvider=new CActiveDataProvider('Film');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
    
    public function actionRt()
	{
        $apikey = Yii::app()->params['rtApiKey'];
        $query = urlencode($_POST['Film']['title']);
        $endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/movies.json?q=' . $query . '&page_limit=5&page=1&apikey=' . $apikey;
        $session = curl_init($endpoint);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($session);
        curl_close($session);
        $movie = json_decode($data);
        if ($movie === NULL) {
            die('Error parsing json');
        } else {
            echo '<ul>';
            for ($i = 0; $i < count($movie->movies); $i++) {
                echo '<li><strong>'
                . $movie->movies[$i]->id . '</strong> ' 
                . $movie->movies[$i]->title . ' ('
                . $movie->movies[$i]->year
                . ')</li>';
            }
            echo '</ul>';
        }
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Film('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Film']))
			$model->attributes=$_GET['Film'];

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
		$model=Film::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='film-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
