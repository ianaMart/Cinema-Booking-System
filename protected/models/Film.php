<?php

/**
 * This is the model class for table "tbl_film".
 *
 * The followings are the available columns in table 'tbl_film':
 * @property string $film_id
 * @property string $rt_id
 * @property string $title
 * @property string $runtime
 * @property integer $rating
 * @property string $trailer
 *
 * The followings are the available model relations:
 * @property Showing[] $showings
 */
class Film extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Film the static model class
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
		return 'tbl_film';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rt_id, title, runtime', 'required'),
			array('rating', 'numerical', 'integerOnly'=>true),
			array('rt_id', 'length', 'max'=>10),
			array('title, trailer', 'length', 'max'=>255),
			array('runtime', 'type', 'type'=>'time', 'timeFormat'=>'hh:mm'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('film_id, rt_id, title, runtime, rating', 'safe', 'on'=>'search'),
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
			'showings' => array(self::HAS_MANY, 'Showing', 'film_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'film_id' => 'Film',
			'rt_id' => 'Rt',
			'title' => 'Title',
			'runtime' => 'Runtime',
			'rating' => 'Rating',
			'trailer' => 'Trailer',
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

		$criteria->compare('film_id',$this->film_id,true);
		$criteria->compare('rt_id',$this->rt_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('runtime',$this->runtime,true);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('trailer',$this->trailer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}