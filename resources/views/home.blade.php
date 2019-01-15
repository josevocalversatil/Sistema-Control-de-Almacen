@extends ('layouts.admin')
@section ('contenido')
 
<!-- HACEMOS EL DISEÑO UTILIZANDO BOOTSTRAP  -->
<!-- include es para incluir el buscador  -->




<!-- ImAagen principal  

<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

  <div class="headline text-left" id="time">
                
            </div>

      <div class="table-response">
      <div align="center">
 <img src="img/logo1.jpg" border="0" width="500" height="500" align="center">
</div>

      </div>

      
   </div>
</div>
 -->


 <div class="row">
                        
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        Inventario<sup style="font-size: 15px"></sup>
                                    </h3>

                                    <h3>
                                        General<sup style="font-size: 15px"></sup>
                                    </h3>
                                
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="{{url('almacen/articulo')}}" class="small-box-footer">
                                   Ir <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        Entrada<sup style="font-size: 15px"></sup>
                                    </h3>

                                    <h3>
                                        Articulos<sup style="font-size: 15px"></sup>
                                    </h3>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-check"></i>
                                </div>
                                <a href="{{url('almacen/ingreso')}}" class="small-box-footer">
                                    Ir <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                     <h3>
                                        Memorandum's<sup style="font-size: 15px"></sup>
                                    </h3>

                                    <h3>
                                        General<sup style="font-size: 15px"></sup>
                                    </h3>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                </div>
                                <a href="{{url('almacen/memo')}}" class="small-box-footer">
                                    Ir <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                     <h3>
                                       Salida<sup style="font-size: 15px"></sup>
                                    </h3>

                                    <h3>
                                        Articulos<sup style="font-size: 15px"></sup>
                                    </h3>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-share"></i>
                                </div>
                                <a href="{{url('almacen/salida')}}" class="small-box-footer">
                                    Ir <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->


@endsection 