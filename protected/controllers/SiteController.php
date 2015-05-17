<?php

class SiteController extends Controller
{

    public function init()
    {
        $this->layout = 'main';
        $url = Yii::app()->urlManager->parseUrl(Yii::app()->request);
        if (!($url == 'site/login' || $url == 'site/landing' || $url == 'site/error' || $url == 'site/register')) {
            if (!Yii::app()->user->id) {
                $this->redirect('site/login');
            }
            else {
                $user = User::model()->find('id=:id', array(':id' => Yii::app()->user->id));
            }
        }
    }

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class'     => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'    => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        if (!Yii::app()->user->id) {
            $this->redirect('site/login');
        }
        else {
            $user = User::model()->find('id=:id', array(':id' => Yii::app()->user->id));;
            $settings = Settings::model()->find('userId=:userId', array(':userId' => $user->id));
            $widgets = Widgets::model()->findAll('userId=:userId', array(':userId' => $user->id));
        }

        $settings = json_encode($settings->getAttributes());
        $widgets =  CJSON::encode($widgets);
        $this->render('index', array(
            'user'     => $user,
            'settings' => $settings,
            'posts' => $widgets
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                    "Reply-To: {$model->email}\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-Type: text/plain; charset=UTF-8";
                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the register page
     */
    public function actionRegister()
    {
        if (Yii::app()->user->id) {
            $this->redirect(Yii::app()->user->returnUrl);
        }
        $model = new RegisterForm;
        $newUser = new User;
        $newSettings = new Settings;

        // collect user input data
        if (isset($_POST['RegisterForm']) && isset($_POST['ajax'])) {
            $model->attributes = $_POST['RegisterForm'];
            $newUser->username = $model->username;
            $newUser->salt = uniqid(mt_rand(), true);
            $newUser->password = substr(md5($model->password . $newUser->salt), 0, 256);
            $newUser->email = $model->email;
            $newUser->date_entered = date('Y-m-d');
            $newUser->type = 'public';

            if ($newUser->save()) {
                $newSettings->userId = $newUser->id;
                $newSettings->save();
                $identity = new UserIdentity($newUser->username, $model->password);
                $identity->authenticate();
                Yii::app()->user->login($identity, 0);
                //redirect the user to page he/she came from
                echo json_encode(array('msg' => 'ok'));
            }
            else {
                echo json_encode(array('msg' => $model->errors));
            }
            Yii::app()->end();
        }
        // display the register form
        $this->render('register', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        if (Yii::app()->user->id) {
            $this->redirect(Yii::app()->user->returnUrl);
        }
        $model = new LoginForm;

        if ($_POST) {
            file_put_contents('C:/test/1.txt', json_encode($_POST));
        }
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            // collect user input data
            if (isset($_POST['LoginForm'])) {
                $model->attributes = $_POST['LoginForm'];
                if ($model->validate() && $model->login()) {
                    echo json_encode(array('msg' => 'ok'));
                }
                else {
                    echo json_encode(array('msg' => $model->errors));
                }
            }
            Yii::app()->end();
        }


        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Set settings action
     */
    public function actionSetSettings()
    {
        if (!Yii::app()->user->id) {
            echo json_encode(array('msg' => 'Error'));
            Yii::app()->end();
        }

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'set-settings') {
            $isNew = 0;
            $settings = Settings::model()->find('userId=:userId', array(':userId' => Yii::app()->user->id));
            if (!$settings->id) {
                $settings = new Settings;
                $settings->userId = Yii::app()->user->id;
                $isNew = 1;
            }
            $settings->view = $_POST["view"];
            $settings->gmail = $_POST["gmail"];
            $settings->yandex = $_POST["yandex"];
            $settings->mail = $_POST["mail"];
            if ($isNew) {
                $settings->save();
            }
            else {
                $settings->update();
            }
            echo json_encode(array("msg" => "ok", "settings" => $settings->getAttributes()));
            Yii::app()->end();
        }
    }

    /**
     * Set settings action
     */
    public function actionAddPost()
    {
        if (!Yii::app()->user->id) {
            echo json_encode(array('msg' => 'Error'));
            Yii::app()->end();
        }

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'add-post') {
            $widget = new Widgets();
            $widget->userId = Yii::app()->user->id;
            $widget->type = 'default';
            $widget->save();
            echo json_encode(array("msg" => "ok", "widget" => $widget->getAttributes()));
            Yii::app()->end();
        }
        else {
            echo json_encode(array("msg" => "Error"));
            Yii::app()->end();
        }
    }

    /**
     * Set settings action
     */
    public function actionRemovePost()
    {
        if (!Yii::app()->user->id) {
            echo json_encode(array('msg' => 'Error'));
            Yii::app()->end();
        }

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'remove-post') {
            $widget = Widgets::model()->find('id=:id', array(':id' => $_POST["id"]));
            $widget->delete();
            echo json_encode(array("msg" => "ok"));
            Yii::app()->end();
        }
        else {
            echo json_encode(array("msg" => "Error"));
            Yii::app()->end();
        }
    }

    /**
     * Set settings action
     */
    public function actionEditPost()
    {
        if (!Yii::app()->user->id) {
            echo json_encode(array('msg' => 'Error'));
            Yii::app()->end();
        }

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'edit-post') {
            $widget = new Widgets();
            $widget->userId = Yii::app()->user->id;
            $widget->type = 'default';
            echo json_encode(array("msg" => "ok", "widget" => $widget->getAttributes()));
            Yii::app()->end();
        }
        else {
            echo json_encode(array("msg" => "Error"));
            Yii::app()->end();
        }
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
