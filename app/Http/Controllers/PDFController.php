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

         if(Auth::user()->user_roles == 'doctor' || Auth::user()->user_roles == 'adminM'){
           $nameUser = Medecin::find(Auth::user()->id)->nom.' '.Medecin::find(Auth::user()->id)->prenom;
           return $nameUser;
         }else if(Auth::user()->user_roles == 'patient'){
           $nameUser = \DB::table('patients')->where('user_id',Auth::user()->id)->get();
           return $nameUser;
         }
     }

     public function getOrdannance(Request $request,$id)
     {

        $patient = \DB::table('prescriptions')->where('prescriptions.id', $id)
            ->join('patients','patients.id','=','prescriptions.patient_id')
            ->select('prescriptions.date','patients.nom','patients.prenom',
            'patients.Num_Secrurite_Social','patients.date_naiss')
            ->get();
        $prescriptions = \DB::table('prescriptions')->where('prescriptions.id', $id)
            ->join('ligne__prescriptons','ligne__prescriptons.prescription_id','=','prescriptions.id')
            ->select('ligne__prescriptons.medicament as medicament',
            'ligne__prescriptons.dose as dose','ligne__prescriptons.moment_prises as moment_prises',
            'ligne__prescriptons.duree_traitement as duree_traitement')
            ->get();
          if(Auth::user()->user_roles == 'patient'){
            $nameUser = \DB::table('medecins')->where('id',$request->medecin_id)->select('nom','prenom')->get();
            return view('myPDF',['prescriptions'=>$prescriptions,'users'=>$nameUser,'patient'=>$patient]);
          }
        return view('myPDF',['prescriptions'=>$prescriptions,'users'=>$this->getNameUsers(),'patient'=>$patient]);
     }

    public function generatePDF(Request $request,$id)
    {

      $patient = \DB::table('prescriptions')->where('prescriptions.id', $id)
            ->join('patients','patients.id','=','prescriptions.patient_id')
            ->select('prescriptions.date','patients.nom','patients.prenom',
            'patients.Num_Secrurite_Social','patients.date_naiss')
            ->get();
      $prescriptions = \DB::table('prescriptions')->where('prescriptions.id', $id)
            ->join('ligne__prescriptons','ligne__prescriptons.prescription_id','=','prescriptions.id')
            ->select('ligne__prescriptons.medicament as medicament',
            'ligne__prescriptons.dose as dose','ligne__prescriptons.moment_prises as moment_prises',
            'ligne__prescriptons.duree_traitement as duree_traitement')
            ->get();
            if(Auth::user()->user_roles == 'patient'){
              $nameUser = \DB::table('medecins')->where('id',$request->medecin_id)->select('nom','prenom')->get();
              $pdf = PDF::loadView('myPDF', ['users'=>$nameUser,'patient'=>$patient,'prescriptions'=>$prescriptions]);
                  foreach ($patient as $p) {
                    $nom = $p->nom;
                    $prenom = $p->prenom;
                  }
                  return $pdf->download('ordonnance '.$nom.' '.$prenom.'.pdf');
            }
      $pdf = PDF::loadView('myPDF', ['users'=>$this->getNameUsers(),'patient'=>$patient,'prescriptions'=>$prescriptions]);
          foreach ($patient as $p) {
            $nom = $p->nom;
            $prenom = $p->prenom;
          }
          return $pdf->download('ordonnance '.$nom.' '.$prenom.'.pdf');
    }

    public function getLettreOrientation($idLettre)
    {
      $date=Carbon::now()->format('Y-m-d');
      $patient = \DB::table('lettre__orientations')->where('lettre__orientations.id', $idLettre)
            ->join('patients','patients.id','=','lettre__orientations.patient_id')
            ->select('lettre__orientations.date','patients.nom','patients.prenom',
            'lettre__orientations.contenu','patients.date_naiss')
            ->get();
      $specialite = Medecin::find(Auth::user()->id)->specialite;

      return view('myPDFLettre',['specialite'=>$specialite,'users'=>$this->getNameUsers(),'patient'=>$patient]);
    }
    public function generatePDFLettre($idlettre)
    {

      $patient = \DB::table('lettre__orientations')->where('lettre__orientations.id', $idlettre)
            ->join('patients','patients.id','=','lettre__orientations.patient_id')
            ->select('lettre__orientations.date','patients.nom','patients.prenom',
            'lettre__orientations.contenu','patients.date_naiss')
            ->get();
      $specialite = Medecin::find(Auth::user()->id)->specialite;

          $pdf = PDF::loadView('myPDFLettre', ['specialite'=>$specialite,'users'=>$this->getNameUsers(),'patient'=>$patient]);

          foreach ($patient as $p) {
            $nom = $p->nom;
            $prenom = $p->prenom;
          }
          return $pdf->download('lettreOrientation '.$nom.' '.$prenom.'.pdf');
    }
}
