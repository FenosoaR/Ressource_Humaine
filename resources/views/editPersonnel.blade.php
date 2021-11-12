@extends("page.master")
@section("contenu")
<!-- Begin Page Content -->
<div class="container-fluid">
    @if(session()->has("success"))
          <div class="alert alert-success col-sm-5" role="status">{{session()->get("success")}} <img src= "{{ asset ('img/checked.png') }}" class="float-right" alt="Icon Check"></div>
          @endif

    @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
    @endif
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header">
      <div class="row">
        <h6 class="m-0 font-weight-bold col-sm-9"><img src= "{{ asset ('img/edit.png') }}"  class="mr-2" alt="Icon liste"><b>Edition du personnel</b> : PR/{{ $personnelid->id  }}</h6>
    </div>
    </div>
    <div class="card-body">
      <form  method="post" action="{{route('modifierPersonnel')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{$personnelid->id}}" name="personnelupdate">
        <div class="row">
          <div class="form-group col-sm-6">
            <label for="nom">Nom:</label>
            <input type="text" required class="form-control" name="nom" value="{{ $personnelid->nom }}">
          </div>
          <div class="form-group col-sm-4">
            <label for="prenom">Photo:</label>
            <input type="file" class="form-control btn-dark" name="image">
            <input type="hidden"   name="imageOld" value="{{ $personnelid->image }}">

        </div>
        <div class="form-group col-sm-2">
            <img src= "{{ asset ('photo/'. $personnelid->image) }}" class="img-thumbnail" width="75" height="75" />
        </div>
          <div class="form-group col-sm-6">
            <label for="prenom">Prenom:</label>
            <input type="text" required class="form-control" name="prenom" value="{{ $personnelid->prenom }}">
          </div>
          <div class="form-group col-sm-6">
            <label for="Datedenaissance">Date de naissance:</label>
            <input type="date" required class="form-control" name="dateNaissance" value="{{ $personnelid->dateNaissance}}">
          </div>
          <div class="form-group col-sm-6">
            <label for="poste">Choisir poste:</label>
            <select class="form-control" name="idPoste" id="poste">
              @foreach($postes as $poste)
              @if($personnelid->idPoste == $poste->id )
              <option selected="selected" value="{{$poste->id}}">{{ $poste->libelle }}</option>
              @else
              <option value="{{$poste->id}}">{{ $poste->libelle }}</option>
              @endif

              @endforeach
            </select>
          </div>
          <div class="form-group col-sm-6">
            <label for="sexe">Sexe:</label>
            <select class="form-control" name="sexe" value="{{$personnelid->sexe}}">
              <option value=""></option>
              <option value="Masculin" {{$personnelid->sexe == "Masculin" ? 'selected' : '' }}>Masculin</option>
              <option value="Feminin" {{$personnelid->sexe== "Feminin" ? 'selected' : '' }}>Feminin</option>
            </select>
          </div>
          <div class="form-group col-sm-6">
            <label for="adresse">Adresse:</label>
            <input type="text" required class="form-control" name="adresse" value="{{ $personnelid->adresse }}">
          </div>
          <div class="form-group col-sm-6">
            <label for="cin">CIN:</label>
            <input type="text" required class="form-control" name="cin" value="{{ $personnelid->cin }}">
          </div>
          <div class="form-group col-sm-6">
            <label for="telephone">Telephone:</label>
            <input type="text" required class="form-control" name="telephone" value="{{ $personnelid->telephone }}">
          </div>

          <div class="form-group col-sm-6">
            <label for="email">Email:</label>
            <input type="email" required class="form-control" name="email" value="{{ $personnelid->email }}">
          </div>
        </div>

        <input type="submit" class="btn btn-info" value="Modifier">

        <a href="{{route('personnel')}}" class="btn btn-danger">Annuler</a>
      </form>
    </div>
    @endsection
