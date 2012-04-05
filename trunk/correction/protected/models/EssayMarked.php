<?php

/**
 * This is the model class for table "ct_essay_marked".
 *
 * The followings are the available columns in table 'ct_essay_marked':
 * @property integer $m_id
 * @property integer $e_id
 * @property string $markedcontent
 * @property integer $status
 * @property string $marktime
 * @property integer $tid
 * @property string $feedback
 * @property integer $score
 *
 * The followings are the available model relations:
 * @property EssayComment[] $essayComments
 * @property EssayGradescore[] $essayGradescores
 * @property User $t
 * @property Essay $e
 */
class EssayMarked extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EssayMarked the static model class
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
		return 'ct_essay_marked';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('e_id, markedcontent, tid', 'required'),
			array('e_id, status, tid, score', 'numerical', 'integerOnly'=>true),
			array('marktime, feedback', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('m_id, e_id, markedcontent, status, marktime, tid, feedback, score', 'safe', 'on'=>'search'),
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
			'essayComments' => array(self::HAS_MANY, 'EssayComment', 'm_id'),
			'essayGradescores' => array(self::HAS_MANY, 'EssayGradescore', 'm_id'),
			't' => array(self::BELONGS_TO, 'User', 'tid'),
			'e' => array(self::BELONGS_TO, 'Essay', 'e_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'm_id' => 'M',
			'e_id' => 'E',
			'markedcontent' => 'Markedcontent',
			'status' => 'Status',
			'marktime' => 'Marktime',
			'tid' => 'Tid',
			'feedback' => 'Feedback',
			'score' => 'Score',
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

		$criteria->compare('m_id',$this->m_id);
		$criteria->compare('e_id',$this->e_id);
		$criteria->compare('markedcontent',$this->markedcontent,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('marktime',$this->marktime,true);
		$criteria->compare('tid',$this->tid);
		$criteria->compare('feedback',$this->feedback,true);
		$criteria->compare('score',$this->score);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}