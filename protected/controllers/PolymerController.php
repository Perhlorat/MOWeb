<?php

class PolymerController extends Controller
    {

    /**
     * Init for all actions
     */
    public function init()
        {
        $this->layout = false;
        }

    /**
     * Declares class-based actions.
     */
    public function actions()
        {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
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
     * Login form template
     */
    public function actionLoginForm()
        {
        $this->render('/polymer/login-form');
        }

    /**
     * Login form template
     */
    public function actionRegisterForm()
    {
        $this->render('/polymer/register-form');
    }

    /**
     * Login form template
     */
    public function actionPaperPassword()
    {
        $this->render('/polymer/paper-password');
    }
    /**
     * Just for test
     */
    public function actionTestInput()
        {
        $this->render('/polymer/test-input');
        }

    /**
     * core element
     */
    public function actionMowebApp()
    {
        $this->render('/polymer/moweb-app');
    }

    /**
     * Top toolbar of user
     */
    public function actionMyDesk()
    {
        $this->render('/polymer/my-desk');
    }

    /**
     * Globals for polymer
     */
    public function actionAppGlobals()
        {
        $this->render('/polymer/app-globals');
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
