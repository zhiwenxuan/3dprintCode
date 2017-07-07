<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $id
 * @property integer $u_id
 * @property integer $allPrice
 * @property string $remarks
 * @property integer $address
 * @property integer $order_stat
 * @property integer $add_id
 * @property string $add_time
 * @property integer $edit_id
 * @property string $edit_time
 */
class Order extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Order the static model class
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
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('u_id, allPrice, add_id, add_time', 'required'),
			array('u_id, allPrice, address, order_stat, add_id, edit_id', 'numerical', 'integerOnly'=>true),
			array('remarks, edit_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, u_id, allPrice, remarks, address, order_stat, add_id, add_time, edit_id, edit_time', 'safe', 'on'=>'search'),
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
		 	'buyUser'=>array(self::BELONGS_TO,'Customer','u_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'u_id' => 'U',
			'allPrice' => 'All Price',
			'remarks' => 'Remarks',
			'address' => 'Address',
			'order_stat' => 'Order Stat',
			'add_id' => 'Add',
			'add_time' => 'Add Time',
			'edit_id' => 'Edit',
			'edit_time' => 'Edit Time',
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
		$criteria->compare('u_id',$this->u_id);
		$criteria->compare('allPrice',$this->allPrice);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('address',$this->address);
		$criteria->compare('order_stat',$this->order_stat);
		$criteria->compare('add_id',$this->add_id);
		$criteria->compare('add_time',$this->add_time,true);
		$criteria->compare('edit_id',$this->edit_id);
		$criteria->compare('edit_time',$this->edit_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}