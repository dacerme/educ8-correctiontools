<?php

/**
 * This is the model class for table "ct_essay".
 *
 * The followings are the available columns in table 'ct_essay':
 * @property integer $id
 * @property integer $uid
 * @property string $content
 * @property integer $questionid
 * @property string $customquestion
 * @property string $submittime
 * @property integer $status
 * @property integer $markstatus
 * @property string $marktime
 * @property integer $cateid
 * @property integer $subcateid
 *
 * The followings are the available model relations:
 * @property Category $cate
 * @property Question $question
 * @property Category $subcate
 * @property User $u
 * @property EssayMarked[] $essayMarkeds
 */
class Essay extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Essay the static model class
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
		return 'ct_essay';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, content, cateid', 'required'),
			array('uid, questionid, status, markstatus, cateid, subcateid', 'numerical', 'integerOnly'=>true),
			array('customquestion, submittime, marktime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, content, questionid, customquestion, submittime, status, markstatus, marktime, cateid, subcateid', 'safe', 'on'=>'search'),
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
			'cate' => array(self::BELONGS_TO, 'Category', 'cateid'),
			'question' => array(self::BELONGS_TO, 'Question', 'questionid'),
			'subcate' => array(self::BELONGS_TO, 'Category', 'subcateid'),
			'u' => array(self::BELONGS_TO, 'User', 'uid'),
			'essayMarkeds' => array(self::HAS_MANY, 'EssayMarked', 'e_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'uid' => 'Uid',
			'content' => 'Content',
			'questionid' => 'Questionid',
			'customquestion' => 'Customquestion',
			'submittime' => 'Submittime',
			'status' => 'Status',
			'markstatus' => 'Markstatus',
			'marktime' => 'Marktime',
			'cateid' => 'Cateid',
			'subcateid' => 'Subcateid',
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
		$criteria->compare('uid',$this->uid);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('questionid',$this->questionid);
		$criteria->compare('customquestion',$this->customquestion,true);
		$criteria->compare('submittime',$this->submittime,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('markstatus',$this->markstatus);
		$criteria->compare('marktime',$this->marktime,true);
		$criteria->compare('cateid',$this->cateid);
		$criteria->compare('subcateid',$this->subcateid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}