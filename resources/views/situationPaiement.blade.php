@extends('page.master',['$title'=>'Ajout'])
@section("contenu")
<div class="container-fluid">

    @if(session()->has("success"))
    <div class="alert alert-success col-sm-5" role="status">{{session()->get("success")}} <img src="{{ asset ('img/checked.png') }}" class="float-right" alt="Icon Check"></div>
    @endif
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger col-sm-5" role="status">{{$error}} <img src="{{ asset ('img/warning.png') }}" class="float-right" alt="Icon warning"></div>
    @endforeach
    @endif
    <!-- DataTales Example -->
    <div class="container-fluid">
        <div class="card shadow mb-6">
            <div class="card-header py-3">
                <div class="row">
                    <h6 class="m-0 font-weight-bold col-sm-5">Situation salaire</h6>
                </div>
            </div>
            <div class="card-body">

                <form method="post" action="{{ route('insererPaiement')}}">
                    @csrf
                    <div class='row'>
                        <div class="form-group col-sm-3 ">
                            <label for="idPersonnel">Personnel:</label>
                            <input type="text" value='' required class="form-control" id="personnel" name="idPersonnel">
                        </div>
                        <!--                             
                            <div class="form-group col-sm-3">
                                <label for="annee">Annee:</label>
                                <input type="number" value='' required class="form-control" id="personnel" name="annee">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="mois">Mois:</label>
                                <select class="form-control" required name='mois'>
                                    <option value=""></option>
                                    <option value="1">Janvier</option>
                                    <option value="2">Fevrier</option>
                                    <option value="3">Mars</option>
                                    <option value="4">Avril</option>
                                    <option value="5">Mai</option>
                                    <option value="6">Juin</option>
                                    <option value="7">Juillet</option>
                                    <option value="8">Aout</option>
                                    <option value="9">Septembre</option>
                                    <option value="10">Octobre</option>
                                    <option value="11">Novembre</option>
                                    <option value="12">Decembre</option>
                                </select>
                            </div>  -->

                    </div>
                    <div class="row ">
                        <div class="form-group col-sm-3">
                            <button type="submit" class="btn btn-success">Voir</button>
                            <a href="{{route('paiement')}}" class="btn btn-danger">Annuler</a>
                        </div>
                    </div>
                </form>

                @if($j!=0)
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr></tr>
                        <th>Statut</th>
                        <th>Date de paiement</th>
                        <th>Mois</th>
                        <th>Annee</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @for ($i = $mois; $i < count($listeMois); $i++) <tr>
                        <td>Paye ou pas</td>
                            <td>{{$listeMois[$i]}}</td>
                            </tr>
                            @endfor


                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection