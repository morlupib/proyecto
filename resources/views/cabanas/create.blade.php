@extends('layouts.app')

@section('css')
    <link href="{{ asset('plugins/dropzone/css/dropzone.css') }}" rel="stylesheet">
    <style>
        #map-canvas {
            width: 500px;
            height: 400px;
        }
        body {background-color: #F2F5A9}
    </style>

@endsection()

@section('content')
<div class="container"> 
    <div class="row">
        <div class="panel panel-primary"> 
            <div class="panel-heading"><h3>Registrar cabaña </h3></div> 
            <div class="panel-body">

            @include('core-templates::common.errors')
                <div class="container">
                    <div class="row">
                        {!! Form::open(['route' => 'cabanas.store']) !!}
                        
                        @include('cabanas.fields')
                        
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>    
@endsection

@section('scripts')
    <script src="{{ asset('plugins/dropzone/js/dropzone.js') }}"></script>
    <script>
        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 10,
            maxFiles: 8,
            renameFilename: true,
            addRemoveLinks: true,
            dictResponseError: "ha ocurrido un error en el servidor",
            acceptedFiles: 'image/*, .jpeg, .jpg, .png, .gif',
            
            init: function() {
                var myDropzone = this;

                // First change the button to actually tell Dropzone to process the queue.
                this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                  // Make sure that the form isn't actually being sent.
                  e.preventDefault();
                  e.stopPropagation();
                  myDropzone.processQueue();
                });

                // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
                // of the sending event because uploadMultiple is set to true.
                this.on("sendingmultiple", function() {
                  // Gets triggered when the form is actually being sent.
                  // Hide the success button or the complete form.
                });
                this.on("successmultiple", function(files, response) {
                  // Gets triggered when the files have successfully been sent.
                  // Redirect user or notify of success.
                });
                this.on("errormultiple", function(files, response) {
                  // Gets triggered when there was an error sending the files.
                  // Maybe show form again, and notify user of error
                });
            }
        };
    </script>
    <script>
        var map = new google.maps.Map(document.getElementById('map-canvas'),{
            center:{
                lat:-31.44627,
                lng:-64.1905623
            },
            zoom:15
        });
            
        var marker = new google.maps.Marker({
            position:{
                lat:-31.44627,
                lng:-64.1905623
            },
            map: map,
            draggable: true
        });

        var searchBox = new google.maps.places.SearchBox(document.getElementById('direccion'));

        google.maps.event.addListener(searchBox,'places_changed', function(){
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;

            for(i=0; place=places[i]; i++){
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);
            }

            map.fitBounds(bounds);
            map.setZoom(15);
            $('#direccion').val(results[0].formatted_address);
            
        });
    
        
        google.maps.event.addListener(marker, 'position_changed', function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#latitud').val(lat);
            $('#longitud').val(lng);
        });
    </script>
@endsection



