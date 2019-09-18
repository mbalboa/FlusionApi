<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SendFlux;

class Send extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status'=>'ok','data'=>SendFlux::all()], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $flux = new SendFlux;

      $flux->IDF = $request->IDF;
      $flux->Demande = $request->Demande;
      $flux->Demandeur = $request->Demandeur;
      $flux->Environnement = $request->Environnement;
      $flux->Serveur = $request->Serveur;
      $flux->Pivot = $request->Pivot;
      $flux->Libelle_Flux = $request->Libelle_Flux;
      $flux->Repertoire = $request->Repertoire;
      $flux->Fichier = $request->Fichier;
      $flux->Partenaire = $request->Partenaire;
      $flux->NIDF = $request->NIDF;
      $flux->NFNAME = $request->NFNAME;
      $flux->PARM = $request->PARM;
      $flux->Format = $request->Format;
      $flux->Longueur = $request->Longueur;
      $flux->Ftype = $request->Ftype;
      $flux->Ntype = $request->Ntype;
      $flux->Fcode = $request->Fcode;
      $flux->Ncode = $request->Ncode;
      $flux->Table_Transco = $request->Table_Transco;
      $flux->Fichier_Vide = $request->Fichier_Vide;
      $flux->Fichier_Absent = $request->Fichier_Absent;
      $flux->Suppr_Fichier_Source = $request->Suppr_Fichier_Source;
      $flux->Concatenation = $request->Concatenation;
      $flux->Rep_Sauvegarde = $request->Rep_Sauvegarde;
      $flux->Rep_Temporaire = $request->Rep_Temporaire;
      $flux->Partage_Pivot = $request->Partage_Pivot;
      $flux->Partage_Serveur = $request->Partage_Serveur;

      $flux->save();

