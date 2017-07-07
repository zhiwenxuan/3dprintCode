<?php

/**
 * This is the model class for table "blog_log".
 *
 * The followings are the available columns in table 'blog_log':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $description
 * @property string $pic
 * @property string $tags
 * @property integer $stat
 * @property integer $top
 * @property string $read
 * @property string $create_time
 * @property string $edit_time
 */
class BlogLog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	 
	public function tableName()
	{
		return 'blog_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content, description, stat', 'required'),
			array('stat, top', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('description, pic, read', 'length', 'max'=>320),
			array('tags', 'length', 'max'=>20),
			array('create_time, edit_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, content, description, pic, tags, stat, top, read, create_time, edit_time', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'content' => 'Content',
			'description' => 'Description',
			'pic' => 'Pic',
			'tags' => 'Tags',
			'stat' => 'Stat',
			'top' => 'Top',
			'read' => 'Read',
			'create_time' => 'Create Time',
			'edit_time' => 'Edit Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('stat',$this->stat);
		$criteria->compare('top',$this->top);
		$criteria->compare('read',$this->read,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('edit_time',$this->edit_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BlogLog the static model class
	 */
	
}
