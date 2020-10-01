<?php

class Search extends CActiveRecord
{
	public $nom;
	public $titre;
	public $description;
	public $date_debut;
	public $date_expiration;
	public $activation;

	public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'dummy_products';
    }
}