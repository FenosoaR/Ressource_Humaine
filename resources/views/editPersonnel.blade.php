@extends("page.master")
@section("contenu")
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row">
        <h6 class="m-0 font-weight-bold col-sm-9">Edition d'un personnel</h6>

      </div>


      @if(session()->has("success"))
      <div class="alert alert-success">
        <p>{{session()->get("success")}}</p>
      </div>
      @endif

      @if($errors->any())
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      @endif

      <form style="width: 65%;" method="post" action="{{route('modifierPersonnel')}}">
        @csrf
        <input type="hidden" value="{{$personnelid->id}}" name="personnelupdate">
        <div class="form-group">
          <label for="nom">Nom:</label>
          <input type="text" required class="form-control" name="nom" value="{{ $personnelid->nom }}">
        </div>
        <div class="form-group">
          <label for="prenom">Prenom:</label>
          <input type="text" required class="form-control" name="prenom" value="{{ $personnelid->prenom }}">
        </div>
        <div class="form-group">
          <label for="Datedenaissance">Date de naissance:</label>
          <input type="date" required class="form-control" name="dateNaissance" value="{{ $personnelid->dateNaissance}}">
        </div>
        <div class="form-group">
          <label for="poste">Choisir poste:</label>

          <select class="form-control" name="idPoste" id="poste">
            @foreach($postes as $poste)
            @if($personnelid->idPoste == $poste->id )
           <option selected="selected"  value="{{$poste->id}}">{{ $poste->libelle }}</option>
             @else
            <option value="{{$poste->id}}">{{ $poste->libelle }}</option>
            @endif

            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="sexe">Sexe:</label>
          <select class="form-control" name="sexe" value="{{$personnelid->sexe}}">
            <option value=""></option>
            <option value="Masculin"   {{$personnelid->sexe == "Masculin" ? 'selected' : '' }}>Masculin</option>
            <option value="Feminin"  {{$personnelid->sexe== "Feminin" ? 'selected' : '' }}>Feminin</option>
          </select>
        </div>
        <div class="form-group">
          <label for="adresse">Adresse:</label>
          <input type="text" required class="form-control" name="adresse" value="{{ $personnelid->adresse }}">
        </div>

        <div class="form-group">
          <label for="cin">CIN:</label>
          <input type="text" required class="form-control" name="cin" value="{{ $personnelid->CIN }}">
        </div>
        <div class="form-group">
          <label for="telephone">Telephone:</label>
          <input type="text" required class="form-control" name="telephone" value="{{ $personnelid->telephone }}">
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" required class="form-control" name="email" value="{{ $personnelid->email }}">
        </div>
        <td>

          <input type="submit" class="btn btn-primary" value="Enregister">

        </td>
        <a href="{{route('personnel')}}" class="btn btn-danger">Annuler</a>

      </form>

    </div class='mt-4'>
    @endsection