<div class="modal fade modal-slide-in-right" arial-hidden="true" role="dialog" tabindex="-1" 
 id="modal-delete-{{$ing->idingreso}}">


 {{Form::Open(array('action'=>array('IngresoController@destroy',$ing->idingreso),'method'=>'delete'))}} 

 <div class="modal-dialog">
 	<div class="modal-content">
 		<div class="modal-header">
 			
         <button type="button" class="close" data-dismiss="modal" arial-Label="Close"></button>
         <span aria-hidden="true">x</span>
         <h4 class="modal-tittle">Cancelar Ingreso</h4>
 		</div>

        <div class="modal-body">
       	<p>Confirme si desea Cancerlar el Ingreso</p>
        </div>

        <div class="modal-footer">
       	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
        </div>

 	</div>
 </div>



{{Form::Close()}}

</div>