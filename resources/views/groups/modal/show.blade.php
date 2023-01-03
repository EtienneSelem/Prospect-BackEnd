@extends('layouts.app')
@section('content')
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">{{ __('Liste Utilisateurs du groupe ') }}<i>{{ $group->name }}</i></h2>
                </div>
                <div class="col-auto">

                    <a href="{{ route('group.index') }}" class="btn btn-primary" style="color:white">
                        <span style="color:white"></span> {{ __('Rétour') }}
                    </a>

                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-12">
                <div class="float-sm-right">
                    @can('create')
                        <a href="#" class="btn btn-success" style="color:white" data-toggle="modal"
                            data-target="#ModalCreate">
                            <span style="color:white"></span> {{ __('Ajouter Utilisateur Au Groupe ') }}<i
                                class="fa-sharp fa fa-plus"></i>
                        </a>
                    @endcan
                    @include('groups.addUser')
                </div>
            </div>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Erreur!</strong>Champs de saisie incorrects<br><br>
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
                                        <th class="text-center">{{ __('Email') }}</th>
                                        <th class="text-center" width="280px">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($group->users as $key => $user)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="text-center">{{ $user->name }}</td>
                                            <td class="text-center">{{ $user->email }}</td>
                                            <td class="text-center"><a href="#" class="btn btn-danger"
                                                    data-toggle="modal" data-target="#ModalDelete{{ $user->id }}"
                                                    id="delete"><i class="nav-icon fas fa-trash"></i></a></td>
                                            @include('groups.modal.delete')
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
