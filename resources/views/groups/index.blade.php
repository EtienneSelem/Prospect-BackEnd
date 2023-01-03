@extends('layouts.app')
@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="col-md-12">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Groups</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Groups</li>
                            </ol>
                        </div>
                        <div class="col-sm-12">
                            <div class="float-sm-right">
                                <a href="#" class="btn btn-success" style="color:white" data-toggle="modal"
                                    data-target="#ModalCreate">
                                    <span style="color:white"></span> {{ __('New') }}
                                </a>
                                @include('groups.modal.create')
                            </div>
                        </div>                    
                    </div>
                </div><!-- /.container-fluid -->
            </div>          
        </section>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Erreur!</strong> Champs de saisie incorrects .<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <!-- Main content -->
        <section class="clearfix">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="100px">#</th>
                                        <th class="text-center">{{ __('Noms') }}</th>
                                        <th class="text-center" width="280px">{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $group)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="text-center">{{ $group->name }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-secondary"
                                                    href="{{ route('group.show', $group->id) }}"><i
                                                        class="nav-icon far fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
