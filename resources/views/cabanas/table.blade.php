<table class="table table-responsive" id="cabanas-table">
    <thead>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Direccion</th>
        <th>Precio</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($cabanas as $cabanas)
        <tr>
            <td>{!! $cabanas->nombre !!}</td>
            <td>{!! $cabanas->descripcion !!}</td>
            <td>{!! $cabanas->direccion !!}</td>
            <td>{!! $cabanas->precio !!}</td>
            <td>
                {!! Form::open(['route' => ['cabanas.destroy', $cabanas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cabanas.show', [$cabanas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cabanas.edit', [$cabanas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>