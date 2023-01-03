@extends('layouts.app')

@section('title', 'provinces')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                {{-- <div class="col-sm-6">
                    <h1>Provinces</h1>
                </div> --}}
                <div class="col-sm-12">
                    <p><button type="button" class="btn btn-warning text-white float-sm-right" data-toggle="modal"
                            data-target="#modal-xl">Ajouter province</button></p>
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
                                        <th class="text-center">id</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">code</th>
                                        <th class="text-center" width="220px">Modifie/Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($provinces->count() == 0)
                                        <tr>
                                            <td></td>
                                            <td>aucune province enregistrée</td>
                                        </tr>
                                    @else
                                        @foreach ($provinces as $provin)
                                            <tr id="tr{{ $provin->id }}">
                                                <td class="text-center">{{ $provin->id }}</td>
                                                <td class="text-center">{{ $provin->name }}</td>
                                                <td class="text-center">{{ $provin->code }}</td>
                                                <td class="text-center">
                                                    <a href="" data-toggle="modal" data-target="#modal-edit"
                                                        class="btn btn-success"
                                                        onclick="editProv({{ $provin->id }}, '{{ route('province_edit', ['id' => $provin->id]) }}')">Modifier</a>
                                                    <a href="" data-toggle="modal" data-target="#modal-danger"
                                                        onclick="deleteProv('{{ route('deleteProvince', ['id' => $provin->id]) }}')"
                                                        class="btn btn-danger">Delete</a>
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
        @include('modal.editProvince')
        @include('modal.delete')
        @include('script.action')
        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Save province</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="prov_create" action="{{ route('province_create') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Name</label>
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
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                <p><button class="btn btn-warning" id="btnCreate" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal-dialog -->
        </div>

    </section>
@endsection
