<?php

/**
 * This is the model class for table "address".
 *
 * The followings are the available columns in table 'address':
 * @property integer $id
 * @property string $name
 * @property string $mobile
 * @property string $telephone
 * @property string $areacode
 * @property string $area
 * @property string $address
 * @property integer $select
 * @property integer $add_id
 * @property string $add_time
 * @property integer $edit_id
 * @property string $edit_time
 */
class Address extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Address the static model class
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
		return 'address';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, mobile, areacode, area, address, add_id, add_time', 'required'),
			array('select, add_id, edit_id', 'numerical', 'integerOnly'=>true),
			array('name, mobile, telephone', 'length', 'max'=>32),
			array('areacode', 'length', 'max'=>10),
			array('area', 'length', 'max'=>225),
			array('edit_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, mobile, telephone, areacode, area, address, select, add_id, add_time, edit_id, edit_time', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '地址编号',
			'name' => '收件人',
			'mobile' => '手机号码',
			'telephone' => '电话号码',
			'areacode' => '邮编',
			'area' => '所在地区',
			'address' => '详细地址',
			'select' => '默认值',
			'add_id' => '添加者',
			'add_time' => '添加时间',
			'edit_id' => '编辑者',
			'edit_time' => '最后编辑时间',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('areacode',$this->areacode,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('select',$this->select);
		$criteria->compare('add_id',$this->add_id);
		$criteria->compare('add_time',$this->add_time,true);
		$criteria->compare('edit_id',$this->edit_id);
		$criteria->compare('edit_time',$this->edit_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}