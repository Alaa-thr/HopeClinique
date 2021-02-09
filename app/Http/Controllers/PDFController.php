<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Medecin;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function getNameUsers()
     {
         $nameUser = Medecin::find(Auth::user()->id)->nom.' '.Medecin::find(Auth::user()->id)->prenom;
         return $nameUser;
     }
    public function generatePDF($id)
    {
      $date=Carbon::now()->format('Y-m-d');
      $patient = \DB::table('prescriptions')->where([['patient_id', $id],['date', $date]])
            ->join('patients','patients.id','=','prescriptions.patient_id')
            ->select('prescriptions.date','patients.nom','patients.prenom',
            'patients.Num_Secrurite_Social','patients.date_naiss')
            ->get();
      $prescriptions = \DB::table('prescriptions')->where([['patient_id', $id],['date', $date]])
            ->join('ligne__prescriptons','ligne__prescriptons.prescription_id','=','prescriptions.id')
            ->select('ligne__prescriptons.medicament as medicament',
            'ligne__prescriptons.dose as dose','ligne__prescriptons.moment_prises as moment_prises',
            'ligne__prescriptons.duree_traitement as duree_traitement')
            ->get();
            echo $this->getNameUsers();
            $pdf = PDF::loadView('myPDF', ['nameUser'=>$this->getNameUsers(),'patient'=>$patient,'prescriptions'=>$prescriptions]);
          foreach ($patient as $p) {
            $nom = $p->nom;
            $prenom = $p->prenom;
          }
          return $pdf->download('ordonnance '.$nom.' '.$prenom.'.pdf');
    }

    public function generatePDFLettre($id)
    {
      $date=Carbon::now()->format('Y-m-d');
      $patient = \DB::table('lettre__orientations')->where([['patient_id', $id],['date', $date]])
            ->join('patients','patients.id','=','lettre__orientations.patient_id')
            ->select('lettre__orientations.date','patients.nom','patients.prenom',
            'lettre__orientations.contenu','patients.date_naiss')
            ->get();
      $specialite = Medecin::find(Auth::user()->id)->specialite;

          $pdf = PDF::loadView('myPDFLettre', ['specialite'=>$specialite,'nameUser'=>$this->getNameUsers(),'patient'=>$patient]);

          foreach ($patient as $p) {
            $nom = $p->nom;
            $prenom = $p->prenom;
          }
          return $pdf->download('lettreOrientation '.$nom.' '.$prenom.'.pdf');
    }
}
