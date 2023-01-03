@extends('layouts.app')
@section('title', 'Map')
@section('third_party_stylesheets')
    <link href="{{ mix('css/select2.min.css') }}" rel="stylesheet">
    <style>
        #map {
            height: 500px;
            background: #fafafa;
        }

        .combobox {
            background: white
        }

        .select2-selection--single {
            min-height: 38px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #007bff;
            border-color: #006fe6;
            color: #fff;
            padding: 0 10px;
            margin-top: .31rem;
            }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.1/dist/leaflet.css"
        integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
@endsection

@section('content')

    <section class="content">

        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Prospects</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('map_index') }}" method="get">
                        <div class="row">
                            <div class="col-md-1">
                                    <label for="">Agent</label>
                                    <select class="select2" multiple="multiple" name="agent[]"
                                        data-placeholder="Selectionner" style="width: 100%;" >
                                        <option value=""></option>
                                        @foreach ($agents as $ag)
                                            <option value="{{ $ag->id }}" @if(count($agent) > 0) @if(in_array($ag->id, $agent)) selected="selected" @endif @endif>{{ $ag->name }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-2">
                                    <label for="">Type</label>
                                    <br>
                                    <select class="select2" multiple="multiple" name="type[]"
                                        data-placeholder="Selectionner type(s)" style="width: 100%;">
                                        <option value=""></option>
                                        @foreach ($typeActivities as $typeActivity)
                                            <option value="{{ $typeActivity->id }}" @if(count($type) > 0) @if(in_array($typeActivity->id, $type)) selected="selected" @endif @endif>{{ $typeActivity->name }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-2">
                                    <label for="">Offre</label>
                                    <br>
                                    <select class="select2" multiple="multiple" name="offre[]"
                                        data-placeholder="Selectionner offre(s)" style="width: 100%;">
                                        <option value=""></option>
                                        @foreach ($offres as $offr)
                                            <option value="{{ $offr->id }}" @if(count($offre) > 0) @if(in_array($offr->id, $offre)) selected="selected" @endif @endif>{{ $offr->name }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-2">
                                    <label for="">Province</label>
                                    <br>
                                    <select class="form-control select2" name="province" onchange="chargevilles()"
                                        id="province_id" style="width: 100%;">
                                        <option value=""></option>
                                        @foreach ($provinces as $prov)
                                            <option value="{{ $prov->id }}" @if($prov->id == $province) selected = "selected" @endif>{{ $prov->name }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-1">
                                    <label for="">Ville</label>
                                    <br>
                                    <select class="form-control select2 select2-hidden-accessible" id="ville"
                                        name="ville" onchange="chargezones()" style="width: 100%;">
                                    </select>
                                </div>

                            <div class="col-md-2">
                                    <label for="">Zone</label>
                                    <br>
                                    <select class="form-control select2 select2-hidden-accessible"id="zone"
                                        name="zone" onchange="chargecommunes()" style="width: 100%;">
                                    </select>
                            </div>

                            <div class="col-md-1">
                                    <label for="">Commune</label>
                                    <br>
                                    <select class="form-control select2 select2-hidden-accessible" id="commune"
                                        name="commune" style="width: 100%;">
                                        <option value=""></option>
                                    </select>
                            </div>

                            <div class="col-md-1">
                                <div class="float-sm-right" style="padding-top: 30px">
                                    <button type="sumbit" id="add_agent" class="btn btn-primary"><i
                                            class="fa-solid fa-circle-plus"></i>
                                        Filter
                                    </button>
                                </div>
                            </div>
                    </form>

                </div>
                <br>
                <br>
                <br>
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Carte</h3>
                        <input type="hidden" id="prospects" value="{{ $prospects }}">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>

            </div>

    </section>

    </div>-->
    <input type="hidden" name="" id ="hide_ville" value="{{$ville}}">
    <input type="hidden" name="" id ="hide_zone" value="{{$zone}}">
    <input type="hidden" name="" id ="hide_commune" value="{{$commune}}">
@endsection
@section('third_party_scripts')

    <script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js"
        integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin="">
    </script>
    <script>
        var map = L.map('map').setView([-4.371509056214989, 15.284968025487347], 12);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        //recuperer l'identifiant
         var prospectsJson = $("#prospects").val()
        //transformer Json en java script
         var prospects = JSON.parse(prospectsJson)
         prospects.map((rep) => {
            var ico = (parseInt(rep.type_activities.id) > 10)?1: parseInt(rep.type_activities.id)
            var myIcon = L.icon({
                iconUrl: 'images/i'+ico+'.png',
                iconSize: [20, 35],
                iconAnchor: [22, 94],
                popupAnchor: [-3, -76],
                shadowSize: [68, 95],
                shadowAnchor: [22, 94]
            });
                L.marker([rep.latitude, rep.longitude], {icon: myIcon}).addTo(map)
               .bindPopup("<strong>"+rep.type_activities.name +"</strong> : "+rep.company_name);
            }
        )
    </script>
    <script>
        async function chargevilles() {
            var province = $("#province_id").val()

            await $.get("/map/ville/" + province, function(data) {
                console.log(data);
                $("#ville").html('<option value=""></option>')

                var response = data
                response.map((rep) => {
                    $("#ville").append('<option value="' + rep.id + '">' + rep.name + '</option>')

                })
                var ville = $("#hide_ville").val()
                if(ville !== ""){
              checkville(ville)

              }
              else{

              }

            })
        }

       async function chargezones() {
            var ville = $("#ville").val()

           await $.get("/map/zone/" + ville, function(data) {
                console.log(data);
                $("#zone").html('<option value=""></option>')

                var response = data
                response.map((rep) => {
                    $("#zone").append('<option value="' + rep.id + '">' + rep.name + '</option>')
                })
                var zone = $("#hide_zone").val()
                if (zone !== null){
                    checkzone(zone)
                }
            })
        }

       async function chargecommunes() {
            var zone = $("#zone").val()

           await $.get("/map/commune/" + zone, function(data) {
                console.log(data);
                $("#commune").html('<option value=""></option>')

                var response = data
                response.map((rep) => {
                    $("#commune").append('<option value="' + rep.id + '">' + rep.name + '</option>')
                })
                var commune = $("#hide_commune").val()
                checkcommune(commune)
            })
        }
    </script>
    <script>
        $(function() {
            //Initialize Select2 Elements ,
            $('.select2').select2()
        })
    </script>
    <script>
        $(document).ready(function() {
            check_param()

        })
    </script>
    <script>
        async function check_param() {
             var province = $("#province_id").val()
             var ville = $("#hide_ville").val()
             var zone = $("#hide_zone").val()
             var commune = $("#hide_commune").val()
            if (province !== ""){
              let Villes = await chargevilles()
            }
        }
        async function checkville(ville) {
             $('#ville > option').each(function(){
                    if($(this).val() == ville){
                        $(this).prop("selected", true)
                    }
                    else{

                    }
                })
                let Zones = await chargezones()
            }

        async function checkzone(zone) {
             $('#zone > option').each(function(){
                    if($(this).val() == zone){
                        $(this).prop("selected", true)
                    }
                    else{

                    }
                })
                let Communes = await chargecommunes()
        }

         function checkcommune(commune) {

             $('#commune > option').each(function(){
                    if($(this).val() == commune){
                        $(this).prop("selected", true)
                    }
                    else{

                    }
                })
        }
    </script>
@endsection
