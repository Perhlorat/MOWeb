<?php

/**
 * This is the model class for table "settings".
 *
 * The followings are the available columns in table 'settings':
 * @property string $id
 * @property integer $view
 * @property string $gmail
 * @property string $yandex
 * @property string $mail
 * @property string $vktoken
 * @property string $fbtoken
 * @property string $userId
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class Settings extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'settings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gmail, yandex, mail, vktoken, fbtoken, userId', 'required'),
			array('view', 'numerical', 'integerOnly'=>true),
			array('gmail', 'length', 'max'=>45),
			array('yandex, mail, vktoken, fbtoken', 'length', 'max'=>60),
			array('userId', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, view, gmail, yandex, mail, vktoken, fbtoken, userId', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'userId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'view' => 'View',
			'gmail' => 'Gmail',
			'yandex' => 'Yandex',
			'mail' => 'Mail',
			'vktoken' => 'Vktoken',
			'fbtoken' => 'Fbtoken',
			'userId' => 'User',
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
		$criteria->compare('view',$this->view);
		$criteria->compare('gmail',$this->gmail,true);
		$criteria->compare('yandex',$this->yandex,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('vktoken',$this->vktoken,true);
		$criteria->compare('fbtoken',$this->fbtoken,true);
		$criteria->compare('userId',$this->userId,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Settings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
