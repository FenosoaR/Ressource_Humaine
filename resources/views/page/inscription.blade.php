@extends('page.app',['title'=>'Inscription'])
<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Creer un compte!</h1>
                            </div>
                            <form class="user" action="{{ route('createAdmin')}}" method="post">
                                @csrf

                                
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
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" placeholder="Nom" name="nomAdmin" value="{{old('nomAdmin')}}">
                                            
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"  placeholder="Prenom" name="prenomAdmin"  value="{{old('prenomAdmin')}}">
                                            
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" placeholder="Adresse email" name="emailAdmin"  value="{{old('emailAdmin')}}">
                                   
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 ">
                                        <input type="password" class="form-control form-control-user" placeholder="Mot de passe"  name="mdpAdmin"  value="{{old('mdpAdmin')}}">
                                    </div> 
                                </div>
                                   <input type="submit" class="btn btn-success" value="Enregistrer">
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
   
</body>
</html>