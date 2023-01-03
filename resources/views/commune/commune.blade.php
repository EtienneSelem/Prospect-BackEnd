@extends('layouts.app')
@section('title', 'Communes')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-12">
                    <p><button type="button" class="btn btn-warning text-white float-sm-right" data-toggle="modal"
                            data-target="#modal-xl">Ajouter commune</button></p>
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
                                        <th>zone</th>
                                        <th>Modifier/Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($communes as $com)
                                        <tr id="tr{{ $com->id }}" >
                                            <td>{{ $com->id }}</td>
                                            <td>{{ $com->name }}</td>
                                            <td>{{ $com->code }}</td>
                                            <td>{{ $com->zone->name ?? null }}</td>
                                            <td>
                                                <a href=""data-toggle="modal" data-target="#modal-edit"
                                                class="btn btn-success"
                                                onclick="editCommune({{ $com->id }}, '{{ route('commune_edit', ['id' => $com->id]) }}', {{ $com->zone_id }})">Modifier</a>

                                                <a href="" data-toggle="modal"
                                                    onclick="deletecommune('{{ route('deleteCommune', ['id' => $com->id]) }}')"
                                                    data-target="#modal-primary" class="btn btn-danger">Supprimer</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('modal.editCommune')
        @include('modal.deleteCommune')
        @include('script.action')
        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Enregister une commune</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="com_create" action="{{ route('commune_create') }}" method="post">
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
                                        <label>zone</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <select name="zone_id" id="zone_id">
                                            @foreach ($zones as $zone)
                                                <option value="{{ $zone->id }}">{{ $zone->name }}</option>
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
            <!-- /.modal-dialog -->
        </div>


    </section>
@endsection
