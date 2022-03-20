<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Primer proyecto</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.header.stylesheets')
</head>

<body class="hold-transition sidebar-mini layout-fixed" id="body">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left: 0px;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a id="" href="{{ route('login') }}" type="button" class="nav-link">Iniciar sesión</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a id="" href="{{ route('register') }}" type="button" class="nav-link">Registrarse</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" type="button" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left: 0px;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0" id="tituloPagina"></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol id="listaURL" class="breadcrumb float-sm-right">
                                <!--li class=" breadcrumb-item"><a href="#">Home</a></li-->
                                <!--li class="breadcrumb-item active">Dashboard v1</li-->
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            @yield('content')
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer" style="margin-left: 0px;">
            <strong>Copyright &copy; 2022 <a href="#">Primer proyecto</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 0.1
            </div>
        </footer>

    </div>
    <!-- ./wrapper -->

    @include('layouts.footer.scripts')

</body>

</html>
