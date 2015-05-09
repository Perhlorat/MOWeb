<?php

/**
 * RegisterForm class.
 * RegisterForm is the data structure for keeping
 * user registration form data. It is used by the 'register' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
    const WEAK = 0;
    const STRONG = 1;
        public $username;
        public $password;
        public $email;

        private $_identity;

        /**
         * Declares the validation rules.
         * The rules state that username, password & email are required,
         * and username & email needs to be unique.
         */
        public function rules()
        {
                return array(
                        // username and password are required
                        array('username', 'required', 'message' => 'Введите ваш логин'),
                        array('password', 'required', 'message' => 'Введите ваш пароль'),
                        array('email', 'required', 'message' => 'Введите ваш e-mail'),
                        array('email', 'email', 'message' => 'Неподходящий e-mail'),
                        array('username', 'unique', 'className' => 'User', 'attributeName' => 'username'),
                        array('email', 'unique', 'className' => 'User', 'attributeName' => 'email'),
                );
        }

        /**
         * Declares attribute labels.
         */
        public function attributeLabels()
        {
                return array(
                        
                );
        }
        
        public function uniqueUsername($attribute,$params)
            {
            print_r("eee");
            die();
            if($user = User::model()->exists('username=:username',array(":username" => $this->username)))
                {
                $this->addError('username','Пользователь с таким логином уже существует');
                }
            }

            
        public function uniqueEmail($attribute,$params)
            {
             if($user = User::model()->exists('email=:email',array(":email" => $this->email)))
                {
                $this->addError('email','Пользователь с таким e-mail уже существует');
                }
            }

}