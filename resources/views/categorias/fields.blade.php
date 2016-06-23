<!--- Nombre Field --->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!--- Idrestaurant Field 
<div class="form-group">
    {!! Form::label('idRestaurant', 'Idrestaurant:',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
    {!! Form::text('idRestaurant', null, ['class' => 'form-control']) !!}
    </div>
</div>
--->


<!--- Submit Field --->
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
    	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
