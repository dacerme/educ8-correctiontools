<?php

/**
 * This is the model class for table "ct_question".
 *
 * The followings are the available columns in table 'ct_question':
 * @property integer $qid
 * @property string $title
 * @property string $content
 * @property integer $cateid
 * @property integer $subcateid
 * @property string $updatetime
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Essay[] $essays
 */
class Question extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Question the static model class
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
		return 'ct_question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content', 'required'),
			array('cateid, subcateid, status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			array('updatetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('qid, title, content, cateid, subcateid, updatetime, status', 'safe', 'on'=>'search'),
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
			'essays' => array(self::HAS_MANY, 'Essay', 'questionid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'qid' => 'Qid',
			'title' => 'Title',
			'content' => 'Content',
			'cateid' => 'Cateid',
			'subcateid' => 'Subcateid',
			'updatetime' => 'Updatetime',
			'status' => 'Status',
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

		$criteria->compare('qid',$this->qid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('cateid',$this->cateid);
		$criteria->compare('subcateid',$this->subcateid);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}