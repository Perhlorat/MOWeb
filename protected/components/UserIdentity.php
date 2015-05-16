<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
        private $_id;
        public $avatar;
	public function authenticate()
	{
            
        $record=User::model()->findByAttributes(array('username'=>$this->username));
	if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->password!== substr(md5($this->password.$record->salt),0,256))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$record->id;
            $this->avatar = $record->avatar;
            $this->setState('title', $record->username);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}