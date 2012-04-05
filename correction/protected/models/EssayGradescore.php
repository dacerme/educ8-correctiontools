<?php

/**
 * This is the model class for table "ct_essay_gradescore".
 *
 * The followings are the available columns in table 'ct_essay_gradescore':
 * @property integer $id
 * @property integer $m_id
 * @property integer $P_RTP
 * @property integer $P_ORG
 * @property integer $P_DAD
 * @property integer $P_GRA
 * @property integer $I1_TR
 * @property integer $I1_OAS
 * @property integer $I1_DAD
 * @property integer $I1_LR
 * @property integer $I1_GRA
 * @property integer $I1_HA
 * @property integer $I2_TR
 * @property integer $I2_OAS
 * @property integer $I2_DAD
 * @property integer $I2_LR
 * @property integer $I2_GRA
 * @property integer $I2_HA
 * @property integer $G1_TR
 * @property integer $G1_OAS
 * @property integer $G1_DAD
 * @property integer $G1_GRA
 * @property integer $G1_HA
 * @property integer $G2_TR
 * @property integer $G2_OAS
 * @property integer $G2_DAD
 * @property integer $G2_GRA
 * @property integer $G2_HA
 * @property integer $T1_TR
 * @property integer $T1_OAS
 * @property integer $T1_DAD
 * @property integer $T1_GRA
 * @property integer $T1_HA
 * @property integer $T2_TR
 * @property integer $T2_OAS
 * @property integer $T2_DAD
 * @property integer $T2_GRA
 * @property integer $T2_HA
 *
 * The followings are the available model relations:
 * @property EssayMarked $m
 */
class EssayGradescore extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EssayGradescore the static model class
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
		return 'ct_essay_gradescore';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('m_id', 'required'),
			array('m_id, P_RTP, P_ORG, P_DAD, P_GRA, I1_TR, I1_OAS, I1_DAD, I1_LR, I1_GRA, I1_HA, I2_TR, I2_OAS, I2_DAD, I2_LR, I2_GRA, I2_HA, G1_TR, G1_OAS, G1_DAD, G1_GRA, G1_HA, G2_TR, G2_OAS, G2_DAD, G2_GRA, G2_HA, T1_TR, T1_OAS, T1_DAD, T1_GRA, T1_HA, T2_TR, T2_OAS, T2_DAD, T2_GRA, T2_HA', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, m_id, P_RTP, P_ORG, P_DAD, P_GRA, I1_TR, I1_OAS, I1_DAD, I1_LR, I1_GRA, I1_HA, I2_TR, I2_OAS, I2_DAD, I2_LR, I2_GRA, I2_HA, G1_TR, G1_OAS, G1_DAD, G1_GRA, G1_HA, G2_TR, G2_OAS, G2_DAD, G2_GRA, G2_HA, T1_TR, T1_OAS, T1_DAD, T1_GRA, T1_HA, T2_TR, T2_OAS, T2_DAD, T2_GRA, T2_HA', 'safe', 'on'=>'search'),
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
			'm' => array(self::BELONGS_TO, 'EssayMarked', 'm_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'm_id' => 'M',
			'P_RTP' => 'P Rtp',
			'P_ORG' => 'P Org',
			'P_DAD' => 'P Dad',
			'P_GRA' => 'P Gra',
			'I1_TR' => 'I1 Tr',
			'I1_OAS' => 'I1 Oas',
			'I1_DAD' => 'I1 Dad',
			'I1_LR' => 'I1 Lr',
			'I1_GRA' => 'I1 Gra',
			'I1_HA' => 'I1 Ha',
			'I2_TR' => 'I2 Tr',
			'I2_OAS' => 'I2 Oas',
			'I2_DAD' => 'I2 Dad',
			'I2_LR' => 'I2 Lr',
			'I2_GRA' => 'I2 Gra',
			'I2_HA' => 'I2 Ha',
			'G1_TR' => 'G1 Tr',
			'G1_OAS' => 'G1 Oas',
			'G1_DAD' => 'G1 Dad',
			'G1_GRA' => 'G1 Gra',
			'G1_HA' => 'G1 Ha',
			'G2_TR' => 'G2 Tr',
			'G2_OAS' => 'G2 Oas',
			'G2_DAD' => 'G2 Dad',
			'G2_GRA' => 'G2 Gra',
			'G2_HA' => 'G2 Ha',
			'T1_TR' => 'T1 Tr',
			'T1_OAS' => 'T1 Oas',
			'T1_DAD' => 'T1 Dad',
			'T1_GRA' => 'T1 Gra',
			'T1_HA' => 'T1 Ha',
			'T2_TR' => 'T2 Tr',
			'T2_OAS' => 'T2 Oas',
			'T2_DAD' => 'T2 Dad',
			'T2_GRA' => 'T2 Gra',
			'T2_HA' => 'T2 Ha',
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
		$criteria->compare('m_id',$this->m_id);
		$criteria->compare('P_RTP',$this->P_RTP);
		$criteria->compare('P_ORG',$this->P_ORG);
		$criteria->compare('P_DAD',$this->P_DAD);
		$criteria->compare('P_GRA',$this->P_GRA);
		$criteria->compare('I1_TR',$this->I1_TR);
		$criteria->compare('I1_OAS',$this->I1_OAS);
		$criteria->compare('I1_DAD',$this->I1_DAD);
		$criteria->compare('I1_LR',$this->I1_LR);
		$criteria->compare('I1_GRA',$this->I1_GRA);
		$criteria->compare('I1_HA',$this->I1_HA);
		$criteria->compare('I2_TR',$this->I2_TR);
		$criteria->compare('I2_OAS',$this->I2_OAS);
		$criteria->compare('I2_DAD',$this->I2_DAD);
		$criteria->compare('I2_LR',$this->I2_LR);
		$criteria->compare('I2_GRA',$this->I2_GRA);
		$criteria->compare('I2_HA',$this->I2_HA);
		$criteria->compare('G1_TR',$this->G1_TR);
		$criteria->compare('G1_OAS',$this->G1_OAS);
		$criteria->compare('G1_DAD',$this->G1_DAD);
		$criteria->compare('G1_GRA',$this->G1_GRA);
		$criteria->compare('G1_HA',$this->G1_HA);
		$criteria->compare('G2_TR',$this->G2_TR);
		$criteria->compare('G2_OAS',$this->G2_OAS);
		$criteria->compare('G2_DAD',$this->G2_DAD);
		$criteria->compare('G2_GRA',$this->G2_GRA);
		$criteria->compare('G2_HA',$this->G2_HA);
		$criteria->compare('T1_TR',$this->T1_TR);
		$criteria->compare('T1_OAS',$this->T1_OAS);
		$criteria->compare('T1_DAD',$this->T1_DAD);
		$criteria->compare('T1_GRA',$this->T1_GRA);
		$criteria->compare('T1_HA',$this->T1_HA);
		$criteria->compare('T2_TR',$this->T2_TR);
		$criteria->compare('T2_OAS',$this->T2_OAS);
		$criteria->compare('T2_DAD',$this->T2_DAD);
		$criteria->compare('T2_GRA',$this->T2_GRA);
		$criteria->compare('T2_HA',$this->T2_HA);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}