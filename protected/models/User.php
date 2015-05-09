<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $type
 * @property string $date_entered
 * @property integer $account
 * @property integer $gameId
 * @property string $salt
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property File[] $files
 * @property Page[] $pages
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email, password, type, date_entered, salt', 'required'),
			array('account, gameId', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>45),
			array('email', 'length', 'max'=>60),
			array('password', 'length', 'max'=>256),
			array('type', 'length', 'max'=>6),
			array('salt', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, email, password, type, date_entered, account, gameId, salt', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comment', 'user_id'),
			'files' => array(self::HAS_MANY, 'File', 'user_id'),
			'pages' => array(self::HAS_MANY, 'Page', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'type' => 'Type',
			'date_entered' => 'Date Entered',
			'account' => 'Account',
			'gameId' => 'Game',
			'salt' => 'Salt',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('date_entered',$this->date_entered,true);
		$criteria->compare('account',$this->account);
		$criteria->compare('gameId',$this->gameId);
		$criteria->compare('salt',$this->salt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
