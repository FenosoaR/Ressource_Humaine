<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function connexion(){

        if(session()->has('LoggedAdmin')){
            // if loggedEtudiant exist
            $admin=DB::table('admin')->where('idAdmin',session('LoggedAdmin'))->first();
            // $liste_personnel= DB::table('personnel')->join('poste','personnel.idPoste','=','poste.id')->get();
            $liste_personnel= DB::table('personnel')
            ->select('personnel.*','poste.libelle')
            ->join('poste', function ($join) {
                $join->on('personnel.idPoste', '=', 'poste.id');
                     
            })->get();
            // $liste_personnel = DB::table('personnel')->get();

            $data=[
                'LoggedAdminInfo'=>$admin,
                'liste_personnel'=> $liste_personnel
            ];
        }
      
     
        return view('personnel',$data);

    }
    public function inscription(){
        return view('page/inscription');
    }
    public function create(Request $request){
        $request->validate([
            'nomAdmin'=>'required',
            'prenomAdmin'=>'required',
            'emailAdmin'=>'required|email|unique:admin',
            'mdpAdmin'=>'required|min:5|max:12'
        ]);
    
        $data=array(
            'nomAdmin'=>$request->nomAdmin,
            'prenomAdmin'=>$request->prenomAdmin,
            'emailAdmin'=>$request->emailAdmin,
            'mdpAdmin'=>Hash::make($request->mdpAdmin)
        );
    
        $resultat=DB::table('admin')->insert($data);
    
        if($resultat){
            return redirect("/")->with('success','Inscription avec success');
        }else{
            return back()->with('error','Inscription error');
        }
    
        }
        public function check(Request $request){

            // return $request->input();
            // Pour test que les request sont bien arriver au controller
        
            $request->validate([
                'emailAdmin'=>'required|email',
                'mdpAdmin'=>'required|min:5|max:12'
            ]);
        
            $admin=DB::table('admin')->where('emailAdmin',$request->emailAdmin)->first();
        
            if($admin){
        
               if(Hash::check($request->mdpAdmin, $admin->mdpAdmin)){
                 // if existe r->mdpE and e->mdpE
        
                 $request->session()->put('LoggedAdmin',$admin->idAdmin);
                 // creation d'un session
        
                 return redirect('/personnel');
        
               }else{
                  return back()->with('error','Mot de passe incorrect');
               }
        
        
            }else{
                return back()->with('error','Pas de compte pour cette email');
            }
        
        
        
            }
            public function logout(){


                    session()->pull('LoggedAdmin');
                    return redirect('/');

            }
    }

