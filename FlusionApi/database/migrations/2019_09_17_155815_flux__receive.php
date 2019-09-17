<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FluxReceive extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('Flux_Receive', function(Blueprint $table) {
        $table->increments('Numero');
        $table->timestamps();
        $table->string('IDF');
        $table->string('Demande');
        $table->string('Demandeur');
        $table->string('Environnement');
        $table->string('Serveur');
        $table->string('Pivot');
        $table->text('Libelle_Flux');
        $table->string('Repertoire');
        $table->string('Fichier');
        $table->string('Partenaire');
        $table->string('NIDF');
        $table->string('Ftype');
        $table->string('Fcode');
        $table->string('Table_Transco');
        $table->string('Remplacement_Fichier');
        $table->string('Fichier_Vide');
        $table->string('Rep_Flag');
        $table->string('Fichier_Flag');
        $table->string('Schedule');
        $table->string('Job');
        $table->string('Rep_Sauvegarde');
        $table->string('Partage_Pivot');
        $table->string('Partage_Serveur');
});
}


  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::drop('Flux_Receive');
  }
}
