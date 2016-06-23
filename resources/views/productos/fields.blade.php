@if(!$categorias->isEmpty())
<div class="form-group">
    {!! Form::label('Nombre', 'Nombre:',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('Nombre', null, ['class' => 'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('Precio', 'Precio:',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('Precio', null, ['class' => 'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('Cantidad', 'Cantidad:',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('Cantidad', null, ['class' => 'form-control']) !!}
    </div>
</div>

    <div class="form-group">
        {!! Form::label('idCategoria', 'Categoria:',['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-7"> 
            <select class="form-control" name="idCategoria">
                @foreach($categorias as $categoria)
                    <option value="{!! $categoria->id !!}">{!! $categoria->nombre !!}</option>
                @endforeach
            </select>
        </div>
    </div>
<!--- Submit Field --->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
@else
<div class="well text-center">No hay categorias disponibles.</div>    


<!--- Idrestaurante Field 
<div class="form-group">
    {!! Form::label('idRestaurante', 'Idrestaurante:',['class' => 'col-sm-2 control-label']) !!}
    {!! Form::text('idRestaurante', null, ['class' => 'form-control']) !!}
</div>
-->



@endif