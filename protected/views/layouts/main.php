<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes"/>
    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
          media="screen, projection"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
          media="print"/>
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
          media="screen, projection"/>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>

    <link rel="shortcut icon" href="/assets/images/logo.png">

    <style type="text/css">
    @font-face {
        font-family: 'Roboto';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Thin.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Thin.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Thin.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Thin.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Thin.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Thin.svg#Roboto') format('svg');
        font-weight: 100;
        font-style: normal;
    }

    @font-face {
        font-family: 'Roboto-Thin';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Thin.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Thin.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Thin.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Thin.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Thin.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Thin.svg#Roboto') format('svg');
    }

    @font-face {
        font-family: 'Roboto';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-ThinItalic.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-ThinItalic.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-ThinItalic.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-ThinItalic.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-ThinItalic.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-ThinItalic.svg#Roboto') format('svg');
        font-weight: 100;
        font-style: italic;
    }

    @font-face {
        font-family: 'Roboto-ThinItalic';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-ThinItalic.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-ThinItalic.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-ThinItalic.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-ThinItalic.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-ThinItalic.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-ThinItalic.svg#Roboto') format('svg');
    }

    @font-face {
        font-family: 'Roboto';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Light.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Light.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Light.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Light.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Light.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Light.svg#Roboto') format('svg');
        font-weight: 300;
        font-style: normal;
    }

    @font-face {
        font-family: 'Roboto-Light';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Light.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Light.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Light.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Light.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Light.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Light.svg#Roboto') format('svg');
    }

    @font-face {
        font-family: 'Roboto';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-LightItalic.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-LightItalic.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-LightItalic.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-LightItalic.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-LightItalic.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-LightItalic.svg#Roboto') format('svg');
        font-weight: 300;
        font-style: italic;
    }

    @font-face {
        font-family: 'Roboto-LightItalic';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-LightItalic.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-LightItalic.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-LightItalic.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-LightItalic.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-LightItalic.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-LightItalic.svg#Roboto') format('svg');
    }

    @font-face {
        font-family: 'Roboto';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Regular.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Regular.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Regular.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Regular.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Regular.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Regular.svg#Roboto') format('svg');
        font-weight: 400;
        font-style: normal;
    }

    @font-face {
        font-family: 'Roboto-Regular';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Regular.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Regular.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Regular.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Regular.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Regular.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Regular.svg#Roboto') format('svg');
    }

    @font-face {
        font-family: 'Roboto';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-RegularItalic.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-RegularItalic.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-RegularItalic.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-RegularItalic.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-RegularItalic.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-RegularItalic.svg#Roboto') format('svg');
        font-weight: 400;
        font-style: italic;
    }

    @font-face {
        font-family: 'Roboto-RegularItalic';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-RegularItalic.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-RegularItalic.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-RegularItalic.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-RegularItalic.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-RegularItalic.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-RegularItalic.svg#Roboto') format('svg');
    }

    @font-face {
        font-family: 'Roboto';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Medium.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Medium.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Medium.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Medium.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Medium.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Medium.svg#Roboto') format('svg');
        font-weight: 500;
        font-style: normal;
    }

    @font-face {
        font-family: 'Roboto-Medium';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Medium.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Medium.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Medium.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Medium.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Medium.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Medium.svg#Roboto') format('svg');
    }

    @font-face {
        font-family: 'Roboto';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-MediumItalic.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-MediumItalic.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-MediumItalic.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-MediumItalic.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-MediumItalic.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-MediumItalic.svg#Roboto') format('svg');
        font-weight: 500;
        font-style: italic;
    }

    @font-face {
        font-family: 'Roboto-MediumItalic';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-MediumItalic.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-MediumItalic.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-MediumItalic.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-MediumItalic.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-MediumItalic.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-MediumItalic.svg#Roboto') format('svg');
    }

    @font-face {
        font-family: 'Roboto';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Bold.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Bold.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Bold.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Bold.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Bold.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Bold.svg#Roboto') format('svg');
        font-weight: 700;
        font-style: normal;
    }

    @font-face {
        font-family: 'Roboto-Bold';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Bold.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Bold.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Bold.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Bold.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Bold.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Bold.svg#Roboto') format('svg');
    }

    @font-face {
        font-family: 'Roboto';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BoldItalic.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BoldItalic.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BoldItalic.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BoldItalic.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BoldItalic.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BoldItalic.svg#Roboto') format('svg');
        font-weight: 700;
        font-style: italic;
    }

    @font-face {
        font-family: 'Roboto-BoldItalic';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BoldItalic.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BoldItalic.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BoldItalic.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BoldItalic.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BoldItalic.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BoldItalic.svg#Roboto') format('svg');
    }

    @font-face {
        font-family: 'Roboto';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Black.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Black.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Black.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Black.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Black.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Black.svg#Roboto') format('svg');
        font-weight: 900;
        font-style: normal;
    }

    @font-face {
        font-family: 'Roboto-Black';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Black.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Black.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Black.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Black.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Black.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-Black.svg#Roboto') format('svg');
    }

    @font-face {
        font-family: 'Roboto';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BlackItalic.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BlackItalic.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BlackItalic.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BlackItalic.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BlackItalic.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BlackItalic.svg#Roboto') format('svg');
        font-weight: 900;
        font-style: italic;
    }

    @font-face {
        font-family: 'Roboto-BlackItalic';
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BlackItalic.eot');
        src:  url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BlackItalic.eot?#iefix') format('embedded-opentype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BlackItalic.woff2') format('woff2'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BlackItalic.woff') format('woff'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BlackItalic.ttf') format('truetype'),
        url('<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/fonts/Roboto-BlackItalic.svg#Roboto') format('svg');
    }
    </style>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/roboto-fontface/css/roboto-fontface.css"/>

    <script src="/assets/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/classie/classie.js"></script>
    <!-- 1. Load platform support before any code that touches the DOM. -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/webcomponentsjs/webcomponents.min.js"></script>

    <link rel="import" href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/polymer/polymer.html"/>
    <link rel="import"
          href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/core-header-panel/core-header-panel.html"/>
    <link rel="import"
          href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/core-toolbar/core-toolbar.html"/>
    <link rel="import" href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/paper-tabs/paper-tabs.html"/>
    <link rel="import"
          href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/paper-input/paper-input.html"/>
    <link rel="import"
          href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/paper-fab/paper-fab.html"/>
    <link rel="import"
          href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/paper-input/paper-input-decorator.html"/>
    <link rel="import"
          href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/paper-checkbox/paper-checkbox.html"/>
    <link rel="import" href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/core-ajax/core-ajax.html"/>
    <link rel="import"
          href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/paper-button/paper-button.html"/>

    <link rel="import"
          href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/paper-toggle-button/paper-toggle-button.html"/>
    <!-- 2. Load the component using an HTML Import -->
    <link rel="import" href="/polymer/moweb-app/"/>
    <link rel="import" href="/polymer/app-globals/"/>
    <link rel="import" href="/polymer/login-form/"/>
    <link rel="import" href="/polymer/register-form/"/>
    <link rel="import" href="/polymer/post-card/"/>
    <link rel="import" href="/polymer/paper-password/"/>
    <link rel="import" href="/polymer/my-desk/"/>

    <style type="text/css">
        html, body {
            height: 100%;
            margin: 0;
            background-color: #E5E5E5;
            background: url(<?php echo Yii::app()->request->baseUrl; ?>/assets/images/background.png) #E5E5E5 center center no-repeat;
            font-family: 'RobotoDraft', sans-serif;
        }

        h1 {
            display: block;
        }
    </style>
    <title>MOWeb &mdash; <?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body unresolved>
<moweb-app>
<?php echo $content ?>
</moweb-app>
</body>
</html>
