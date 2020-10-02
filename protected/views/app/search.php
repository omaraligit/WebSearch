<?php

$this->pageTitle=Yii::app()->name . ' - Search';
$this->breadcrumbs=array(
	'Search',
);
?>

<h1>RECHERCHE AVANCÉE</h1>

<p class="s-alert" >Vous pouvez entre un operateur de comparaison (<,>,=,>=,<=,<>ou =) au debut de chacune de vos valeur:</p>
<div class="form">
<?php echo CHtml::beginForm(); ?>
 
    <?php echo CHtml::errorSummary($model); ?>
 
    <div class="row row-flex">
        <div class="d-inline-block w-100">
            <?php echo CHtml::activeLabel($model,'nom'); ?>
            <?php echo CHtml::activeTextField($model,'nom') ?>
        </div>
    
        <div class="d-inline-block w-100">
            <?php echo CHtml::activeLabel($model,'titre'); ?>
            <?php echo CHtml::activeTextField($model,'titre') ?>
        </div>
    
        <div class="d-inline-block w-100">
            <?php echo CHtml::activeLabel($model,'description'); ?>
            <?php echo CHtml::activeTextField($model,'description'); ?>
        </div>
    </div>

    <div class="row row-flex">
        <div class="d-inline-block w-100">
            <?php echo CHtml::activeLabel($model,'date_debut'); ?>
            <?php echo CHtml::activeTextField($model,'date_debut',array('placeholder'=>'...')); ?>
        </div>

        <div class="d-inline-block w-100">
            <?php echo CHtml::activeLabel($model,'date_expiration'); ?>
            <?php echo CHtml::activeTextField($model,'date_expiration',array('placeholder'=>'...')); ?>
        </div>

        <div class="d-inline-block w-100">
            <?php echo CHtml::activeLabel($model,'activation'); ?>
            <?php echo CHtml::activeDropDownList($model,'activation',array('1'=>'active','0'=>'non active')); ?>
        </div>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
