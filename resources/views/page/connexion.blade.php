@extends('page.app',['title'=>'Connexion'])

<body class="bg-gradient-dark">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-9 col-lg-9 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-3 d-none d-lg-block"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Admin RH</h1>
                                    </div>
                                    <form class="user" action="{{ route('check')}}" method="post">
                                        @csrf
                                        @if(session()->has("success"))
                                        <div class="alert alert-success">
                                            <p>{{session()->get("success")}}</p>
                                        </div>
                                        @endif
                                        <div class="resultat">
                                            @if (Session::get('error'))
                                            <div class="alert alert-danger">
                                                {{ Session::get('error') }}
                                            </div>
                                            @endif
                                             
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user"  value="admin@gmail.com" name="emailAdmin" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Entrer votre email" value="{{old('emailAdmin')}}">
                                                <span class="text-danger">
                                                    @error('emailAdmin')
                                                    {{ $message }}
                                                    @enderror </span>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" value="admin" name="mdpAdmin" id="exampleInputPassword" placeholder="Mot de passe">
                                                <span class="text-danger">
                                                    @error('mdpAdmin')
                                                    {{ $message }}
                                                    @enderror </span>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-success" value="Se connecter">
                                            <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Mot de passe oublié?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{route('inscription')}}">Creer un nouveau compte!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>

</html>