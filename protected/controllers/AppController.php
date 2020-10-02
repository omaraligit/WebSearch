<?php

class AppController extends Controller
{

	public function actionSeed()
	{
		// filling the database with dummy data
		$model=new SearchForm;
		if(isset($_POST["seed"]))
		{
			for ($i=0; $i < 20; $i++) { 
				$post=new Search();
				$post->nom='post de test';
				$post->titre='post de test';
				$post->description='post de test';


				$post->date_debut=$this->getRandomDate();
				$post->date_expiration=$this->getRandomDate();
				$post->activation=true;
				$post->save();
			}
		}
    	$this->render('seed',array('model'=>$model));
	}

	
	public function actionSearch()
	{
		$model=new SearchForm;
		if(isset($_POST['SearchForm']))
		{
			// récupère les données postées par l'utilisateur
			$model->attributes=$_POST['SearchForm'];
			// valide les données envoyées par l'utilisateur et
			// redirige sur la page précédente si les données sont validées.
			if($model->validate()){
				$post=new Search();
				$post->nom='post de test';
				$post->titre='post de test';
				$post->description='post de test';
				$post->date_debut=date("Y-m-d");
				$post->date_expiration=date("Y-m-d");
				$post->activation=true;
				$post->save();
			}
		}
		// affiche le formulaire de connexion
    	$this->render('search',array('model'=>$model));
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
}