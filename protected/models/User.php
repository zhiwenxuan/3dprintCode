<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $create_time
 * @property integer $groupid
 * @property string $stat
 * @property integer $last_id
 * @property string $last_edit
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
        
        
        public $passwordConfirm;//----确认密码

        public $verifyCode;//----验证码
        
        
	public function rules()
	{
		
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                // on => register表示在注册页使用，在 actionRegister中由 $model = new User('register'); 来区分
		return array(
			array('username, password', 'required'),//----必须输入项目
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			array('passwordConfirm,verifyCode', 'required', 'on' => 'register'),
			array('username,', 'unique', 'on' => 'register'), // 唯一，不能有重复记录
			array('passwordConfirm', 'compare', 'compareAttribute' => 'password', 'on' => 'register'), // 两次密码要一致
			array('groupid,last_id', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>60),
			array('password', 'length', 'max'=>32),
			array('stat', 'length', 'max'=>1),
                        array('create_id, create_time,last_id,last_edit,','safe'),
                       
                    
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password,create_id, create_time, groupid, stat, last_id, last_edit', 'safe', 'on'=>'search'),
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
			'username' => '用户名',
			'password' => '密码',
			'passwordConfirm'=>'确认密码',
			'create_id' => '创建者',
			'create_time' => '创建时间',
			'groupid' => '用户组',
			'stat' => '状态',
			'last_id' => '最后修改者',
			'last_edit' => '最后修改时间',
                        'verifyCode' =>'验证码',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
                $criteria->compare('create_id',$this->create_id,true);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('groupid',$this->groupid);
		$criteria->compare('stat',$this->stat,true);
		$criteria->compare('last_id',$this->last_id);
		$criteria->compare('last_edit',$this->last_edit);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function validatePassword($password){//----验证输入密码与用户密码是否一致
//            print_r($password);
//            print_r($this->password);
            return $this->encrypt($password)===$this->password;
        }
        
        public function  encrypt($pass){//用户密码加密
            return md5($pass);
        }
        
        protected function beforeSave() {
           
            if(parent::beforeSave()){

                if($this->isNewRecord){
                    $this->create_time = date('Y-m-d H:i:s');
                    $this->create_id = Yii::app()->user->id;
                    $this->password = $this->encrypt($this->password);//保存时候对用户密码加密
                    
                }else{
                    $this->last_edit = date('Y-m-d H:i:s');
                    $this->last_id = Yii::app()->user->id;
                            

                }
                
                
                return true;
                
            }else{
                return false;
            }
        }

}