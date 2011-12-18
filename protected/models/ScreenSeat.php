<?php

/**
 * This is the model class for table "tbl_screen_seat".
 *
 * The followings are the available columns in table 'tbl_screen_seat':
 * @property string $screen_seat_id
 * @property string $seat_id
 * @property string $screen_id
 *
 * The followings are the available model relations:
 * @property Screen $screen
 * @property Seat $seat
 * @property SeatBooked[] $seatBookeds
 */
class ScreenSeat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ScreenSeat the static model class
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
		return 'tbl_screen_seat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('seat_id, screen_id', 'required'),
			array('seat_id, screen_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('screen_seat_id, seat_id, screen_id', 'safe', 'on'=>'search'),
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
			'screen' => array(self::BELONGS_TO, 'Screen', 'screen_id'),
			'seat' => array(self::BELONGS_TO, 'Seat', 'seat_id'),
			'seatBookeds' => array(self::HAS_MANY, 'SeatBooked', 'screen_seat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'screen_seat_id' => 'Screen Seat',
			'seat_id' => 'Seat',
			'screen_id' => 'Screen',
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

		$criteria->compare('screen_seat_id',$this->screen_seat_id,true);
		$criteria->compare('seat_id',$this->seat_id,true);
		$criteria->compare('screen_id',$this->screen_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}