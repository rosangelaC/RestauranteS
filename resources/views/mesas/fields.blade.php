

<div class="form-group">
    {!! Form::label('Nro', 'Nro de Mesa:',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
    	{!! Form::text('Nro', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el Nro de Mesa']) !!}
	</div>
</div>


<div class="form-group">
    {!! Form::label('Estado', 'Estado:',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7"> 
    {!! Form::select('Estado', ['DISPONIBLE' =>'DISPONIBLE','RESERVADO' => 'RESERVADO','OCUPADO' => 'OCUPADO'],null, ['class' => 'form-control']) !!}
    </div>
</div>


<!--<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('idRestaurant', 'Idrestaurant:') !!}
    {!! Form::text('idRestaurant', null, ['class' => 'form-control']) !!}
</div> -->


<!--- Submit Field --->
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
    	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
