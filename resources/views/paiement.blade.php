@extends("page.master")
@section("contenu")


<!-- Begin Page Content -->
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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <h6 class="m-0 font-weight-bold col-sm-6"> <img src= "{{ asset ('img/liste.png') }}" class="mr-2" alt="Icon liste">Liste de paiement</h6>
               
                <div class="col-sm-2">
                        </div>
                <a href="{{ route('situationPaiement')}}" class='btn btn-success col-sm-4'> Voir <i class="fas fa-plus"></i></a>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(isset($recherche))
                <p> Le resultat correspondant : <b>{{$recherche}}</b></p>
                @endif


                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Personnel</th>
                            <th>Montant</th>
                            <th>Date de paiement</th>
                            <th>Mois</th>
                            <th>Annee</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach( $listePaiement as $paiement)
                        <tr>
                            <td>PR/{{$paiement->getIdPersonnel()}} </td>
                            <td>{{$paiement->getMontant()}}</td>
                            <td>{{$paiement->getdatePaiement()}}</td>
                            <td>{{$paiement->getMois()}} </td>
                            <td>{{$paiement->getAnnee()}} </td>
                            <td>
                                <a href="" class='btn btn-primary'>
                                    <i class="fas fa-user"></i>
                                </a>

                                <a href="" class='btn btn-info'>
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="" class="btn btn-danger" onclick=""><i class="fas fa-trash"></i></a>
                            </td>
                            <td>
                                <form id="" action="" method="post">

                                    @csrf
                                    <input type="hidden" name="_method" value="delete" />
                                </form>

                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>


@endsection