<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" media="screen, projection" />
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="page">

	<header id="header">
        <div id="login">
            <?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Register', 'url'=>array('/user/create'), 'active'=>$this->id=='user'?true:false, 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
        </div>
		<div id="logo"><h1><?php echo CHtml::encode(Yii::app()->name); ?></h1></div>
	</header><!-- header -->

	<nav id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Films', 'url'=>array('/film/index'), 'active'=>$this->id=='film'?true:false),
				array('label'=>'Showings', 'url'=>array('/showing/index'), 'active'=>$this->id=='showing'?true:false),
				array('label'=>'Booking', 'url'=>array('/booking/create'), 'active'=>$this->id=='booking'?true:false, 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'User', 'url'=>array('/user/index'), 'active'=>$this->id=='user'?true:false, 'visible'=>Yii::app()->user->name=='admin'),                
				array('label'=>'Screen', 'url'=>array('/screen/index'), 'active'=>$this->id=='screen'?true:false, 'visible'=>Yii::app()->user->name=='admin'),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Contact', 'url'=>array('/site/page', 'view'=>'contact')),
			),
		)); ?>
	</nav><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<footer id="footer">
		&copy; <?php echo date('Y'); ?>, Amarjeet Rai.<br/>
		All Rights Reserved.
	</footer><!-- footer -->

</div><!-- page -->

</body>
</html>