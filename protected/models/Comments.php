<?php

/**
 * This is the model class for table "comments".
 *
 * The followings are the available columns in table 'comments':
 * @property integer $id
 * @property integer $p_id
 * @property integer $add_id
 * @property string $add_time
 * @property string $add_name
 * @property string $content
 * @property string $pic
 * @property integer $stat
 * @property integer $r_id
 */
class Comments extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comments the static model class
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
		return 'comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('p_id, add_id, add_time, add_name, content', 'required'),
			array('p_id, add_id, stat, r_id', 'numerical', 'integerOnly'=>true),
			array('add_name', 'length', 'max'=>32),
			array('content, pic', 'length', 'max'=>225),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, p_id, add_id, add_time, add_name, content, pic, stat, r_id', 'safe', 'on'=>'search'),
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
			'p_id' => 'P',
			'add_id' => 'Add',
			'add_time' => 'Add Time',
			'add_name' => 'Add Name',
			'content' => 'Content',
			'pic' => 'Pic',
			'stat' => 'Stat',
			'r_id' => 'R',
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
		$criteria->compare('p_id',$this->p_id);
		$criteria->compare('add_id',$this->add_id);
		$criteria->compare('add_time',$this->add_time,true);
		$criteria->compare('add_name',$this->add_name,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('stat',$this->stat);
		$criteria->compare('r_id',$this->r_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}