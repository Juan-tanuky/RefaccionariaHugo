
<?php
include("conexion.php");
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Registro de ventas
    </h1>
    <ol class="breadcrumb">
      
      <li><a><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Registro de ventas</li>
    
    </ol>
  </section>
  <section class="content">
   <div class="box ">
   <br>
	  <div class="table  table-striped dt-responsive tablas">
     <div class="input-daterange">
      <div class="col-md-3">
	  <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="date" class="form-control form-control-sm" name="busqueda" >
				
              </div>
            </div>
      
      </div>
            
     </div>
	 
     <div class="col-md-3">
      <button type="button" class="btn btn-primary">Buscar <span class="badge"><i class="fa fa-search"></i></span></button>
     </div>
	 <div class="col-md-3" style="margin-left:330px">
      <button type="button" class="btn btn-danger">Generar PDF <span class="badge"><i class="fa fa-file"></i></span></button>
     </div>
	
    </div>
	

	
      <br>
      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
        <th>Fecha</th>
        <th>Venta total</th>
        <th>Empleado</th>
        <th>IVA</th>
        <th>Subtotal</th>      
         </tr> 
        </thead>
        <tbody>
        <?php
        $item = null;
        $valor = null;
        $consulta="SELECT * FROM ventas";
       $usuarios=mysqli_query($conexion,$consulta);
       foreach ($usuarios as $key => $value){
                   echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["fecha"].'</td>
                  <td>'.$value["venta_total"].'</td>
                  <td>'.$value["id_empleado"].'</td>';
                  echo '<td>'.$value["iva"].'</td>';
                  echo '<td>'.$value["subtotal"].'</td>';
                  
        }
        ?> 
        </tbody>
       </table>
      </div>
    </div>
  </section>
</div>





