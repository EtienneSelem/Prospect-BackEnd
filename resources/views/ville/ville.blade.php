@extends('layouts.app')
@section('title', 'Villes')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-12">
                    <p><button type="button" class="btn btn-warning text-white float-sm-right" data-toggle="modal"
                            data-target="#modal-xl">Ajouter ville</button></p>
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
                                        <th>province</th>
                                        <th>Modifier/Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($villes->count() > 0)
                                        @foreach ($villes as $vil)
                                            <tr id="tr{{ $vil->id }}">
                                                <td>{{ $vil->id ?? null }}</td>
                                                <td>{{ $vil->name ?? null }}</td>
                                                <td>{{ $vil->code ?? null }}</td>
                                                <td>{{ $vil->province->name ?? null }}</td>
                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#modal-edit"
                                                        class="btn btn-success"
                                                        onclick="editVille({{ $vil->id }}, '{{ route('ville_edit', ['id' => $vil->id]) }}', {{ $vil->province_id }})">Modifier</a>

                                                    <a href=""
                                                        onclick="deleteVil('{{ route('deleteVille', ['id' => $vil->id]) }}')"
                                                        data-toggle="modal" data-target="#modal-primary"
                                                        class="btn btn-danger">Supprimer</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <span>Vide</span>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('modal.editVille')
        @include('modal.deleteVille')
        @include('script.action')
        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Enregister une ville</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="vil_create" action="{{ route('ville_create') }}" method="post">
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
                                        <label>province</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <select name="province_id" id="province_id">
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->name }}</option>
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
