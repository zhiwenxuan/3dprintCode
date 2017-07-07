<?php

/**
 * This is the model class for table "order_product".
 *
 * The followings are the available columns in table 'order_product':
 * @property integer $id
 * @property integer $order_id
 * @property integer $p_id
 * @property string $name
 * @property string $pic
 * @property integer $number
 * @property string $price
 * @property integer $color
 * @property integer $u_id
 */
class OrderProduct extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderProduct the static model class
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
		return 'order_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, p_id, name, pic, number', 'required'),
			array('order_id, p_id, number, u_id', 'numerical', 'integerOnly'=>true),
			array('name, pic', 'length', 'max'=>255),
			array('price', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_id, p_id, name, pic, number, price, color, u_id', 'safe', 'on'=>'search'),
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
			'getCatagory'=>array(self::BELONGS_TO,'Category','category_id'),
			'getAuthor'=>array(self::BELONGS_TO,'Customer','u_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_id' => 'Order',
			'p_id' => 'P',
			'name' => 'Name',
			'pic' => 'Pic',
			'number' => 'Number',
			'price' => 'Price',
			'color' => 'Color',
			'u_id' => 'U',
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
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('p_id',$this->p_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('number',$this->number);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('color',$this->color);
		$criteria->compare('u_id',$this->u_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}