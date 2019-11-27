<?php
include("conexion.php");
//include("menuAdministrador.php");
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Administrar usuarios
    </h1>
    <ol class="breadcrumb">
      <li><a><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar usuarios</li>    
    </ol>
  </section>
  <!--Entrada para crear el boton-->
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          Agregar usuario
        </button>
      </div>
      <br>
      <!--Entrada para el filtro-->
      <div class="col-xs-3">
      <label for="usrname"><span class="glyphicon "></span>Buscar usuario</label> 
      <input class="input-sm" id="myInput" type="text" placeholder="  ">
      </div>
      <br><br>
      <!--Entrada para crear la tabla-->
      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
        <th>Nombre completo</th>
        <th>Código de cliente</th>
        <th style="width:130px">Número Telefonico</th>
        <th style="width:130px">Correo</th>
        <th>Direccion</th>      
        <th style="width:110px"></th>
         </tr> 
        </thead>
        <tbody id="myTable">
        <?php
        $item = null;
        $valor = null;
        $consulta="SELECT * FROM cliente";
       $usuarios=mysqli_query($conexion,$consulta);
       foreach ($usuarios as $key => $value){
                   echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["codigo_cliente"].'</td>
                  <td>'.$value["numero_telefono"].'</td>';
                  echo '<td>'.$value["correo"].'</td>';
                  echo '<td>'.$value["direccion"].'</td>';
                  echo '
                  <td>
                    <div class="btn-group">                        
                      <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btnEliminarCliente" 
                      idCliente="'.$value["id_cliente"].'"  usuario="'.$value["nombre"].'"><i class="fa fa-times"></i></button>
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

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Agregar Usuario</h3>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control form-control-sm" name="nuevoNombre" placeholder="Ingresar nombre completo" required>
              </div>
            </div>
            <!-- ENTRADA PARA EL CODIGO DEL CLIENTE -->
             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                <input type="text" class="form-control form-control-sm" name="nuevoCodigo" placeholder="Ingresa codigo" id="nuevocodigo" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL NUMERO DE TELEFONO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                <input type="text" class="form-control form-control-sm" name="nuevoTelefono" placeholder="Ingresa telefono" id="nuevotelefono" required>
              </div>
            </div>
            <!-- ENTRADA PARA EL CORREO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
                <input type="email" class="form-control form-control-sm" name="nuevoCorreo" placeholder="Ingresar correo" required>
              </div>
            </div>
            <!-- ENTRADA PARA EL DIRECCION -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                <input type="text" class="form-control form-control-sm" name="nuevaDireccion" placeholder="Ingresa direccion" id="nuevadireccion" required>
              </div>
            </div>       
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary" name="guardar">Guardar usuario</button>
        </div>
        </form>
</div>
</div>
</div>
<!--Entrada de codigo para insertar los usuarios-->
<?php
if(isset($_POST['guardar'])){
$nombre=$_POST['nuevoNombre'];
$codigoCliente=$_POST['nuevoCodigo'];
$telefono=$_POST['nuevoTelefono'];
$correo=$_POST['nuevoCorreo'];
$direccion=$_POST['nuevaDireccion'];
$insertar="INSERT INTO cliente (nombre,codigo_cliente,numero_telefono,correo,direccion) 
VALUES('$nombre','$codigoCliente','$telefono','$correo','$direccion')";
$ejecutar=mysqli_query($conexion,$insertar);
if($ejecutar){
echo '<p class="alert alert-success agileits" role="alert">Captura realizada correctamente!</p>';
}else{

  echo '<h3>Error al insertar</h3>';
}
}
?>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->
<div id="modalEditarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Editar usuario</h3>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!-- ENTRADA PARA EL NOMBRE -->
            Nombre:
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control form-control-sm" id="editarNombre" name="editarNombre" value="" required>
              </div>
            </div>
			<!-- ENTRADA PARA EL USUARIO -->
            Nombre:
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control form-control-sm" id="editarUsuario" name="editarUsuario" value="" required>
              </div>
            </div>
            <!-- ENTRADA PARA EL EMAIL -->
            Email:
             <div class="form-group">        
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-square"></i></span> 
                <input type="text" class="form-control form-control-sm" id="editarEmail" name="editarEmail" value="">
              </div>
            </div>
            <!-- ENTRADA PARA EL TELEFONO -->
            Telefono:
             <div class="form-group">        
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                <input type="text" class="form-control form-control-sm" id="editarTelefono" name="editarTelefono" value="">
              </div>
            </div>
            <!-- ENTRADA PARA EL Direccion -->
            Direccion:
             <div class="form-group">        
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-book"></i></span> 
                <input type="text" class="form-control form-control-sm" id="editarDireccion" name="editarDireccion" value="">
              </div>
            </div>
        
  
            <!-- ENTRADA PARA LA CONTRASEÑA -->
            Contraseña:
             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
                <input type="password" class="form-control form-control-sm" name="editarPassword" placeholder="Escriba la nueva contraseña">
                <input type="hidden" id="passwordActual" name="passwordActual">
              </div>
            </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Modificar usuario</button>
        </div>
        
      </form>

</div>
</div>
</div>
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