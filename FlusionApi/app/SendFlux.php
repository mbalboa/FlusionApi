<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendFlux extends Model
{
  // Nom du tableau dans MySQL.
  protected $table='Flux_Send';

  // Eloquent suppose que chaque table a une clé primaire avec une colonne appelée id.
	protected $primaryKey = 'Numero';

	// Des attributs qui peuvent être assignés massivement.
	protected $fillable = array('IDF','Demande','Demandeur','Environnement','Serveur','Pivot','Libelle_Flux',
  'Repertoire','Fichier','Partenaire','NIDF','NFNAME','PARM','Format','Longueur','Ftype','Ntype','Fcode','Ncode',
  'Table_Transco','Fichier_Vide','Fichier_Absent','Suppr_Fichier_Source','Concatenation','Rep_Sauvegarde','Rep_Temporaire',
  'Partage_Pivot','Partage_Serveur');

	// Ici nous mettons les champs que nous ne voulons pas retourner dans les requêtes.
	protected $hidden = ['created_at','updated_at'];
}
