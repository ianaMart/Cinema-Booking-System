<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Prototype of <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>On the films page, the system uses the Rotten Tomatoes API to display film information, so an internet connection will be required.</p>

<p>In the final version you should see a list of films showing, films that are coming soon, and films that have been released onto DVD/Blu-ray.</p>

<p>Please login as admin to see more options.</p>

<ul>
	<li>View file: <tt><?php echo __FILE__; ?></tt></li>
	<li>Layout file: <tt><?php echo $this->getLayoutFile('main'); ?></tt></li>
</ul>