//Génération des fichiers

      $idf=$_REQUEST['IDF'];
      $name= $idf;
      $name .= "_S";
      $Send=fopen("$name.txt","w") or die ("Erreur lors de la création1");
      $ParmSend=fopen("$idf.txt","w") or die ("Erreur lors de la création2");


      $demande=$_REQUEST['Demande'];
      $demandeur=$_REQUEST['Demandeur'];
      $envrionnement=$_REQUEST['Environnement'];
      $serveur=$_REQUEST['Serveur'];
      $pivot=$_REQUEST['Pivot'];
      $libelle_flux=$_REQUEST['Libelle_Flux'];
      $repertoire=$_REQUEST['Repertoire'];
      $fichier=$_REQUEST['Fichier'];
      $partenaire=$_REQUEST['Partenaire'];
      $nidf=$_REQUEST['NIDF'];
      $nfname=$_REQUEST['NFNAME'];
      $parm=$_REQUEST['PARM'];
      $format=$_REQUEST['Format'];
      $longueur=$_REQUEST['Longueur'];
      $ftype=$_REQUEST['Ftype'];
      $ntype=$_REQUEST['Ntype'];
      $fcode=$_REQUEST['Fcode'];
      $ncode=$_REQUEST['Ncode'];
      $table_transco=$_REQUEST['Table_Transco'];
      $fichier_vide=$_REQUEST['Fichier_Vide'];
      $fichier_absent=$_REQUEST['Fichier_Absent'];
      $suppr_fichier_source=$_REQUEST['Suppr_Fichier_Source'];
      $concatenation=$_REQUEST['Concatenation'];
      $rep_sauvegarde=$_REQUEST['Rep_Sauvegarde'];
      $rep_temporarire=$_REQUEST['Rep_Temporaire'];
      $partage_pivot=$_REQUEST['Partage_Pivot'];
      $partage_serveur=$_REQUEST['Partage_Serveur'];


      //Ecriture fichier Idf_Send
      fwrite($Send,"/***************************************************************************************************/" . PHP_EOL);
      fwrite($Send,"/* $idf                                                                                        */" . PHP_EOL);
      fwrite($Send,"/*-------------------------------------------------------------------------------------------------*/" . PHP_EOL);
      fwrite($Send,"/* Origine:   $serveur                                                                           */" . PHP_EOL);
      fwrite($Send,"/* Cible:     $partenaire                                                                             */" . PHP_EOL);


      $spa="";
      for ($i = 1; $i <= 85-strlen($libelle_flux); $i++) {
           $spa .= " ";
      }
      fwrite($Send,"/* Libellé:   $libelle_flux$spa*/" . PHP_EOL);


      $spa="";
      for ($i = 1; $i <= 85-strlen($demande); $i++) {
           $spa .= " ";
      }
      fwrite($Send,"/* Demande:   $demande$spa*/" . PHP_EOL);


      $spa="";
      for ($i = 1; $i <= 85-strlen($demandeur); $i++) {
           $spa .= " ";
      }
      fwrite($Send,"/* Demandeur: $demandeur$spa*/" . PHP_EOL);

      fwrite($Send,"/***************************************************************************************************/" . PHP_EOL);
      fwrite($Send, PHP_EOL);


      fwrite($Send,"CFTSEND     ");
      fwrite($Send,"ID       = " . $idf . "," . PHP_EOL);
      fwrite($Send,"            Ftype    = " . $ftype . "," . PHP_EOL);
      fwrite($Send,"            Ntype    = " . $ntype . "," . PHP_EOL);
      fwrite($Send,"            Fcode    = " . $fcode . "," . PHP_EOL);
      fwrite($Send,"            Ncode    = " . $ncode . "," . PHP_EOL);
      fwrite($Send,"            XLATE    = " . $table_transco . "," . PHP_EOL);
      fwrite($Send,"            FRECFM   = " . $format . "," . PHP_EOL);
      fwrite($Send,"            FLRECL   = " . $longueur . "," . PHP_EOL);
      fwrite($Send,"            Exec     = /data/" . $pivot . "/cft/scripts/opcon/CFTPS_ScriptProcCFT.ksh," . PHP_EOL);
      fwrite($Send,"            Exece    = /data/" . $pivot . "/cft/scripts/opcon/CFTPS_ScriptProcCFT.ksh");
      //Fin Ecriture fichier idf_send

      //Ecriture fichier Parm_Send

      fwrite($ParmSend,"IDF=" . $idf . PHP_EOL);
      fwrite($ParmSend,"NIDF=" . $nidf . PHP_EOL);
      fwrite($ParmSend,"PART=" . $partenaire . PHP_EOL);
      fwrite($ParmSend,"PARM=" . $parm . PHP_EOL);
      fwrite($ParmSend,"NFNAME=" . $nfname . PHP_EOL);
      fwrite($ParmSend,"ENV_FIC_VIDE=" . $fichier_vide . PHP_EOL);
      fwrite($ParmSend,"ERR_SI_ABSENT=" . $fichier_absent . PHP_EOL);
      fwrite($ParmSend,"SUPP_FIC_SOURCE=" . $suppr_fichier_source . PHP_EOL);
      fwrite($ParmSend,"CONCAT=" . $concatenation . PHP_EOL);
      fwrite($ParmSend,"FICIN=" . $fichier . PHP_EOL);
      fwrite($ParmSend,"FICEX=" . PHP_EOL);
      fwrite($ParmSend,"REPIN=" . $repertoire . PHP_EOL);
      fwrite($ParmSend,"REPSVG=" . $rep_sauvegarde . PHP_EOL);
      fwrite($ParmSend,"REPTMP=" . $rep_temporarire . PHP_EOL);
      fwrite($ParmSend,"REP_PIVOT=" . $partage_pivot . PHP_EOL);
      fwrite($ParmSend,"REP_DIST=" . $partage_serveur);
      //Fin Ecriture fichier parm_send

      echo "Fichiers générés.";


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IDF)
    {
      $flux=SendFlux::find($IDF);

      if (!$flux)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'Aucun flux avec ce idf'])],404);
        }
            return response()->json(['status'=>'ok','data'=>$flux],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
