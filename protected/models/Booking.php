<?php

/**
 * This is the model class for table "{{booking}}".
 *
 * The followings are the available columns in table '{{booking}}':
 * @property string $booking_id
 * @property string $user_id
 * @property string $showing_id
 * @property string $no_of_seats_booked
 * @property string $total_price
 *
 * The followings are the available model relations:
 * @property Showing $showing
 * @property User $user
 */
class Booking extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Booking the static model class
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
		return '{{booking}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, showing_id, no_of_seats_booked, total_price', 'required'),
			array('user_id, showing_id', 'length', 'max'=>10),
			array('no_of_seats_booked', 'length', 'max'=>1),
			array('total_price', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('booking_id, user_id, showing_id, no_of_seats_booked, total_price', 'safe', 'on'=>'search'),
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
			'showing' => array(self::BELONGS_TO, 'Showing', 'showing_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'booking_id' => 'Booking',
			'user_id' => 'User',
			'showing_id' => 'Showing',
			'no_of_seats_booked' => 'No Of Seats Booked',
			'total_price' => 'Total Price',
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

		$criteria->compare('booking_id',$this->booking_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('showing_id',$this->showing_id,true);
		$criteria->compare('no_of_seats_booked',$this->no_of_seats_booked,true);
		$criteria->compare('total_price',$this->total_price,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}