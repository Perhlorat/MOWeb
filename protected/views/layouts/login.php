<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">
        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->
       <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
       <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
       <!-- 1. Load platform support before any code that touches the DOM. -->
       <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/webcomponentsjs/webcomponents.min.js"></script>
       
       <link rel="import"  href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/core-header-panel/core-header-panel.html">
       <link rel="import"  href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/core-toolbar/core-toolbar.html">
       <link rel="import"  href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/paper-tabs/paper-tabs.html">
       <link rel="import"  href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/font-roboto/roboto.html">

       <!-- 2. Load the component using an HTML Import -->
       <link rel="import" href="/polymer/my-element/">
       <link rel="import" href="/polymer/post-card/">
       <title><?php echo CHtml::encode($this->pageTitle); ?></title>  
    </head>
    <body>
        <?php echo $content ?>
        <script>
            var tabs = document.querySelector('paper-tabs');
            tabs.addEventListener('core-select', function() {
            console.log("Selected: " + tabs.selected);
            });
        </script>
    </body>
</html>
