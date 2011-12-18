<?php

/**
 * This is the model class for table "tbl_showing".
 *
 * The followings are the available columns in table 'tbl_showing':
 * @property string $showing_id
 * @property string $film_id
 * @property string $screen_id
 * @property string $start_date
 * @property string $start_time
 * @property string $price_id
 *
 * The followings are the available model relations:
 * @property Booking[] $bookings
 * @property Price $price
 * @property Film $film
 * @property Screen $screen
 */
class Showing extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Showing the static model class
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
		return 'tbl_showing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('film_id, screen_id, start_date, start_time, price_id', 'required'),
			array('film_id, screen_id, price_id', 'length', 'max'=>10),
			array('start_time', 'date','format'=>'yyyy-MM-dd'),
			array('start_time', 'type', 'type'=>'time', 'timeFormat'=>'hh:mm'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('showing_id, film_id, screen_id, start_date, start_time, price_id', 'safe', 'on'=>'search'),
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
			'bookings' => array(self::HAS_MANY, 'Booking', 'showing_id'),
			'price' => array(self::BELONGS_TO, 'Price', 'price_id'),
			'film' => array(self::BELONGS_TO, 'Film', 'film_id'),
			'screen' => array(self::BELONGS_TO, 'Screen', 'screen_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'showing_id' => 'Showing',
			'film_id' => 'Film',
			'screen_id' => 'Screen',
			'start_date' => 'Start Date',
			'start_time' => 'Start Time',
			'price_id' => 'Price',
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

		$criteria->compare('showing_id',$this->showing_id,true);
		$criteria->compare('film_id',$this->film_id,true);
		$criteria->compare('screen_id',$this->screen_id,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('price_id',$this->price_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}