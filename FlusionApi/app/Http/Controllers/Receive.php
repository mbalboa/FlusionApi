<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReceiveFlux;

class Receive extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status'=>'ok','data'=>ReceiveFlux::all()], 200);
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
      $flux = new ReceiveFlux;

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
      $flux->Ftype = $request->Ftype;
      $flux->Fcode = $request->Fcode;
      $flux->Table_Transco = $request->Table_Transco;
      $flux->Remplacement_Fichier = $request->Remplacement_Fichier;
      $flux->Fichier_Vide = $request->Fichier_Vide;
      $flux->Rep_Flag = $request->Rep_Flag;
      $flux->Fichier_Flag = $request->Fichier_Flag;
      $flux->Schedule = $request->Schedule;
      $flux->Job = $request->Job;
      $flux->Rep_Sauvegarde = $request->Rep_Sauvegarde;
      $flux->Partage_Pivot = $request->Partage_Pivot;
      $flux->Partage_Serveur = $request->Partage_Serveur;

      $flux->save();

      //Génération fichiers ReceiveFlux

      $idf=$_REQUEST['IDF'];
      $name= $idf;
      $name .= "_R";
      $Receive=fopen("$name.txt","w") or die ("Erreur lors de la création");
      $ParmReceive=fopen("$idf.txt","w") or die ("Erreur lors de la création");


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
      $ftype=$_REQUEST['Ftype'];
      $fcode=$_REQUEST['Fcode'];
      $table_transco=$_REQUEST['Table_Transco'];
      $remplacement_fichier=$_REQUEST['Remplacement_Fichier'];
      $fichier_vide=$_REQUEST['Fichier_Vide'];
      $rep_flag=$_REQUEST['Rep_Flag'];
      $fichier_flag=$_REQUEST['Fichier_Flag'];
      $schedule=$_REQUEST['Schedule'];
      $job=$_REQUEST['Job'];
      $rep_sauvegarde=$_REQUEST['Rep_Sauvegarde'];
      $partage_pivot=$_REQUEST['Partage_Pivot'];
      $partage_serveur=$_REQUEST['Partage_Serveur'];


      //Ecriture fichier Idf_Receive
      fwrite($Receive,"/***************************************************************************************************/" . PHP_EOL);
      fwrite($Receive,"/* $idf                                                                                        */" . PHP_EOL);
      fwrite($Receive,"/*-------------------------------------------------------------------------------------------------*/" . PHP_EOL);
      fwrite($Receive,"/* Origine:   $partenaire                                                                             */" . PHP_EOL);
      fwrite($Receive,"/* Cible:     $serveur                                                                           */" . PHP_EOL);


      $spa="";
      for ($i = 1; $i <= 85-strlen($libelle_flux); $i++) {
           $spa .= " ";
      }
      fwrite($Receive,"/* Libellé:   $libelle_flux$spa*/" . PHP_EOL);


      $spa="";
      for ($i = 1; $i <= 85-strlen($demande); $i++) {
           $spa .= " ";
      }
      fwrite($Receive,"/* Demande:   $demande$spa*/" . PHP_EOL);


      $spa="";
      for ($i = 1; $i <= 85-strlen($demandeur); $i++) {
           $spa .= " ";
      }
      fwrite($Receive,"/* Demandeur: $demandeur$spa*/" . PHP_EOL);

      fwrite($Receive,"/***************************************************************************************************/" . PHP_EOL);
      fwrite($Receive, PHP_EOL);

      if(!empty($nidf)){

      fwrite($Receive,"CFTIDF     ");
      fwrite($Receive,"ID       = " . $idf . "," . PHP_EOL);
      fwrite($Receive,"            NIDF    = " . $nidf . "," . PHP_EOL);
      fwrite($Receive,"            PART    = " . $partenaire . "," . PHP_EOL);
      fwrite($Receive,"            TYPE    = RECV" . PHP_EOL . PHP_EOL);

      }


      fwrite($Receive,"CFTRECV     ");
      fwrite($Receive,"ID       = " . $idf . "," . PHP_EOL);
      fwrite($Receive,"            Fname    = /data/" . $pivot . "/" . $envrionnement . "/tmp/&&idf_&&part_&&idt.txt," . PHP_EOL);
      fwrite($Receive,"            Ftype    = " . $ftype . "," . PHP_EOL);
      fwrite($Receive,"            Fcode    = " . $fcode . "," . PHP_EOL);
      fwrite($Receive,"            XLATE    = " . $table_transco . "," . PHP_EOL);
      fwrite($Receive,"            Exec     = /data/" . $pivot . "/cft/scripts/opcon/CFTPS_ScriptProcCFT.ksh," . PHP_EOL);
      fwrite($Receive,"            Exece    = /data/" . $pivot . "/cft/scripts/opcon/CFTPS_ScriptProcCFT.ksh");
      //Fin Ecriture fichier idf_Receive


      //Ecriture fichier Parm_Receive

      fwrite($ParmReceive,"IDF= " . $idf . PHP_EOL);
      fwrite($ParmReceive,"SERVEUR= " . $serveur . PHP_EOL);
      fwrite($ParmReceive,"REP_SAMBA_PIVOT= " . $partage_pivot . PHP_EOL);
      fwrite($ParmReceive,"REP_SAMBA_DIST= " . $partage_serveur . PHP_EOL);
      fwrite($ParmReceive,"REP_SVG= " . $rep_sauvegarde . PHP_EOL);
      fwrite($ParmReceive,"REP_FLAG= " . $rep_flag . PHP_EOL);
      fwrite($ParmReceive,"NOM_FLAG_APPL= " . $fichier_flag . PHP_EOL);
      fwrite($ParmReceive,"REP_APPL= " . $repertoire . PHP_EOL);
      fwrite($ParmReceive,"NOM_FIC_APPL= " . $fichier . PHP_EOL);
      fwrite($ParmReceive,"REPLACE_FIC_APPL= " . $remplacement_fichier . PHP_EOL);
      fwrite($ParmReceive,"TRAITE_FIC_VIDE= " . $fichier_vide . PHP_EOL);
      fwrite($ParmReceive,"NOM_SCHED= " . $schedule . PHP_EOL);
      fwrite($ParmReceive,"NOM_JOB= " . $job . PHP_EOL);

      //Fin Ecriture fichier parm_Receive

      echo "Fichiers créer parfaitement.";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IDF)
    {
      $flux=ReceiveFlux::find($IDF);

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
