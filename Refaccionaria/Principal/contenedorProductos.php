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
      <!--Entrada para el filtro
       echo 'Número de total de registros: '.$fila['existencia_producto'];-->
       
      <div class="col-xs-3">
     
      <label for="usrname"><span class="glyphicon "></span>Buscar producto</label> 
      <input class="input-sm" id="myInput" type="text" placeholder="  ">
     
      </div>
      
      <br><br>
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
        <th>No. de ventas</th>
        <th style="width:110px"></th>
         </tr> 
        </thead>
        <tbody id="myTable">
        <?php
        $item = null;
        $valor = null;
        $consulta="SELECT * FROM producto ORDER BY id_producto DESC";
       $productos=mysqli_query($conexion,$consulta);
       $sql = "SELECT COUNT(*) existencia_producto FROM producto";
       $result = mysqli_query($conexion,$sql);
       $fila = mysqli_fetch_assoc($result);
      foreach ($productos as $key => $value){
        for($i = 0; $i < count($fila); $i++){ 
                   echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["codigo_barras"].'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["precio_costo"].'</td>
                  <td>'.$value["precio_venta"].'</td>';                                  
            if($value["existencia_producto"]<=10){
            echo '
                 <div>
                 <td>
                 <button class="btn btn-danger btn-sm">'.$value["existencia_producto"].'</button>
                 </td>
                 </div>
                 ';}
                 else{
                 if($value["existencia_producto"]>=20){
                  echo '
                  <div>
                  <td>
                  <button class="btn btn-success btn-sm">'.$value["existencia_producto"].'</button>
                  </td>
                  </div>
                  ';
                 } else {
                   if($value["existencia_producto"]>=10 && $value["existencia_producto"]<20){
                    echo '
                    <div>
                    <td>
                    <button class="btn btn-warning btn-sm">'.$value["existencia_producto"].'</button>
                    </td>
                    </div>
                    ';
                   }
                 }   
                }            
               echo ' <td>'.$value["id_pasillo"].'</td>';
               if($value['status']==0){
               echo '
               <div>
               <td>
               <button class="btn btn-danger btn-sm">Inactivo</button>
               </td>
               </div>
               ';}
               else {
                 if($value['status']==1){
                  echo '
                  <div>
                  <td>
                  <button class="btn btn-success btn-sm">activo</button>
                  </td>
                  </div>
                  ';
                 }
               }
               
               $fechaAlta=date_create($value['fecha_alta']);
               $newFecha=date_format($fechaAlta,'d/m/Y');
                   echo' 
                   <td>'.$newFecha.'</td>';

                   echo '
                  <td>'.$value["descripcion"].'</td> 
                  <td>'.$value["numero_ventas"].'</td>'; 
                  echo '
                  <td>
                    <div class="btn-group">                        
                      <button class="btn btn-warning btnEditarProducto" data-toggle="modal" data-target="#modalEditarProducto">
                      <i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btnEliminarProducto"><i class="fa fa-times"></i></button>
                    </div>  
                  </td>
                </tr>';
        }}
        ?>  
        </tbody>
       </table>
      </div>
    </div>
    <blockquote class="blockquote-reverse">
    <p class="text-right small">
    <strong>
    <?php
    echo 'Número de total de productos: '; 
    ?>
    </strong>
    <?php
    echo $fila['existencia_producto'];
    ?>
    </p>
    </blockquote>
  </section>
<div id="modalAgregarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
           <form method="POST" enctype="" action="../Principal/menuAdministrador.php?p=contenedorProductos">
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
                <select class="form-control form-control-sm" name="nuevoEstatus">
                  <option value="">Selecionar estatus</option>
                  <option value="1">Activo</option>                  
                  <option value="0">Inactivo</option>
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
<?php
if(isset($_POST['guardar'])){
$codigoB=$_POST['nuevoCodigo'];
$nombreP=$_POST['nuevoNombre'];
$precioC=$_POST['nuevoPrecioCosto'];
$precioV=$_POST['nuevoPrecioVenta'];
$stock=$_POST['nuevoStock'];
$pasillo=$_POST['nuevoPasillo'];
$estatus=$_POST['nuevoEstatus'];
$hoy = date("y-m-d H:m:s"); 
$descripcion=$_POST['nuevaDescripcion'];
$insertar="INSERT INTO producto (codigo_barras, nombre, precio_costo,
precio_venta,existencia_producto,id_pasillo, id_producto_carrito,status,
fecha_alta,fecha_devolucion,descripcion,numero_ventas) VALUES
('$codigoB', '$nombreP', '$precioC', '$precioV', '$stock',$pasillo, 
NULL,$estatus,'$hoy', NULL,'$descripcion', NULL)";
$ejecutar=mysqli_query($conexion,$insertar);
if($ejecutar){
  echo '<p class="alert alert-success agileits" role="alert">Captura realizada correctamente!</p>';
  //header('Refresh: 1');
}else{
  echo "<script>alert('Error al guardar')</script>";
}
}
?>

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
<?php
if(isset($_GET['borrar'])){
$borrar_id==$_GET['borrar'];
$borrar="DELETE FROM producto WHERE id_producto='$borrar_id' ";
$ejecutar=mysqli_query($conexion,$borrar);
if($ejecutar){
echo "<script>alert('El producto ha sido borrado')</script>";
echo "<script>window.open('../Principal/menuAdministrador.php?p=contenedorProductos','_self')</script>";
}
}
?>
<!--Entrada de codigo para hacer funcionar el filtro-->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>