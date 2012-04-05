<?php

/**
 * This is the model class for table "ct_essay_annotation".
 *
 * The followings are the available columns in table 'ct_essay_annotation':
 * @property integer $a_id
 * @property string $annotation
 * @property string $caption
 * @property string $caption_en
 * @property string $explain
 * @property string $explain_en
 * @property double $value
 */
class EssayAnnotation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EssayAnnotation the static model class
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
		return 'ct_essay_annotation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('annotation, caption_en, explain_en, value', 'required'),
			array('value', 'numerical'),
			array('annotation', 'length', 'max'=>10),
			array('caption', 'length', 'max'=>50),
			array('caption_en, explain', 'length', 'max'=>100),
			array('explain_en', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('a_id, annotation, caption, caption_en, explain, explain_en, value', 'safe', 'on'=>'search'),
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
			'a_id' => 'A',
			'annotation' => 'Annotation',
			'caption' => 'Caption',
			'caption_en' => 'Caption En',
			'explain' => 'Explain',
			'explain_en' => 'Explain En',
			'value' => 'Value',
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

		$criteria->compare('a_id',$this->a_id);
		$criteria->compare('annotation',$this->annotation,true);
		$criteria->compare('caption',$this->caption,true);
		$criteria->compare('caption_en',$this->caption_en,true);
		$criteria->compare('explain',$this->explain,true);
		$criteria->compare('explain_en',$this->explain_en,true);
		$criteria->compare('value',$this->value);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}