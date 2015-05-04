<?php

class PolymerController extends Controller
{


	/** 
	* Init for all actions
	*/
	public function init() {
		$this->layout = false;
	}
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
	return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionMyElement()
	{
	$this->render('/polymer/my-element');
	}

        /**
         * 
         */
        public function actionPostCard()
	{
	$this->render('/polymer/post-card');
	}
        
	public function actionIndex()
	{
	$this->render('index');
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
	}
}