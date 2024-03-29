<?php

/**
 * This is the model class for table "ct_user".
 *
 * The followings are the available columns in table 'ct_user':
 * @property integer $uid
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $gender
 * @property string $country
 * @property integer $active
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'ct_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username,password,email','required'),
			array('username','match','pattern'=>'/^[a-zA-Z0-9_]{4,16}$/u'),
			array('gender, active', 'numerical', 'integerOnly'=>true),
			array('password', 'length', 'max'=>50, 'min'=>6),
			array('email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, username, password, email, gender, country, active', 'safe', 'on'=>'search'),
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
			'uid' => 'Uid',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'gender' => 'Gender',
			'country' => 'Country',
			'active' => 'Active',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}