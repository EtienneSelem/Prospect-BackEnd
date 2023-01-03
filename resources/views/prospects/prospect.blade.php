@extends('layouts.app')
{{-- @section('title', 'Prospect') --}}
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="col-6">
                                <div class="table-responsive">

                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">ID</th>
                                            <td class="recup_id">{{ $prospect->id }}</td>
                                        </tr>

                                        <tr>
                                            <th>Localisation</th>
                                            <td><a href="{{ route('map_index') }}">{{ $prospect->latitude }} ; {{ $prospect->longitude }}</a></td>
                                        </tr>
                                        <tr>
                                            <th>Agent</th>
                                            <td><a href="{{ route('user') }}">{{ $prospect->agent->name }}</a></td>
                                        </tr>
                                        <tr>
                                            <th>Commune</th>
                                            <td><a href="{{ route('commune') }}">{{ $prospect->commune->name }}</a></td>
                                        </tr>
                                        <tr>
                                            <th>Zone</th>
                                            <td><a href="{{ route('zone') }}">{{ $prospect->zone->name }}</a></td>
                                        </tr>
                                        <tr>
                                            <th>Ville</th>
                                            <td><a href="{{ route('ville') }}">{{ $prospect->ville->name }}</a></td>
                                        </tr>
                                        <tr>
                                            <th>Province</th>
                                            <td><a href="{{ route('province') }}">{{ $prospect->province->name }}</a></td>
                                        </tr>
                                        <!-- <tr>
                                            <th>Company</th>
                                            <td><a href="{{ route('typeActivity') }}">{{ $prospect->company_name }}</a>
                                            </td>
                                        </tr> -->
                                        <tr>
                                            <th>Address de l'activité</th>
                                            <td>{{ $prospect->company_address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Type d'activité</th>
                                            <td><a href="{{ route('typeActivity') }}">{{ $prospect->typeActivities->name??null }}</a></td>
                                        </tr>
                                        <tr>
                                            <th>Company Phone</th>
                                            <td>{{ $prospect->company_phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Offre</th>
                                            <td><a href="{{ route('offre') }}">{{ $prospect->offer->name }}</a></td>
                                        </tr>
                                        <tr>
                                            <th>Statut</th>
                                            <td>
                                                @if ($prospect->state == '1')
                                                    En attente
                                                @elseif ($prospect->state == '2')
                                                    Validé
                                                @else
                                                    Réjété
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Remote</th>
                                            <td>{{ $prospect->remote_id }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2 filter-container">
                    <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Images</h3>
                    <br><br><br>
                    <ul class="list-unstyled">

                        <a href="{{ asset('upload/images/202209070400articlesCaptures.png') }}" data-toggle="lightbox">
                            <img src="{{ asset('upload/images/202209070400articlesCaptures.png') }}" class="img-fluid"
                                width="80" height="60">
                        </a>

                        <br>
                        <br>
                        <a class="popupimage" href="{{ asset('upload/images/202209070400imageAccueils.png') }}"
                            data-toggle="lightbox">
                            <a class="popupimage" href="{{ asset('upload/images/202209070400imagesAccueils.png') }}"
                                data-toggle="lightbox">
                                <img src="{{ asset('upload/images/202209070400imageAccueils.png') }}" alt="img 2"
                                    width="80" height="60">
                            </a>
                    </ul>
                    <br>
                    <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Documents</h3>
                    <br>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ asset('upload/documents/odc.pdf') }}" target="_blank">Document 1</a>
                            <a href="{{ asset('upload/documents/odc.pdf') }}" target="_blank">Doc 1</a>
                        </li>
                        <br>
                        <li>
                            <a href="{{ asset('upload/documents/odc.pdf') }}" class="btn-link text-secondary"><i
                                    class="far fa-fw fa-file-pdf"></i> Document 2</a>
                        </li>
                        <br>
                    </ul>
                    <div class="text-center mt-5 mb-3">
                        @if ($prospect->state != '1')
                            <a href="{{ URL::route('prospect.operations', [$prospect->id, 1]) }}"
                                class="btn btn btn-warning" id="btnAttente">En attente</a>
                        @endif
                        @if ($prospect->state != '2')
                            <a href="{{ URL::route('prospect.operations', [$prospect->id, 2]) }}"
                                class="btn btn btn-primary" id="btnValider">Valider</a>
                        @endif
                        @if ($prospect->state != '3')
                            <a href="{{ URL::route('prospect.operations', [$prospect->id, 3]) }}"
                                class="btn btn btn-danger" id="btnRejeter">Rejeter</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section('third_party_scripts')
    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: false
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });

            // $('.btn[data-filter]').on('click', function() {
            //     $('.btn[data-filter]').removeClass('active');
            //     $(this).addClass('active');
            // });
        })
    </script>
@endsection
