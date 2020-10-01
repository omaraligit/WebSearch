<?php

$this->pageTitle=Yii::app()->name . ' - Search';
$this->breadcrumbs=array(
	'Search',
);
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>
<div class="form">
<?php echo CHtml::beginForm(); ?>
 
    <?php echo CHtml::errorSummary($model); ?>
 
    <div class="">
        <?php echo CHtml::activeLabel($model,'nom'); ?>
        <?php echo CHtml::activeTextField($model,'nom') ?>
    </div>
 
    <div class="">
        <?php echo CHtml::activeLabel($model,'titre'); ?>
        <?php echo CHtml::activeTextField($model,'titre') ?>
    </div>
 
    <div class="">
        <?php echo CHtml::activeLabel($model,'description'); ?>
        <?php echo CHtml::activeTextField($model,'description'); ?>
    </div>

	<div class="">
        <?php echo CHtml::activeLabel($model,'date_debut'); ?>
        <?php echo CHtml::activeTextField($model,'date_debut',array('placeholder'=>'...')); ?>
    </div>

	<div class="">
        <?php echo CHtml::activeLabel($model,'date_expiration'); ?>
        <?php echo CHtml::activeTextField($model,'date_expiration',array('placeholder'=>'...')); ?>
    </div>

	<div class="">
        <?php echo CHtml::activeLabel($model,'activation'); ?>
        <?php echo CHtml::activeDropDownList($model,'activation',array('1'=>'active','0'=>'non active')); ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
