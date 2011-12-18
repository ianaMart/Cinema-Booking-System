<?php

/**
 * This is the model class for table "tbl_screen".
 *
 * The followings are the available columns in table 'tbl_screen':
 * @property string $screen_id
 * @property string $screen
 *
 * The followings are the available model relations:
 * @property ScreenSeat[] $screenSeats
 * @property Showing[] $showings
 */
class Screen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Screen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_screen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('screen', 'required'),
			array('screen', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('screen_id, screen', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'screenSeats' => array(self::HAS_MANY, 'ScreenSeat', 'screen_id'),
			'showings' => array(self::HAS_MANY, 'Showing', 'screen_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'screen_id' => 'Screen',
			'screen' => 'Screen',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('screen_id',$this->screen_id,true);
		$criteria->compare('screen',$this->screen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}