@extends("page.master")
@section("contenu")
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row">
        <h6 class="m-0  col-sm-10"><img src= "{{ asset ('img/table.png') }}" class="mr-2 mb-2"  alt="Icon liste"><b>Fiche du personnel :</b>  PR/{{ $personnelid->id  }}</h6>
        <a href="{{ route('editPersonnel', ['personnel' => $personnelid->id]) }}" class='btn btn-info'>
                                   Modifier <i class="fas fa-edit ml-1"></i>
                                </a>
    </div>
      </div>
      <div class="card-body">
      <div class="row">
      <div class="col-sm-3">
      <img src= "{{ asset ('photo/'. $personnelid->image) }}" class="img-thumbnail" width="150" height="150" />

    </div>
    <div class="col-sm-8">
    <div class="row" style="margin-bottom: 15px;">
                <label class="col-sm-3 text-info">Nom:</label>
                <label class="col-sm-4">{{ $personnelid->nom  }}</label>
        </div>
        <hr>
        <div class="row" style="margin-bottom: 15px;">
                <label class="col-sm-3 text-info">Prenom:</label>
                <label class="col-sm-4">{{ $personnelid->prenom  }}</label>
        </div>
        <hr>
        <div class="row">
          <label  class="col-sm-3 text-info"> Date de naissance:   </label>
          <label class="col-sm-4" >  {{date('d/m/Y', strtotime($personnelid->dateNaissance)) }}</label>
        </div>
        <hr>
        <div class="row">
          <label  class="col-sm-3 text-info"> Poste:   </label>
          <label class="col-sm-4" > {{ $personnelid->libelle }}</label>
        </div>
        <hr>
        <div class="row">
          <label  class="col-sm-3 text-info"> Sexe:  </label>
          <label class="col-sm-4" > {{ $personnelid->sexe  }}</label>
        </div>
        <hr>
        <div class="row">
          <label  class="col-sm-3 text-info"> Adresse:  </label>
          <label class="col-sm-4" > {{ $personnelid->adresse   }}</label>
        </div>
        <hr>
        <div class="row">
          <label  class="col-sm-3 text-info"> CIN:  </label>
          <label class="col-sm-4" > {{ $personnelid->cin }}</label>
        </div>
        <hr>
        <div class="row">
          <label  class="col-sm-3 text-info"> Telephone:  </label>
          <label class="col-sm-4" > {{ $personnelid->telephone }}</label>
        </div>
        <hr>
        <div class="row">
          <label  class="col-sm-3 text-info"> Email: </label>
          <label class="col-sm-4" > {{ $personnelid->email  }}</label>
        </div>
        <hr>
          </div>
      </div>

    </div>
  </div>
</div>


@endsection
