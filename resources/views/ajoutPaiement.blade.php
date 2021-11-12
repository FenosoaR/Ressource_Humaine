@extends('page.master',['$title'=>'Ajout'])
@section("contenu")
<div class="container-fluid">

    @if(session()->has("success"))
    <div class="alert alert-success">
        <p>{{session()->get("success")}}</p>
    </div>
    @endif

    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
        <p>{{$error}}</p>
    </div>
    @endforeach
    @endif
    <!-- DataTales Example -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <h6 class="m-0 font-weight-bold col-sm-5">Ajout paiement</h6>

                </div>
            </div>



            <div class="card-body">
                <div class="table-responsive">

                    <form method="post" action="{{ route('insererPaiement')}}">
                        @csrf
                        <div class="form-group">
                            <label for="idPersonnel">Personnel:</label>
                            <input type="text"  value='' required class="form-control" id="personnel" name="idPersonnel">

                          

                        </div>
                        <div class="form-group">
                            <label for="montant">Montant:</label>
                            <input type="text" required class="form-control" name="montant">
                        </div>
                </div>
                <div class="form-group">
                    <label for="montant">Date de paiement:</label>
                    <input type="date" required class="form-control" name="datePaiement">
                </div>

                <div class="form-group">
                    <label for="mois">Mois:</label>
                    <select class="form-control" required name="mois" name='mois'>
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
                </div>

                <div class="form-group">
                    <label for="annee">Annee:</label>
                    <input type="text" required class="form-control" name="annee">

                </div>

                <button type="submit" class="btn btn-primary">Enregister</button>
                <a href="{{route('paiement')}}" class="btn btn-danger">Annuler</a>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection