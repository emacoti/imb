<?php

/**
 * This is the model class for table "estates".
 *
 * The followings are the available columns in table 'estates':
 * @property integer $id
 * @property integer $category_id
 * @property integer $condition_id
 * @property integer $location_id
 * @property string $neighborhood
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Data[] $datas
 * @property Locations $location
 * @property Conditions $condition
 * @property Categories $category
 */
class Estates extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Estates the static model class
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
		return 'estates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, condition_id, location_id, neighborhood', 'required'),
			array('category_id, condition_id, location_id', 'numerical', 'integerOnly'=>true),
			array('neighborhood', 'length', 'max'=>50),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, category_id, condition_id, location_id, neighborhood, description', 'safe', 'on'=>'search'),
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
			'datas' => array(self::HAS_MANY, 'Data', 'estate_id'),
			'location' => array(self::BELONGS_TO, 'Locations', 'location_id'),
			'condition' => array(self::BELONGS_TO, 'Conditions', 'condition_id'),
			'category' => array(self::BELONGS_TO, 'Categories', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'category_id' => 'Rubro',
			'condition_id' => 'Condicion',
			'location_id' => 'Localidad',
			'neighborhood' => 'Barrio',
			'description' => 'Descripcion',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('condition_id',$this->condition_id);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('neighborhood',$this->neighborhood,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}