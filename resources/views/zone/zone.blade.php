@extends('layouts.app')
@section('title', 'Zone')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-12">
                    <p><button type="button" class="btn btn-warning text-white float-sm-right" data-toggle="modal"
                            data-target="#modal-xl">Ajouter zone</button></p>
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
                                        <th>ville</th>
                                        <th>Modifier/Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($zones->count() == 0)
                                        <tr>
                                            <td></td>
                                            <td>aucune zone enregistrée</td>
                                        </tr>
                                    @else
                                        @foreach ($zones as $zon)
                                            <tr id="tr{{ $zon->id }}">
                                                <td>{{ $zon->id ?? null }}</td>
                                                <td>{{ $zon->name ?? null }}</td>
                                                <td>{{ $zon->code ?? null }}</td>
                                                <td>{{ $zon->ville->name ?? null }}</td>
                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#modal-edit"
                                                        class="btn btn-success"
                                                        onclick="editZone({{ $zon->id }}, '{{ route('zone_edit', ['id' => $zon->id]) }}', {{ $zon->ville_id }})">Modifier</a>
                                                    <a href=""
                                                        onclick="deleteZon('{{ route('deleteZone', ['id' => $zon->id]) }}')"
                                                        data-toggle="modal" data-target="#modal-primary"
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
        @include('modal.editZone')
        @include('modal.deleteZone')
        @include('script.action')
        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Enregister une zone</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="zon_create" action="{{ route('zone_create') }}" method="post">
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
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>ville</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <select name="ville_id" id="ville_id">
                                            @foreach ($villes as $ville)
                                                <option value="{{ $ville->id }}">{{ $ville->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">fermer</button>
                                <p><button class="btn btn-warning" id="btnCreate" type="submit">Créer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
