@extends("page.master")
@section("contenu")
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <h6 class="m-0 font-weight-bold col-sm-3"> <img src= "{{ asset ('img/liste.png') }}" class="mr-2" alt="Icon liste">Liste des personnels</h6>
                <form action="{{ route('searchPersonnel')}}" method="GET" role="search" class="col-sm-5 navbar-search">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" name="search" placeholder=" Rechercher..."  aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <a href="{{ route ('ajouterPersonnel')}}" class='btn btn-success col-sm-2 offset-1'>Ajouter <i class="fas fa-plus"></i></a>
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
                            <th>Nom / Prenom</th>
                            <th>Poste</th>
                            <th>Matricule</th>
                            <th>Date d'embauche</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $liste_personnel as $personnel)
                        <tr>
                            <td>{{ $personnel->nom }} {{ $personnel->prenom }}</td>
                            <td>{{ $personnel->libelle }}</td>
                            <td>PR/{{$personnel->id }}</td>
                            <td>{{ date('d/m/Y', strtotime($personnel->created_at))}}</td>
                            <td>
                                <a href="{{ route('detailPersonnel', ['personnel' => $personnel->id]) }}" class='btn btn-primary'>
                                    <i class="fas fa-user"></i>
                                </a>
                                <a href="{{ route('editPersonnel', ['personnel' => $personnel->id]) }}" class='btn btn-info'>
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('supprimerPersonnel', ['personnel' => $personnel->id]) }}" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer ce personnel?')){
                    document.getElementById('form-{{ $personnel->id }}').submit();
                }"><i class="fas fa-trash"></i></a>
                            </td>
                            <!--
                            <td>
                                <form id="form-{{ $personnel->id }}" action="{{ Route('supprimerPersonnel', ['personnel' => $personnel->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete" />
                                </form>
                            </td>---->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
