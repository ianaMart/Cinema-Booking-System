<!DOCTYPE html>
<?php
Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerCssFile(Yii::app()->clientScript->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css'); ?>
<html lang="en">
<head>
	<meta charset="utf-8">

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" media="screen, projection" />
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" media="screen, projection" />
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    
    <script>
    $(document).ready(function() {
        $('input[type=text], textarea').each(function() {
            $(this).focus(function() {if($(this).val() == this.defaultValue)
                    $(this).val("");
            });
            $(this).blur(function() {
                if($(this).val() == "")
                    $(this).val(this.defaultValue);
            });
        });
    });
    jQuery(function($) {
        jQuery('#search').autocomplete({'showAnim':'fold','select':function(event, ui) {
                top.location = "/cinema/film/" + ui.item.id;
            },'source':'/cinema/film/search'});
    });
    </script>
</head>

<body>

<div id="page">

	<header id="header">
        <div id="login">
            <?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Register', 'url'=>array('/user/create'), 'active'=>$this->id=='user'?true:false, 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
        </div>
		<div id="logo"><h1><?php echo CHtml::encode(Yii::app()->name); ?></h1></div>
	</header><!-- header -->

	<nav id="mainmenu" class="span-19">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Films', 'url'=>array('/film/index'), 'active'=>$this->id=='film'?true:false),
				array('label'=>'Showings', 'url'=>array('/showing/index'), 'active'=>$this->id=='showing'?true:false),
				array('label'=>'Booking', 'url'=>array('/booking/create'), 'active'=>$this->id=='booking'?true:false, 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Prices', 'url'=>array('/price/index'), 'active'=>$this->id=='user'?true:false, 'visible'=>Yii::app()->user->name=='admin'),
				array('label'=>'User', 'url'=>array('/user/index'), 'active'=>$this->id=='user'?true:false, 'visible'=>Yii::app()->user->name=='admin'),                
				array('label'=>'Screens', 'url'=>array('/screen/index'), 'active'=>$this->id=='screen'?true:false, 'visible'=>Yii::app()->user->name=='admin'),
			),
		)); ?>
	</nav><!-- mainmenu -->
    <div id="fsearch" class="span-4"><input id="search" type="text" value="Search films" name="search" /></div>
    <div class="clearfix"></div>
    
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<footer id="footer">
		<nav id="altnav" class="prepend-18">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Contact', 'url'=>array('/site/page', 'view'=>'contact')),
			),
		)); ?>
	</nav>
	</footer><!-- footer -->

</div><!-- page -->

</body>
</html>