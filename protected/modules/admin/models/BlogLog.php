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
 * @property integer $read
 * @property string $create_time
 * @property string $edit_time
 */
class BlogLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BlogLog the static model class
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
			array('title, content, description, stat, create_time', 'required'),
			array('stat, top, read', 'numerical', 'integerOnly'=>true),
			array('title, description, pic, tags', 'length', 'max'=>255),
			array('edit_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
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
                    'addUser'=>array(self::BELONGS_TO,'Customer','create_id'),
					
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => '标题',
			'content' => '内容',
			'description' => '描述',
			'pic' => '题图',
			'tags' => '标签',
			'stat' => '状态',
			'top' => '置顶',
			'read' => '阅读量',
			'create_time' => '创建时间',
			'edit_time' => '更新时间',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('stat',$this->stat);
		$criteria->compare('top',$this->top);
		$criteria->compare('read',$this->read);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('edit_time',$this->edit_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}