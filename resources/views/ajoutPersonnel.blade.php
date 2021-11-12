@extends('page.master',['$title'=>'Ajout'])
@section("contenu")
<!-- Begin Page Content -->
<div class="container-fluid">
    @if(session()->has("success"))
    <div class="alert alert-success col-sm-5" role="status">{{session()->get("success")}} <img src="{{ asset ('img/checked.png') }}" class="float-right" alt="Icon Check"></div>
    @endif
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-success col-sm-5" role="status">{{$error}} <img src="{{ asset ('img/warning.png') }}" class="float-right" alt="Icon warning"></div>
    @endforeach
    @endif
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold col-sm-3"> <img src="{{ asset ('img/add-user.png') }}" class="mr-2" alt="Icon liste">Ajout Personnel</h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('insererPersonnel')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="nom" class="mr-3">Nom:</label>
                            <input type="text" required class="form-control" name="nom">
                        </div>
                    </div>
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="prenom">Prenom:</label>
                            <input type="text" required class="form-control" name="prenom">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Date de naissance :</label>
                            <input type="date" name="dateNaissance" required class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="sexe">Sexe:</label>
                            <select class="form-control" required name="sexe" id="">
                                <option value=> Choisissez le sexe</option>
                                <option value="Masculin">Masculin</option>
                                <option value="Feminin">Feminin</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Adresse :</label>
                            <input type="text" required name="adresse" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="poste"> Poste:</label>

                            <select class="form-control" required name="idPoste" id="poste">
                                <option value=""> Choisissez le poste</option>
                                @foreach($postes as $poste)
                                <option value="{{ $poste->id}} "> {{ $poste->libelle }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="cin">Cin:</label>
                            <input type="text" required class="form-control" name="cin">
                        </div>
                    </div>
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="telephone">Telephone:</label>
                            <input type="text" required class="form-control" name="telephone">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" required class="form-control" name="email">
                        </div>
                    </div>
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="photo">Photo :</label>
                            <input type="file" required class="form-control" name="image">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Ajouter</button>
                <a href="{{route('personnel')}}" class="btn btn-danger">Annuler</a>
            </form>
        </div>
    </div>
</div>
</div>
</div>

@endsection