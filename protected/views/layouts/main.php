<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

    <link rel="stylesheet" href=""<?php echo Yii::app()->request->baseUrl; ?>/css/normalise.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<header id="header">
		<div id="logo"><h1><?php echo CHtml::encode(Yii::app()->name); ?></h1></div>
	</header><!-- header -->

	<nav id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Films', 'url'=>array('/film')),
				array('label'=>'Screen', 'url'=>array('/screen'), 'visible'=>Yii::app()->user->name=='admin'),
				array('label'=>'Showing', 'url'=>array('/showing')),
				array('label'=>'Booking', 'url'=>array('/booking/create'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'User', 'url'=>array('/user'), 'visible'=>Yii::app()->user->name=='admin'),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Register', 'url'=>array('/user/create'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
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
		Copyright &copy; <?php echo date('Y'); ?> by Amarjeet Rai.<br/>
		All Rights Reserved.
	</footer><!-- footer -->

</div><!-- page -->

</body>
</html>