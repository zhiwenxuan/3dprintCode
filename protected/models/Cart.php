<?php

/**
 * This is the model class for table "cart".
 *
 * The followings are the available columns in table 'cart':
 * @property integer $cid
 * @property integer $pid
 * @property integer $category_id
 * @property string $name
 * @property string $price
 * @property integer $number
 * @property string $pic
 * @property string $color
 * @property integer $uid
 * @property string $buy_time
 */
class Cart extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cart the static model class
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
		return 'cart';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pid, category_id, name, price, number, uid, buy_time', 'required'),
			array('pid,number, uid', 'numerical', 'integerOnly'=>true),
			array('name, color', 'length', 'max'=>32),
			array('price', 'length', 'max'=>10),
			array('pic', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cid, pid, category_id, name, price, number, pic, color, uid, buy_time', 'safe', 'on'=>'search'),
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
                    'getAuthor'=>array(self::BELONGS_TO,'Customer','a_id'),
					
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cid' => 'Cid',
			'pid' => 'Pid',
			'category_id' => 'Category',
			'name' => 'Name',
			'price' => 'Price',
			'number' => 'Number',
			'pic' => 'Pic',
			'color' => 'Color',
			'uid' => 'Uid',
			'buy_time' => 'Buy Time',
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

		$criteria->compare('cid',$this->cid);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('number',$this->number);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('buy_time',$this->buy_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}