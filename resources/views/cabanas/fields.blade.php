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
    {!! Form::number('precio', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-10"> 
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div> 

<!-- Imagenes Field -->
<div class="form-group col-sm-10">  
    <div class="panel panel-info"> 
        <div class="panel-heading">
            <span class="glyphicon glyphicon-picture"></span> Imagenes
        </div>
        <div class="panel-body" >            
            <input type="file" name="image[]" multiple></input>
        </div>
    </div>
</div>

<!-- Publicar Field -->
<div class="form-group col-sm-10"> 
    {!! Form::label('publicar', 'Publicar:') !!}
    {!! Form::checkbox('publicar', 1, null) !!}
</div> 

<!-- Submit Field -->
<div class="form-group col-sm-12"> 
    <button type="submit" class="btn btn-success"> 
        <span class="glyphicon glyphicon-ok"></span> Guardar 
    </button>                     
    <a href="{{ url('/') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Cancelar</a>
</div>

