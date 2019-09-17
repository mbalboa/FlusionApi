<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiveFlux extends Model
{
    // Nom du tableau dans MySQL.
    protected $table='Flux_Receive';

    // Eloquent suppose que chaque table a une clé primaire avec une colonne appelée id.
    protected $primaryKey = 'Numero';

    // Des attributs qui peuvent être assignés massivement.
    protected $fillable = array('IDF','Demande','Demandeur','Environnement','Serveur','Pivot','Libelle_Flux',
    'Repertoire','Fichier','Partenaire','NIDF','Ftype','Fcode','Table_Transco','Remplacement_Fichier','Fichier_Vide',
    'Rep_Flag','Fichier_Flag','Schedule','Job','Rep_Sauvegarde','Partage_Pivot','Partage_Serveur');

    // Ici nous mettons les champs que nous ne voulons pas retourner dans les requêtes.
    protected $hidden = ['created_at','updated_at'];

}
