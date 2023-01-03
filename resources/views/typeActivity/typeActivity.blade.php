@extends('layouts.app')
@section('title', 'Type Activité')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <p><button type="button" class="btn btn-warning text-white float-sm-right" data-toggle="modal"
                            data-target="#modal-xl">Ajouter</button></p>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 pt-2">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover  ">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nom</th>
                                        <th>Modifier/Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($entreprises->count() == 0)
                                        <tr>
                                            <td></td>
                                            <td>aucune entreprise enregistrée</td>

                                        </tr>
                                    @else
                                        @foreach ($entreprises as $entrep)
                                            <tr id="tr{{ $entrep->id }}">
                                                <td class="text-center">{{ $entrep->id }}</td>
                                                <td class="text-center">{{ $entrep->name }}</td>
                                                <td>
                                                    <a href="{" data-toggle="modal" data-target="#modal-edit"
                                                        class="btn btn-success"
                                                        onclick="editTypeActivity({{ $entrep->id }}, '{{ route('typeActivity_edit', ['id' => $entrep->id]) }}')">Modifier</a>
                                                    <a href=""data-toggle="modal" data-target="#modal-danger"
                                                        onclick="deleteTypeActivity('{{ route('deleteTypeActivity', ['id' => $entrep->id]) }}')"
                                                        class="btn btn-danger">Supprimer</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @include('modal.editTypeActivity')
        @include('modal.deleteTypeActivity')
        @include('script.action')
        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">enregistrer entreprise</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="entrep_create" action="{{ route('typeActivity_create') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nom</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Entrez ..." id="name"
                                            name="name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Fermer</button>
                                <p><button class="btn btn-warning" id="btnCreate" type="submit">Creer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal-dialog -->
        </div>

    </section>
@endsection
