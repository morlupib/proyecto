@extends('layouts.app')
@section('css')
    <link href="{{ asset('/css/dropzone.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row"    >
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Imagenes
                </div>
                <div class="panel-body">
                    {!! Form::open([
                        'route'=> 'file.store',
                         'method' => 'POST', 
                         'files'=>'true', 
                         'id' => 'my-dropzone' , 
                         'class' => 'dropzone'
                        ]) !!}
                    <div class="dz-message" style="height:200px;">
                        Mueva sus imagenes aquí
                    </div>
                    <div class="dropzone-previews"></div>
                    <button type="submit" class="btn btn-success" id="submit">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="dz-preview dz-file-preview">
          <div class="dz-details">
            <div class="dz-filename"><span data-dz-name></span></div>
            <div class="dz-size" data-dz-size></div>
            <img data-dz-thumbnail />
          </div>
          <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
          <div class="dz-success-mark"><span>✔</span></div>
          <div class="dz-error-mark"><span>✘</span></div>
          <div class="dz-error-message"><span data-dz-errormessage></span></div>

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

                

                var submitBtn = document.querySelector("#submit");
                myDropzone = this;
                
                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                this.on("addedfile", function(file) {

                    alert("Se agregó una imagen");
                    

                });
                
                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                });
 
                this.on("success", 
                    myDropzone.processQueue.bind(myDropzone)
                );

               /* this.on("thumbnail",function(file, dataUrl) {
                 // Display the image in your file.previewElement
                });

                this.on("uploadprogress", function(file, progress, bytesSent) {
                  // Display the progress
                });
                */


            }
        };
    </script>
@endsection