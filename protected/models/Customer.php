<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $telephone
 * @property string $mobile
 * @property string $password
 * @property string $address
 * @property integer $status
 * @property integer $approved
 * @property string $date_added
 */
class Customer extends CActiveRecord
{
	
	 
	
    // dirty attributes check module **********************************数据没更新不做修改
    private $_oldAttributes = array();
    public function setOldAttributes($value)
    {
        $this->_oldAttributes = $value;
    }
    public function getOldAttributes()
    {
        return $this->_oldAttributes;
    }
    public function isDirty()
    {
            return !($this->attributes == $this->OldAttributes);
    }
    public function afterFind() {
            $this->OldAttributes = $this->attributes;
            parent::afterFind();
    }
    // *****************************************************************

	
    //fields in form but not in table customer
        public $verifyPassword;
        public $newverifyPassword;
        public $newpassword;
      /**
	 * Returns the static model of the specified AR class.
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
        public $verifyCode;//----验证码
        
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name,password,verifyPassword,verifyCode,email','required','message'=>'字段不能为空','on'=>'register'),
            array('newpassword, newverifyPassword','required','message'=>'密码不能为空'),
			array('newverifyPassword', 'compare', 'compareAttribute'=>'newpassword','message'=>'两处输入的密码并不一致'), 
			array('name','required','message'=>'字段不能为空'),
            //array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
//			array('status, approved', 'numerical', 'integerOnly'=>true),
 			array('pic',  
					'file',    //定义为file类型  
					'allowEmpty'=>true,   
					'types'=>'jpg,png,gif,doc,pdf,xls,xlsx,zip,rar,ppt,pptx',   //上传文件的类型  
					'maxSize'=>1024*1024*10,    //上传大小限制，注意不是php.ini中的上传文件大小  
					'tooLarge'=>'文件大于10M，上传失败！请上传小于10M的文件！'  
			), 
			array('name', 'length', 'max'=>20),
            array('name','unique','message'=>'用户名已占用'),
            array('email','email','message'=>'邮箱格式错误'),
			array('email', 'length', 'max'=>96),
			array('telephone, mobile', 'length', 'max'=>32),
			array('password', 'length', 'max'=>40),
                        array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message'=>'请再输入确认密码','on'=>'register'),  
                        //array('agree', 'required', 'requiredValue'=>true,'message'=>'请确认是否同意隐私权协议条款'),
			//array('agree','boolean','trueValue'=>true,'falseValue'=>false),

			array('address', 'length', 'max'=>128),
			array('date_added', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, telephone, mobile, password, address, status, approved, date_added', 'safe', 'on'=>'search'),
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
                     'orders'=>array(self::HAS_MANY,'order','customer_id'),
 		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
                    'id' => 'ID',
                    'name' => '用户名称 ',
                    'email' => '电子邮箱',
                    'pic'=>'头像',
                    'telephone' => '固定电话',
                    'mobile' => '移动电话',
                    'password' => '您的密码',
                    'verifyPassword' => '确认密码',
                    'newpassword' => '新的密码',
                    'newverifyPassword' => '确认密码',
                    'address' => ' 地   址 ',
                    'agree'=>'',
                    'status' => 'Status',
                    'approved' => 'Approved',
                    'date_added' => 'Date Added',
                    'verifyCode'=>'验证码',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('approved',$this->approved);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}