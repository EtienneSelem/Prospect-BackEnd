@extends('layouts.app')
{{-- @section('title', 'Prospects') --}}
@section('content')


<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="text-center">{{ $title }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom de l'Agent</th>
                            <th>Nom Entreprise</th>
                            <th>Commune Entreprise</th>
                            <th>Province</th>
                            <th>Offres</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                        <tbody id="show_all_prospects">
                            @foreach ($prospects as $prospect)
                                <tr>
                                    <td>{{ $prospect->id}}</td>
                                    <td>{{ $prospect->agent->name}}</td>
                                    <td>{{ $prospect->company_name}}</td>
                                    <td>{{ $prospect->commune->name}}</td>
                                    <td>{{ $prospect->province->name }}</td>
                                    <td>{{ $prospect->offer->name }}</td>
                                    <td>
                                        @if ($prospect->state == '1')
                                            En attente
                                        @elseif ($prospect->state == '2')
                                            Validé
                                        @else
                                            Réjété
                                        @endif
                                    </td>
                                    <td><a href="{{ route('prospect.show', ['id' => $prospect->id]) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
  </section>
@endsection

@section('third_party_scripts')
    {{-- <script>

        $(document).ready(function(){
            alert("hello")
        })
    </script> --}}
@endsection


