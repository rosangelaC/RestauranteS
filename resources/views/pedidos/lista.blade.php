<?php
	$count=0;
?>
<div class="container">

    <ul class="nav nav-tabser col-sm-7 col-sm-offset-2">
    	@foreach($categorias as $categoria)
    		@if($count==0)
        		<li class="active"><a class="col-sm-2 active" href="#{!!$categoria->nombre!!}" data-toggle="tab">{!!$categoria->nombre!!}</a></li>
        		<?php $count++;?>
        	@else
        		<li><a class="col-sm-2" href="#{!!$categoria->nombre!!}" data-toggle="tab">{!!$categoria->nombre!!}</a></li>
        	@endif
        @endforeach
    </ul>
        <?php $count=0 ?>
        <div class="tab-content col-sm-7 col-sm-offset-2">
	        @foreach($categorias as $categoria)
		        @if($count==0)
		            <div class=" tab-pane fade in active" id="{!!$categoria->nombre!!}">
		            <?php $count++;?>
		        	
		        @else
		        	 <div class="tab-pane fade" id="{!!$categoria->nombre!!}">
		        @endif

				        <?php $productowhere = $productos->where('idCategoria',$categoria->id);?>
				        
				        <table class="table">
				            <thead>
				            	<th>Nombre</th>
				                <th>Precio</th>
				                <th>Cantidad</th>
							</thead>
				            <tbody>
				            	@foreach($productowhere as $producto)
				                    <tr>
				                        <td>{!! $producto->Nombre !!}</td>
				                        <td>{!! $producto->Precio !!}</td>
				                        <td>{!! $producto->Cantidad !!}</td>							
				                    </tr>
				                @endforeach
				            </tbody>
				        </table>
				        
				    </div>
			@endforeach	
        </div>
    
</div>