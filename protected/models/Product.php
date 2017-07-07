<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 * @property string $thumbnail
 * @property string $price
 * @property string $color
 * @property integer $stat
 * @property integer $add_uid
 * @property string $add_time
 * @property integer $edit_uid
 * @property string $edit_time
 */
class Product extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Product the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'product';
    }

    // dirty attributes check module **********************************数据没更新不做修改
    private $_oldAttributes = array();

    public function setOldAttributes($value) {
        $this->_oldAttributes = $value;
    }

    public function getOldAttributes() {
        return $this->_oldAttributes;
    }

    public function isDirty() {
        return !($this->attributes == $this->OldAttributes);
    }

    public function afterFind() {
        $this->OldAttributes = $this->attributes;
        parent::afterFind();
    }

    // *****************************************************************
    //fields in form but not in table customer
    public $pic;

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_id, name, description, add_uid, add_time', 'required'),
            array('stat,dowload_type, add_uid, edit_uid, buy, push', 'numerical', 'integerOnly' => true),
            array('three_model', // dk  我替换了原来的color输入框
                'file', //定义为file类型  
                'allowEmpty' => true,
                'types' => 'stl,obj,jpg,png,gif,doc,pdf,xls,xlsx,zip,rar,ppt,pptx', //上传文件的类型  
                'maxSize' => 1024 * 1024 * 100, //上传大小限制，注意不是php.ini中的上传文件大小  
                'tooLarge' => '文件大于100M，上传失败！请上传小于100M的文件！'
            ),
			array('dowload', // dj  用户上传附件
                'file', //定义为file类型  
                'allowEmpty' => true,
                'types' => 'rar,zip', //上传文件的类型  
                'maxSize' => 1024 * 1024 * 500, //上传大小限制，注意不是php.ini中的上传文件大小  
                'tooLarge' => '文件大于500M，上传失败！请上传0小于50M的文件！'
            ),
            array('name, thumbnail', 'length', 'max' => 255),
            array('price,dowload_integral', 'length', 'max' => 15),
            array('edit_time', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, category_id, name, description, thumbnail, price, stat, add_uid, add_time, edit_uid, edit_time', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'fbz' => array(self::BELONGS_TO, 'Customer', 'add_uid'),
            'getCatagory' => array(self::BELONGS_TO, 'Category', 'category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'category_id' => '类别',
            'name' => '名称',
            'description' => '描述',
            'thumbnail' => '图片',
            'three_model' => '3D模型',
			'dowload'=>'下载附件',
			'dowload_integral'=>'所需积分',
			'dowload_type'=> '是否下载',
            'designPrice' => '设计费',
            'price' => '价格',
            'tag' => '标签',
            'buy' => '购买次数',
            'push' => '推荐',
            'metalColor' => '颜色',
            'plasticColor' => '颜色',
            'stat' => '状态',
            'add_uid' => '发布者',
            'add_time' => '发布时间',
            'edit_uid' => '最后修改者',
            'edit_time' => '最后修改时间',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('thumbnail', $this->thumbnail, true);
        $criteria->compare('price', $this->price, true);
        $criteria->compare('stat', $this->stat);
        $criteria->compare('add_uid', Yii::app()->user->id);
        $criteria->compare('add_time', $this->add_time, true);
        $criteria->compare('edit_uid', $this->edit_uid);
        $criteria->compare('edit_time', $this->edit_time, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
