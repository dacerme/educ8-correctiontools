<?php

/**
 * This is the model class for table "ct_user_plus".
 *
 * The followings are the available columns in table 'ct_user_plus':
 * @property integer $uid
 * @property integer $groupid
 * @property string $lastip
 * @property string $lastsignin
 * @property double $account
 * @property string $regtime
 *
 * The followings are the available model relations:
 * @property Group $group
 */
class UserPlus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserPlus the static model class
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
		return 'ct_user_plus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, groupid', 'numerical', 'integerOnly'=>true),
			array('account', 'numerical'),
			array('lastip', 'length', 'max'=>20),
			array('lastsignin, regtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, groupid, lastip, lastsignin, account, regtime', 'safe', 'on'=>'search'),
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
			'group' => array(self::BELONGS_TO, 'Group', 'groupid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => 'Uid',
			'groupid' => 'Groupid',
			'lastip' => 'Lastip',
			'lastsignin' => 'Lastsignin',
			'account' => 'Account',
			'regtime' => 'Regtime',
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

		$criteria->compare('uid',$this->uid);
		$criteria->compare('groupid',$this->groupid);
		$criteria->compare('lastip',$this->lastip,true);
		$criteria->compare('lastsignin',$this->lastsignin,true);
		$criteria->compare('account',$this->account);
		$criteria->compare('regtime',$this->regtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}