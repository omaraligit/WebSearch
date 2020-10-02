<?php

$this->pageTitle=Yii::app()->name . ' - Seed';
$this->breadcrumbs=array(
	'Seed',
);
?>

<h1>SEED DATABASE</h1>

<p class="s-alert" >20 new record will be added after submition</p>
<div class="form">
<?php echo CHtml::beginForm(); ?>
    <input type="hidden" name="seed" value="1">
    <div class="row submit">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
