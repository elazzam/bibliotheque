<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCataloguesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('catalogues', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('reference');
            $table->string('designation');
            $table->text('commentaire');
            $table->text('departement');
            $table->boolean('disponible');
            $table->string('locataire');
            $table->date('date_sortie');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('catalogues');
	}

}
