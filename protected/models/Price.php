<?php

/**
 * This is the model class for table "tbl_price".
 *
 * The followings are the available columns in table 'tbl_price':
 * @property string $price_id
 * @property string $price
 *
 * The followings are the available model relations:
 * @property Showing[] $showings
 */
class Price extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Price the static model class
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
		return 'tbl_price';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('price', 'required'),
			array('price', 'length', 'max'=>10),
			// TODO: validate price if needed
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('price_id, price', 'safe', 'on'=>'search'),
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
			'showings' => array(self::HAS_MANY, 'Showing', 'price_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'price_id' => 'Price (£)',
			'price' => 'Price (£)',
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

		$criteria->compare('price_id',$this->price_id,true);
		$criteria->compare('price',$this->price,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}