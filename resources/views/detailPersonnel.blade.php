@extends("page.master")
@section("contenu")
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row">
        <h6 class="m-0 font-weight-bold col-sm-4">Details d'une personnel</h6>
      </div>

        <div class="row">
         <label  class="col sm-3" > <b> Nom: </b> </label>  <label  class="col sm-4" > {{ $personnelid->nom  }}</label>
        </div>
        <br>
        <div class="row">
          <label  class="col sm-3"><b> Prenom:</b> </label><label  class="col sm-4" > {{ $personnelid->prenom  }}</label>
        </div>
        <br>
        <div class="row">
          <label  class="col sm-4"><b> Date de naissance: </b>  </label> <label class="col sm-4" >  {{date('d/m/Y', strtotime($personnelid->dateNaissance)) }}</label>
        </div>
        <br>
        <div class="row">
          <label  class="col sm-4" > <b>Poste: </b> </label> <label  class="col sm-4" >  {{ $personnelid->libelle }} </label>
        </div>
        <br>
        <div class="row">
          <label for="sexe" class="col sm-4"> <b> Sexe: </b> </label> <label   class="col sm-4" > {{ $personnelid->sexe  }}</label>
        </div>
        <br>
        <div class="row">
          <label for="adresse" class="col sm-4"> <b> Adresse: </b> </label><label  class="col sm-4" >  {{ $personnelid->adresse   }}</label>
        </div>
        <br>
        <div class="row">
          <label for="cin" class="col sm-4" > <b> CIN: </b> </label><label  class="col sm-4" >  {{ $personnelid->CIN }}</label>

        </div>
        <br>
        <div class="row">
          <label for="telephone" class="col sm-4" > <b> Telephone: </b> </label><label   class="col sm-4" > {{ $personnelid->telephone }}</label>

        </div>
        <br>

        <div class="row">
          <label for="matricule" class="col sm-4" > <b> Matricule: </b> </label><label  class="col sm-4" > {{ $personnelid->matricule  }}</label>

        </div>
        <br>
        <div class="row">
          <label for="email" class="col sm-4" > <b> Email: </b> </label><label  class="col sm-4" >  {{ $personnelid->email  }}</label>
        </div>



    </div>
  </div>
</div>


@endsection