<?php

/**
 * This is the model class for table "{{screen}}".
 *
 * The followings are the available columns in table '{{screen}}':
 * @property string $screen_id
 * @property string $screen
 * @property string $seating_capacity
 *
 * The followings are the available model relations:
 * @property Showing[] $showings
 */
class Screen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
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
		return '{{screen}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('screen_id, screen, seating_capacity', 'required'),
			array('screen_id, seating_capacity', 'length', 'max'=>10),
			array('screen', 'length', 'max'=>255),
			array('screen','filter','filter'=>array($obj=new CHtmlPurifier(),'purify')),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('screen_id, screen, seating_capacity', 'safe', 'on'=>'search'),
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
			'seating_capacity' => 'Seating Capacity',
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
		$criteria->compare('seating_capacity',$this->seating_capacity,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}