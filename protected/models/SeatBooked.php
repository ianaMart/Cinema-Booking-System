<?php

/**
 * This is the model class for table "tbl_seat_booked".
 *
 * The followings are the available columns in table 'tbl_seat_booked':
 * @property string $seat_booked_id
 * @property string $booking_id
 * @property string $screen_seat_id
 *
 * The followings are the available model relations:
 * @property ScreenSeat $screenSeat
 * @property Booking $booking
 */
class SeatBooked extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SeatBooked the static model class
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
		return 'tbl_seat_booked';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('booking_id, screen_seat_id', 'required'),
			array('booking_id, screen_seat_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('seat_booked_id, booking_id, screen_seat_id', 'safe', 'on'=>'search'),
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
			'screenSeat' => array(self::BELONGS_TO, 'ScreenSeat', 'screen_seat_id'),
			'booking' => array(self::BELONGS_TO, 'Booking', 'booking_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'seat_booked_id' => 'Seat Booked',
			'booking_id' => 'Booking',
			'screen_seat_id' => 'Screen Seat',
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

		$criteria->compare('seat_booked_id',$this->seat_booked_id,true);
		$criteria->compare('booking_id',$this->booking_id,true);
		$criteria->compare('screen_seat_id',$this->screen_seat_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}