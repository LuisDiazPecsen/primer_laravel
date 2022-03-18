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
    @include('layouts.header.loader')
    @include('layouts.header.navbar')
    @include('layouts.header.mainsidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
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
