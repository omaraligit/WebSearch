<?php
/* @var $this AppController */
/* @var $model SearchForm */
$this->pageTitle=Yii::app()->name . ' - Search';
$this->breadcrumbs=array(
	'Search',
);
?>

<h1>RECHERCHE AVANCÉE</h1>

<p class="s-alert" >Vous pouvez entre un operateur de comparaison (<,>,=,>=,<=,<>ou =) au debut de chacune de vos valeur:</p>
<div class="form">
<?php echo CHtml::beginForm('','GET'); ?>
 
    <?php echo CHtml::errorSummary($model); ?>
 
    <div class="row row-flex">
        <div class="d-inline-block w-100">
            <?php echo CHtml::activeLabel($model,'nom'); ?>
            <?php echo CHtml::activeTextField($model,'nom',array('placeholder'=>'(<,>,=,>=,<=,<> ou =...text','value'=>(isset($_GET['SearchForm']))? $_GET['SearchForm']['nom'] : '')) ?>
        </div>
    
        <div class="d-inline-block w-100">
            <?php echo CHtml::activeLabel($model,'titre'); ?>
            <?php echo CHtml::activeTextField($model,'titre',array('placeholder'=>'(<,>,=,>=,<=,<> ou =...text','value'=>(isset($_GET['SearchForm']))? $_GET['SearchForm']['titre'] : '')) ?>
        </div>
    
        <div class="d-inline-block w-100">
            <?php echo CHtml::activeLabel($model,'description'); ?>
            <?php echo CHtml::activeTextField($model,'description',array('placeholder'=>'(<,>,=,>=,<=,<> ou =...text','value'=>(isset($_GET['SearchForm']))? $_GET['SearchForm']['description'] : '')); ?>
        </div>
    </div>

    <div class="row row-flex">
        <div class="d-inline-block w-100">
            <?php echo CHtml::activeLabel($model,'date_debut'); ?>
            <?php echo CHtml::activeTextField($model,'date_debut',array('placeholder'=>'YYYY-mm-dd','value'=>(isset($_GET['SearchForm']))? $_GET['SearchForm']['date_debut'] : '')); ?>
        </div>

        <div class="d-inline-block w-100">
            <?php echo CHtml::activeLabel($model,'date_expiration'); ?>
            <?php echo CHtml::activeTextField($model,'date_expiration',array('placeholder'=>'YYYY-mm-dd','value'=>(isset($_GET['SearchForm']))? $_GET['SearchForm']['date_expiration'] : '')); ?>
        </div>

        <div class="d-inline-block w-100">
            <?php echo CHtml::activeLabel($model,'activation'); ?>
            <?php echo CHtml::activeDropDownList($model,'activation',array(''=>' ','1'=>'active','0'=>'non active')); ?>
        </div>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>
 
<?php echo CHtml::endForm(); ?>


<!-- ------------- -->
<!-- results table -->
<!-- ------------- -->
<?php if (isset($_GET['SearchForm'])): ?>
    <p class="s-alert text-center" >
        Afficher les resultat 
        de <?= (isset($_GET['page'])) ? ($_GET['page']*$this->pagerSize-$this->pagerSize+1) : 1 ?>
        a <?= (isset($_GET['page']))? ($_GET['page']*$this->pagerSize) : $this->pagerSize ?>
        (total de <?= $searchCounter; ?>)
    </p>
    <table>
        <tr>
            <th>nom</th>
            <th>titre</th>
            <th>description</th>
            <th>Date debut</th>
            <th>Date Expiration</th>
            <th class="text-center" >Activation</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php foreach ($search as $key => $searchRow): ?>
            <tr>
                <td><?php echo $searchRow->nom; ?></td>
                <td><?php echo $searchRow->titre; ?></td>
                <td><?php echo $searchRow->description; ?></td>
                <td><?php echo $searchRow->date_debut; ?></td>
                <td><?php echo $searchRow->date_expiration; ?></td>
                <td class="activation-col" >
                    <span class="activation <?= ($searchRow->activation)? 'active' : 'not-active' ?>" ></span>
                </td>
                <td><span class="tag" ><?= ($searchRow->status)? 'fini' : 'en cours' ?></span></td>
                <td>Action</td>
            </tr>
        <?php endforeach ?>
    </table>
    <!-- ------------- -->
    <!-- pagination    -->
    <!-- ------------- -->
        <div class="pagination">
            <?php for ($i=1; $i <= ceil($searchCounter / $this->pagerSize); $i++): ?>
                <a
                href="<?=  Yii::app()->request->requestUri; ?>&page=<?= $i ?>"
                class="page-item <?= (isset($_GET['page']) && $_GET['page']==$i)? 'active-link' : ' ' ?>" ><?= $i; ?></a>
            <?php endfor ?>
        </div>
    <!-- ------------- -->
    <!-- end pagination-->
    <!-- ------------- -->
<?php endif ?>
<!-- ------------- -->
<!-- results table -->
<!-- ------------- -->
</div>
