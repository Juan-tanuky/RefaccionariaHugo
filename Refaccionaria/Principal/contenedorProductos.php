<?php
include("conexion.php");
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Administrar productos
    </h1>
    <ol class="breadcrumb">    
      <li><a><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar productos</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          Agregar productos
        </button>
      </div>
      <br>
      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
        <th>Codigo de barras</th>
        <th>Nombre</th>
        <th>Precio costo</th>
        <th>Precio Venta</th>
        <th>Stock</th>
        <th>Pasillo</th>
        <th>Estatus</th>
        <th>Fecha alta</th>
        <th>Descripcion</th>
        <th>Numero de ventas</th>
        <th></th>
         </tr> 
        </thead>
        <tbody>
        <?php
        $item = null;
        $valor = null;
        $consulta="SELECT * FROM producto";
       $productos=mysqli_query($conexion,$consulta);
       foreach ($productos as $key => $value){
                   echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["codigo_barras"].'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["precio_costo"].'</td>
                  <td>'.$value["precio_venta"].'</td>
                   <td>'.$value["existencia_producto"].'</td>
                  <td>'.$value["id_pasillo"].'</td>
                   <td>'.$value["status"].'</td>
                   <td>'.$value["fecha_alta"].'</td>
                  <td>'.$value["descripcion"].'</td> 
                  <td>'.$value["numero_ventas"].'</td>'; 
                  echo '
                  <td>
                    <div class="btn-group">                        
                      <button class="btn btn-warning btnEditarProducto" data-toggle="modal" data-target="#modalEditarProducto">
                      <i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btnEliminarProducto" 
                      idProducto="'.$value["id_producto"].'"  nombre="'.$value["nombre"].'"><i class="fa fa-times"></i></button>
                    </div>  
                  </td>
                </tr>';
        }
        ?> 
        </tbody>
       </table>
      </div>
    </div>
  </section>
</div>

<div id="modalAgregarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
           <form role="form" method="post" enctype="">
           <div class="modal-header" style="background:#3c8dbc; color:white">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h3>Agregar productos</h3>
           </div>
           <div class="modal-body">
           <div class="box-body">
               <!--Codigo de barras-->
               <div class="form-group">
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 
                <input type="text" class="form-control form-control-sm" name="nuevoCodigo" placeholder="Ingresar codigo de barras" required>
                </div>
               </div>
               <!--Nombre producto-->
               <div class="form-group">
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 
                <input type="text" class="form-control form-control-sm" name="nuevoNombre" placeholder="Ingresar nombre de producto" required>
                </div>
               </div>
               <!--precio costo-->
               <div class="form-group">
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-money"></i></span> 
                <input type="text" class="form-control form-control-sm" name="nuevoPrecioCosto" placeholder="Precio costo" required>
                </div>
               </div>
               <!--precio venta-->
               <div class="form-group">
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 
                <input type="text" class="form-control form-control-sm" name="nuevoPrecioVenta" placeholder="Precio venta" required>
                </div>
               </div>
               <!--Stock-->
               <div class="form-group">
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-exchange"></i></span> 
                <input type="text" class="form-control form-control-sm" name="nuevoStock" placeholder="Ingresar cantidad en existencia" required>
                </div>
               </div>
               <!--Pasillo-->
               <div class="form-group">
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-link"></i></span> 
                <input type="text" class="form-control form-control-sm" name="nuevoPasillo" placeholder="Ingresar pasillo" required>
                </div>
               </div> 
               <!--Estatus-->
               <div class="form-group">
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                <select class="form-control form-control-sm" name="nuevoPerfil">
                  <option value="">Selecionar estatus</option>
                  <option value="Administrador">Activo</option>                  
                  <option value="Vendedor">Inactivo</option>
                </select> 
              </div>
               </div>
               <!--Descripcion-->
               <div class="form-group">
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-align-center"></i></span> 
               <textarea class="form-control form-control-sm" type="text" rows="3" name="nuevaDescripcion"></textarea>
                </div>
               </div>
           </div>
           </div>
           <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary" name="guardar">Guardar producto</button>
        </div>
           </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->
<div id="modalEditarProducto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Editar producto</h3>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
           <!--Codigo de barras-->
           Codigo de barras:
           <div class="form-group">
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 
                <input type="text" class="form-control form-control-sm" name="editarCodigo">
                </div>
               </div>
               <!--Nombre producto-->
               Nombre producto:
               <div class="form-group">
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 
                <input type="text" class="form-control form-control-sm" name="editarNombre">
                </div>
               </div>
               <!--precio costo-->
               Precio costo:
               <div class="form-group">
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-money"></i></span> 
                <input type="text" class="form-control form-control-sm" name="editarPrecioCosto" >
                </div>
               </div>
               <!--precio venta-->
               Precio venta:
               <div class="form-group">
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 
                <input type="text" class="form-control form-control-sm" name="editarPrecioVenta">
                </div>
               </div>
               <!--Stock-->
               Stock:
               <div class="form-group">
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-exchange"></i></span> 
                <input type="text" class="form-control form-control-sm" name="editarStock">
                </div>
               </div>
               <!--Pasillo-->
               Pasillo:
               <div class="form-group">
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-link"></i></span> 
                <input type="text" class="form-control form-control-sm" name="editarPasillo" >
                </div>
               </div>
               <!--Estatus-->
               Estatus:
               <div class="form-group">
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                <select class="form-control form-control-sm" name="editarPerfil">
                  <option value=""></option>
                  <option value="Administrador">Activo</option>                  
                  <option value="Vendedor">Inactivo</option>
                </select> 
              </div>
               </div>
               <!--Descripcion-->
               Descripcion:
               <div class="form-group">
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-align-center"></i></span> 
               <textarea class="form-control form-control-sm" type="text" rows="3" name="editarDescripcion"></textarea>
                </div>
               </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Modificar producto</button>
        </div>
        
      </form>

</div>
</div>
</div>