@extends('layouts.app')
@section('title', 'Offres')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-12">
                    <p><button type="button" class="btn btn-warning text-white float-sm-right" data-toggle="modal"
                            data-target="#modal-xl">Ajouter une offre</button></p>
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
                                        <th>code</th>
                                        <th>Modifier/Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($offres->count() == 0)
                                        <tr>
                                            <td></td>
                                            <td>aucune offre enregistrée</td>

                                        </tr>
                                    @else
                                        @foreach ($offres as $offre)
                                            <tr id="tr{{ $offre->id }}">
                                                <td>{{ $offre->id }}</td>
                                                <td>{{ $offre->name }}</td>
                                                <td>{{ $offre->code }}</td>
                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#modal-edit"
                                                        class="btn btn-success"
                                                        onclick="editOffre({{ $offre->id }}, '{{ route('offre_edit', ['id' => $offre->id]) }}')">Modifier</a>
                                                    <a href="" data-toggle="modal" data-target="#modal-danger"
                                                        onclick="deleteOffre('{{ route('deleteOffre', ['id' => $offre->id]) }}')"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        </div>
        @include('modal.editOffre')
        @include('modal.deleteOffre')
        @include('script.action')
        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Enregistrer une offre</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="offr_create" action="{{ route('offre_create') }}" method="post">
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
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>code</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Entrez ..." id="code"
                                            name="code" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">fermer</button>
                                <p><button class="btn btn-warning" id="btnCreate" type="submit">créer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal-dialog -->
        </div>



    </section>
@endsection
