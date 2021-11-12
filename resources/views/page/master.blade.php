<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ressource Humaine</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-4.3.1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.min.css') }}">
</head>

<body>
    <!-- Page Wrapper -->
    <div id="wrapper" >

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-user-friends"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Ressource Humaine</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('personnel')}}">
                    <i class="fa fa-list-ul"></i>
                    <span>Personnels</span> </a>


            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Heading -->


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('poste')}}">
                    <i class="fa fa-briefcase"></i>
                    <span>Poste</span> </a>


            </li>
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('ajouterPointage')}}">
                    <i class="fas fa-hand-point-up "></i>
                    <span>Pointage</span>
                </a>
                <hr class="sidebar-divider my-0">
            </li>


            <li class="nav-item">
                <a class="nav-link " href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="" aria-controls="collapseUtilities">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>Congé</span>
                </a>
                <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-grey py-2 collapse-inner rounded">
                        <a class="collapse-item " href="{{ route('conge') }}">Liste des congés</a>
                        <a class="collapse-item " href="{{ route('ajouterConge') }}">Demande de congé</a>

                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="fas fa-list-alt "></i>
                    <span>Paiement Salaire</span>
                </a>

            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->


            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Charts -->

            <!-- Nav Item - Tables -->
            <!-- Divider -->


            <!-- Sidebar Toggler (Sidebar) -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-grey-100 topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->


                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$LoggedAdminInfo->nomAdmin}} {{$LoggedAdminInfo->prenomAdmin}}</span>
                            </a>
                            <!-- Dropdown - User Information -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('logout')}}"><i class="fa fa-power-off"></i> </a>
                            
                            <!-- Dropdown - User Information -->
                        </li>

                    </ul>

                </nav>


                @yield("contenu")


            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ressource Humaine 2021</span>
                    </div>
                </div>
            </footer>
            </div>
            </div>


            <script type="text/javascript " src="{{ asset('js/sb-admin-2.min.js') }}"></script>
            <script type="text/javascript " src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
            <script type="text/javascript " src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script type="text/javascript " src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
            <script type="text/javascript " src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
            <script type="text/javascript " src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
            <script type="text/javascript " src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
</body>

</html>