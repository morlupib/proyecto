<table class="table table-responsive table-bordered" id="cabanas-table">
    <thead>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Direccion</th>
        <th>Precio</th>
        <th>Estado</th>
        <th colspan="3">Accion</th>
    </thead>
    <tbody>
    @foreach($cabanas as $cabana)
        <tr id="table" class="table table-bordered">
            <td>{!! $cabana->nombre !!}</td>
            <td>{!! $cabana->descripcion !!}</td>
            <td>{!! $cabana->direccion !!}</td>
            <td>{!! $cabana->precio  !!}</td>
            <td>
                <a href="{!! route('publicar', [$cabana->id]) !!}" class='btn btn-xs {{ $cabana->publicar ? 'btn-danger' : 'btn-success' }}'>{{ $cabana->publicar ? 'Despublicar' : 'Publicar' }}</a>
            </td>
            <td>
                {!! Form::open(['route' => ['cabanas.destroy', $cabana->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cabanas.show', [$cabana->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cabanas.edit', [$cabana->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
