<div class="modal fade modal-slide-in-right" arial-hidden="true" role="dialog" tabindex="-1" 
 id="modal-delete-{{$usu->id}}">

<!-- aSEGUIMOS USANSO EL ALIAS USU POR QUE ES COMO SU ESTUVIERAMOS TRABAJANDO AUN EN EL
INDEX   -->


 {{Form::Open(array('action'=>array('UsuarioController@destroy',$usu->id),'method'=>'delete'))}} 

 <div class="modal-dialog">
 	<div class="modal-content">
 		<div class="modal-header">
 			
         <button type="button" class="close" data-dismiss="modal" arial-Label="Close"></button>
         <span aria-hidden="true">x</span>
         <h4 class="modal-tittle">Eliminar Usuario</h4>
 		</div>

        <div class="modal-body">
       	<p>Confirme si desea Eliminar el Usuario</p>
        </div>

        <div class="modal-footer">
       	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
        </div>

 	</div>
 </div>



{{Form::Close()}}

</div>