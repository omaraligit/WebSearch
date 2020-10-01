<?php

class AppController extends Controller
{

	public function actionSeed()
	{
		// filling the database with dummy data

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
				$post->date_debut=time();
				$post->date_expiration=time();
				$post->activation=true;
				$post->save();
			}
		}
		// affiche le formulaire de connexion
    	$this->render('search',array('model'=>$model));
	}
}