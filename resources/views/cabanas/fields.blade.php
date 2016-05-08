<!-- Nombre Field -->
<div class="form-group col-sm-10"> 
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group-sm-6 col-lg-10"> 
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Field -->
<div class="form-group col-sm-4"> 
    {!! Form::label('precio', 'Precio por día:') !!}
    {!! Form::number('precio', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-10"> 
    <label for="">Direccion</label> 
    <input class="form-control" type="text" id="direccion"></input> 

    <div id="map-canvas"></div> 
</div> 


<!-- Latitud Field -->
<div class="form-group col-sm-4">
    <label for="">Latitud</label> 
    <input type="text" class="form-control" id="latitud" name="latitud"> 
</div>

<!-- Longitud Field -->
<div class="form-group col-sm-4">
    <label for="">Longitud</label> 
    <input type="text" class="form-control" id="longitud" name="longitud"> 
</div>

<!-- Imagenes Field -->
<!--{!! Form::open(['files'=>'true','id' => 'my-dropzone','class' => 'dropzone']) !!}-->
<div class="form-group col-sm-10">  
    <div class="panel panel-info"> 
        <div class="panel-heading">
             <span class="glyphicon glyphicon-picture"></span>
        </div>
        <div class="panel-body" >            
            <div class="dz-message" style="height:200px;">
                Mueva sus imagenes aquí
            </div>
            <div class="dropzone-previews"></div>
        </div>
    </div>
</div>
<!--{!! Form::close() !!}-->

<!-- Submit Field -->
<div class="form-group col-sm-12"> 
        <button type="submit" class="btn btn-success"> 
                        <span class="glyphicon glyphicon-ok"></span> Guardar 
        </button>                     
            <!-- {!!  Form::submit('Guardar', ['class' => 'btn btn-success']) !!}-->
             <a href="{{ url('/') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Cancelar</a>
</div>

