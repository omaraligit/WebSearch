<?php

/**
 * SearchForm class.
 * SearchForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class SearchForm extends CFormModel
{
	public $nom;
	public $titre;
	public $description;
	public $date_debut;
	public $date_expiration;
	public $activation;
	public $status;
	
    
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// here is the required data required
			// array('nom, titre, description', 'required'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'activation'=>'Verification Code',
		);
	}
}