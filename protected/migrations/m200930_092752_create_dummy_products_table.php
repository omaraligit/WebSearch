<?php

class m200930_092752_create_dummy_products_table extends CDbMigration
{
	public function up()
	{
		$this->createTable("dummy_products",array(
			'id' => 'pk',
            'nom' => 'string NOT NULL',
            'titre' => 'string NOT NULL',
			'description' => 'text',
			'date_debut' => 'datetime',
			'date_expiration' => 'datetime',
			'activation' => 'boolean'
		));
	}

	public function down()
	{
		$this->dropTable("dummy_products");
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}