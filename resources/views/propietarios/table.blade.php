<table class="table table-responsive">
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Mail</th>
        <th>Telefono</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($propietarios as $propietario)
        <tr>
            <td>{!! $propietario->nombre !!}</td>
            <td>{!! $propietario->apellido !!}</td>
            <td>{!! $propietario->mail !!}</td>
            <td>{!! $propietario->telefono !!}</td>
            <td>
                {!! Form::open(['route' => ['propietarios.destroy', $propietario->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('propietarios.show', [$propietario->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('propietarios.edit', [$propietario->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>