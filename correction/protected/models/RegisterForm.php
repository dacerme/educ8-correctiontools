<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
	public $username;
	public $password;
	public $email;
	public $cpassword;
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('username, password, email, cpassword', 'required'),
			array('username','match','pattern'=>'/^[a-zA-Z0-9_]{4,16}$/u'),
			array('password,cpassword', 'length','min'=>6,'max'=>50),
			array('email','email'),
			array('cpassword','compare','compareAttribute'=>'password'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'username'=>'Username',
			'password'=>'Password',
			'cpassword'=>'Confirm Password',
			'email'=>'Email',
		);
	}
}
