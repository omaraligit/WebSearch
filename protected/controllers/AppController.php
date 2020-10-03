<?php

class AppController extends Controller
{

	public $pagerSize = 5;
	public function actionSeed()
	{
		// filling the database with dummy data
		$model=new SearchForm;
		if(isset($_POST["seed"]))
		{
			for ($i=0; $i < 20; $i++) { 
				$dummy_product=new Search();
				$dummy_product->nom = $this->getRandomName(1);
				$dummy_product->titre = $this->getRandomName(2);
				$dummy_product->description = $this->getRandomName(3);
				$dummy_product->date_debut = $this->getRandomDate();
				$dummy_product->date_expiration = $this->getRandomDate();
				$dummy_product->activation = (random_int(0,1) == 1) ? true : false;
				$dummy_product->status = (random_int(0,1) == 1) ? true : false;
				$dummy_product->save();
			}
		}
    	$this->render('seed',array('model'=>$model));
	}

	
	public function actionSearch()
	{
		$model=new SearchForm;
		$search = null;
		$searchCounter = null;
		if(isset($_GET['SearchForm']))
		{
			// récupère les données postées par l'utilisateur
			$model->attributes=$_GET['SearchForm'];
			// creation de la chaine sql pour retirer les >,<,=,<=,>=,<>...
			// pour sela un function helper sera introduit
			$sqlConditions = '1=1 ' . $this->getSQLConditions($_GET['SearchForm']);
			$sqlConditionsParamsArray = $this->getSQLConditionsParamsArray($_GET['SearchForm']);
			// add sql part foe the active - non active records
			if ($_GET['SearchForm']['activation'] != '') {
				$sqlConditions .= ' and activation = :activation';
				$sqlConditionsParamsArray[':activation'] = $_GET['SearchForm']['activation'];
			}
			// calculer offset
			$offset =(isset($_GET['page'])) ? ($this->pagerSize*$_GET['page']-$this->pagerSize):0;
			var_dump($offset);
			// retirer les donnees
			// trouve les lignes
			$search=Search::model()->findAll($sqlConditions. ' limit '.$this->pagerSize.' offset '. $offset,$sqlConditionsParamsArray);
			$searchCounter=Search::model()->count($sqlConditions,$sqlConditionsParamsArray);
		}
		// affiche le formulaire de recherche plus les resultats if wee found any
    	$this->render('search',array('model'=>$model,'search'=>$search,'searchCounter'=>$searchCounter));
	}

	public function getRandomDate()
	{
		//Start point of our date range.
		$start = strtotime("10 September 2000");
		//End point of our date range.
		$end = strtotime("22 July 2010");
		//Custom range.
		$timestamp = mt_rand($start, $end);
		//Print it out.
		return date("Y-m-d", $timestamp);
	}

	public function getRandomName($max=5)
	{
		// this fun is a way to seed the database 
		// i didnt want to us composer / faker / db-seeder
		// yii1 is a bit old so its batter to stay away from composer and all that 

		$dictionary = ["kehypel","cosmicstudentl","terratasticl","levelpostsl","thunderpml","stopnjl","greatestportall","spiritflowerl","sanfranciscoakl","shoesbasketl","journeyprofitl","pennyforlifel","uxdigl","girlsharkl","jacatl","campfishingl","internationalsidel","bosspaintl","batterysclubl","coldsiml","daddyelectricl","arizonabbl","matrixresortl","petroformulal","privatefanl","vividngl","ringdepotl","twitterrulesl","jacksonmakerl","virginfieldl","dasshieldl","chrispassl","bikinicraftsl"];
		$string = "";
		for ($i=0; $i < $max; $i++) { 
			$string .= ' ' . $dictionary[random_int(0,count($dictionary)-1)];
		}
		return trim($string);
	}

	public function getSQLConditions($post)
	{
		$sqlHelper = "";
		foreach ($post as $key => $val) {
			$sqlSeparator = $this->findWhatSignIsFirst($val);
			if ($sqlSeparator != '') {
				$sqlHelper .= ' and ' . $key . ' ' . $sqlSeparator .' :' . $key;
			}
		}

		// wee always have a trailing and at the end
		// to remouve that we trim the string from start - 4 charachters and + a trailing space 
		// return substr($sqlHelper,0,strlen($sqlHelper)-4);
		return $sqlHelper;
	}
	public function getSQLConditionsParamsArray($post)
	{
		$params = array();
		foreach ($post as $key => $val) {
			if ($val != '') {
				$params[':' . $key] = $this->cleanStringFromSigns($val);
			}
		}
		return $params;
	}

	public function findWhatSignIsFirst($input)
	{
		// return the sign used at the first of input
		// e g { >,<,=,<=,>=,<>,=}
		$findme = ['<=','>=','<>','>','<','='];
		
		foreach ($findme as $sign) {
			if (strpos($input, $sign) !== false ){
				return $sign;
			}
		}
		return '';

	}

	public function cleanStringFromSigns($string)
	{
		$findme = ['<=','>=','<>','>','<','='];
		
		foreach ($findme as $sign) {
			$string = str_replace($sign,'',$string);
		}
		return($string);
	}
}