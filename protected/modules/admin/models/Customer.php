<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $id
 * @property string $name
 * @property string $pic
 * @property string $email
 * @property string $telephone
 * @property string $mobile
 * @property string $password
 * @property string $address
 * @property integer $status
 * @property integer $approved
 * @property string $date_added
 * @property string $date_modified
 */
class Customer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Customer the static model class
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
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('name,password,,email','required','message'=>'字段不能为空'),
			array('name','unique','message'=>'用户名已占用'),
			array('status, approved', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			array('pic', 'length', 'max'=>225),
			array('email', 'length', 'max'=>96),
			array('telephone, mobile', 'length', 'max'=>32),
			array('password', 'length', 'max'=>40),
			array('address', 'length', 'max'=>128),
			array('date_added, date_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, pic, email, telephone, mobile, password, address, status, approved, date_added, date_modified', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => '姓名',
			'pic' => '头像',
			'email' => '邮箱',
			'telephone' => '固定电话',
			'mobile' => '移动电话',
			'password' => '密码',
			'address' => '地址',
			'status' => '权限',
			'approved' => '状态',
			'date_added' => '添加时间',
			'date_modified' => '修改时间',
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
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('approved',$this->approved);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}