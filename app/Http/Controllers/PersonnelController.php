<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonnelController extends Controller
{

    public function ajouter()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = DB::table('admin')->where('idAdmin', session('LoggedAdmin'))->first();

            $listePoste = DB::table('poste')->get();
            $data = [
                'LoggedAdminInfo' => $admin,

                'postes' => $listePoste
            ];
            return view("ajoutpersonnel", $data);
        }
    }
    public function store(Request $request)
    {

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('photo'), $imageName);
        DB::table('personnel')->insert([
            "idPoste" => $request->idPoste,
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "dateNaissance" => $request->dateNaissance,
            "adresse" => $request->adresse,
            "sexe" => $request->sexe,
            "cin" => $request->cin,
            "telephone" => $request->telephone,
            "email" => $request->email,
            "image"=> $imageName,
            "created_at" => Carbon::now(),
        ]);

        return back()->with('success', 'Personnel ajouté  avec succes');
    }
    public function delete($idPersonnel)
    {
        $deletepersonnel = DB::table('personnel')->where('id', $idPersonnel)->delete();

        return back()->with('successDelete', "Le personnel est supprimé  avec succes");
    }

    public function update(Request $request, Personnel $personnel)
    {
        $image='';


       if($request->image){
        $image = time().'.'.$request->image->extension();
        $request->image->move(public_path('photo'), $image);
       }else{
        $image=$request->imageOld;
       }


       $updatePersonnel = DB::table('personnel')->where('id', $request->personnelupdate)->update([
        "idPoste" => $request->idPoste,
        "nom" => $request->nom,
        "prenom" => $request->prenom,
        "dateNaissance" => $request->dateNaissance,
        "adresse" => $request->adresse,
        "sexe" => $request->sexe,
        "cin" => $request->cin,
        "telephone" => $request->telephone,
        "email" => $request->email,
        "image" =>$image

    ]);
    return back()->with('success', 'Personnel mis à jour  avec succes');

    }

    public function edit($idPersonnel)
    {
        if (session()->has('LoggedAdmin')) {
            // if loggedEtudiant exist
            $admin = DB::table('admin')->where('idAdmin', session('LoggedAdmin'))->first();
            $personnelid = DB::table('personnel')->where('id', $idPersonnel)->first();
            $listePoste = DB::table('poste')->get();
            $data = [
                'LoggedAdminInfo' => $admin,
                'personnelid' =>$personnelid,
                'postes' => $listePoste
            ];
        }
        return view("editPersonnel", $data);
    }

    public function search(Request $request)
    {

        if (session()->has('LoggedAdmin')) {
            $admin = DB::table('admin')->where('idAdmin', session('LoggedAdmin'))->first();
            // $liste = DB::table('personnel')->where('nom', 'LIKE', "%" . $request->search . "%");
            $liste= DB::table('personnel')

            ->select('personnel.*','poste.libelle')
            ->join('poste', function ($join) {
                $join->on('personnel.idPoste', '=', 'poste.id');

            })
            ->where('nom', 'LIKE', "%" . $request->search . "%")
            ->Orwhere('prenom', 'LIKE', "%" . $request->search . "%")
            ->Orwhere('personnel.id', 'LIKE', "%" . $request->search . "%")
            ->get();



            $data = [
                'LoggedAdminInfo' => $admin,
                'liste_personnel'=> $liste,
                'recherche'=>$request->search

            ];

            // Get the search value from the request
            // $search = $request->input('search');

            // Search in the title and body columns from the posts table


            // Return the search view with the resluts compacted
            return view('personnel', $data);
        }
    }
    public function detail($idPersonnel)
    {
        if (session()->has('LoggedAdmin')) {
            // if loggedEtudiant exist
            $admin = DB::table('admin')->where('idAdmin', session('LoggedAdmin'))->first();
            $personnelid = DB::table('personnel')
            ->select('personnel.*','poste.libelle')

            ->join('poste', function ($join) {
                $join->on('personnel.idPoste', '=', 'poste.id');

            })->where('personnel.id', $idPersonnel)->first();
            $data = [
                'LoggedAdminInfo' => $admin,
                'personnelid'=> $personnelid
            ];
        }


        return view('detailPersonnel',$data);
    }

    }


