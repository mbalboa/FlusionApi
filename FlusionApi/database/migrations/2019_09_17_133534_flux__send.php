<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FluxSend extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Flux_Send', function(Blueprint $table) {
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
          $table->string('NFNAME');
          $table->string('PARM');
          $table->string('Format');
          $table->integer('Longueur');
          $table->string('Ftype');
          $table->string('Ntype');
          $table->string('Fcode');
          $table->string('Ncode');
          $table->string('Table_Transco');
          $table->string('Fichier_Vide');
          $table->string('Fichier_Absent');
          $table->string('Suppr_Fichier_Source');
          $table->string('Concatenation');
          $table->string('Rep_Sauvegarde');
          $table->string('Rep_Temporaire');
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
        Schema::drop('Flux_Send');
    }
}
