<!--- Nit Field --->
<div class="form-group">
    {!! Form::label('Nit', 'Nit:',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('Nit', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!--- Nombres Field --->
<div class="form-group">
    {!! Form::label('Nombres', 'Nombres:',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('Nombres', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!--- Direccion Field --->
<div class="form-group">
    {!! Form::label('Direccion', 'Direccion:',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('Direccion', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!--- Telefono Field --->
<div class="form-group">
    {!! Form::label('Telefono', 'Telefono:',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('Telefono', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!--- Idrestaurant Field 
<div class="form-group">
    {!! Form::label('idRestaurant', 'Idrestaurant:',['class' => 'col-sm-2 control-label']) !!}
    {!! Form::text('idRestaurant', null, ['class' => 'form-control']) !!}
</div>
--->


<!--- Submit Field --->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
