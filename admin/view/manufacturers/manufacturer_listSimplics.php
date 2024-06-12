<!DOCTYPE html>
<html>
  <head>
	<?php include("head.php");?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel=stylesheet>

  </head>

   <body class="hold-transition <?php echo $skin;?> sidebar-mini">
	<?php 
		if ($permisos_editar==1){
		include("modal/agregar_fabricante.php");
		include("modal/editar_fabricante.php");
		}
	?>  
    <div class="wrapper">
      <header class="main-header">
		<?php include("main-header.php");?>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
		<?php include("main-sidebar.php");?>
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<?php if ($permisos_ver==1){?>
        <section class="content-header">
				<div class="row">
                    <div class="col-xs-3">
						<div class="input-group">
						  <input type="text" class="form-control" placeholder="Buscar por nombre" id='q' onkeyup="load(1);">
						  <span class="input-group-btn">
							<button class="btn btn-default" type="button" onclick='load(1);'><i class='fa fa-search'></i></button>
						  </span>
						</div><!-- /input-group -->
						
					</div>
					<div class="col-xs-3"></div>
					<div class="col-xs-1">
						<div id="loader" class="text-center"></div>
						
					</div>
					<div class="col-xs-5 ">
						<div class="btn-group pull-right">
							<?php if ($permisos_editar==1){?>
							<button type="button" class="btn btn-default"  data-toggle="modal" data-target="#modal_register"><i class='fa fa-plus'></i> Nuevo</button>
							<?php }?>
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Mostrar
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu pull-right">
							  <li class='active' onclick='per_page(15);' id='15'><a href="#">15</a></li>
							  <li  onclick='per_page(25);' id='25'><a href="#">25</a></li>
							  <li onclick='per_page(50);' id='50'><a href="#">50</a></li>
							  <li onclick='per_page(100);' id='100'><a href="#">100</a></li>
							  <li onclick='per_page(1000000);' id='1000000'><a href="#">Todos</a></li>
							</ul>
						</div>
                    </div>
					<input type='hidden' id='per_page' value='15'>
			    </div>
		</section>
		<!-- Main content -->
        <section class="content">
        	<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Reservas para hoy</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
									

				<div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin"> 
						<thead>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1"></th>
								<th class="column100 column2" data-column="column2">Lunes</th>
								<th class="column100 column3" data-column="column3">Martes</th>
								<th class="column100 column4" data-column="column4">Miercoles</th>
								<th class="column100 column5" data-column="column5">Jueves</th>
								<th class="column100 column6" data-column="column6">Viernes</th>
								<th class="column100 column7" data-column="column7">Sabado</th>
								<th class="column100 column8" data-column="column8">Domingo</th>
							</tr>
						</thead>
						<tbody>
							<tr class="row100">
								<td class="column100 column1" data-column="column1">16hs</td>
					<td class="column100 column2" data-column="column2"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column3" data-column="column3"><button id="boton1" class="btn btn-primary">Disponible</button></td>
					<td class="column100 column4" data-column="column4"><button id="boton1" class="btn btn-warning">Esperando</button></td>
					<td class="column100 column5" data-column="column5"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column6" data-column="column6"><button id="boton1" class="btn btn-primary">Disponible</button></td>
					<td class="column100 column7" data-column="column7"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column8" data-column="column8"><button id="boton1" class="btn btn-primary">Disponible</button></td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">17hs</td>
					<td class="column100 column2" data-column="column2"><button id="boton1" class="btn btn-warning">Esperando</button></td>
					<td class="column100 column3" data-column="column3"><button id="boton1" class="btn btn-primary">Disponible</button></td>
					<td class="column100 column4" data-column="column4"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column5" data-column="column5"><button id="boton1" class="btn btn-warning">Esperando</button></td>
					<td class="column100 column6" data-column="column6"><button id="boton1" class="btn btn-primary">Disponible</button></td>
					<td class="column100 column7" data-column="column7"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column8" data-column="column8"><button id="boton1" class="btn btn-primary">Disponible</button></td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">18hs</td>
					<td class="column100 column2" data-column="column2"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column3" data-column="column3"><button id="boton1" class="btn btn-primary">Disponible</button></td>
					<td class="column100 column4" data-column="column4"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column5" data-column="column5"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column6" data-column="column6"><button id="boton1" class="btn btn-primary">Disponible</button></td>
					<td class="column100 column7" data-column="column7"><button id="boton1" class="btn btn-warning">Esperando</button></td>
					<td class="column100 column8" data-column="column8"><button id="boton1" class="btn btn-primary">Disponible</button></td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">19hs</td>
					<td class="column100 column2" data-column="column2"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column3" data-column="column3"><button id="boton1" class="btn btn-primary">Disponible</button></td>
					<td class="column100 column4" data-column="column4"><button id="boton1" class="btn btn-warning">Esperando</button></td>
					<td class="column100 column5" data-column="column5"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column6" data-column="column6"><button id="boton1" class="btn btn-warning">Esperando</button></td>
					<td class="column100 column7" data-column="column7"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column8" data-column="column8"><button id="boton1" class="btn btn-warning">Esperando</button></td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">20hs</td>
					<td class="column100 column2" data-column="column2"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column3" data-column="column3"><button id="boton1" class="btn btn-primary">Disponible</button></td>
					<td class="column100 column4" data-column="column4"><button id="boton1" class="btn btn-warning">Esperando</button></td>
					<td class="column100 column5" data-column="column5"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column6" data-column="column6"><button id="boton1" class="btn btn-primary">Disponible</button></td>
					<td class="column100 column7" data-column="column7"><button id="boton1" class="btn btn-warning">Esperando</button></td>
					<td class="column100 column8" data-column="column8"><button id="boton1" class="btn btn-primary">Disponible</button></td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">21hs</td>
					<td class="column100 column2" data-column="column2"><button id="boton1" class="btn btn-warning">Esperando</button></td>
					<td class="column100 column3" data-column="column3"><button id="boton1" class="btn btn-primary">Disponible</button></td>
					<td class="column100 column4" data-column="column4"><button id="boton1" class="btn btn-warning">Esperando</button></td>
					<td class="column100 column5" data-column="column5"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column6" data-column="column6"><button id="boton1" class="btn btn-primary">Disponible</button></td>
					<td class="column100 column7" data-column="column7"><button id="boton1" class="btn btn-warning">Esperando</button></td>
					<td class="column100 column8" data-column="column8"><button id="boton1" class="btn btn-primary">Disponible</button></td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">22hs</td>
					<td class="column100 column2" data-column="column2"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column3" data-column="column3"><button id="boton1" class="btn btn-primary">Disponible</button></td>
					<td class="column100 column4" data-column="column4"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column5" data-column="column5"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column6" data-column="column6"><button id="boton1" class="btn btn-primary">Disponible</button></td>
					<td class="column100 column7" data-column="column7"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column8" data-column="column8"><button id="boton1" class="btn btn-primary">Disponible</button></td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">23hs</td>
					<td class="column100 column2" data-column="column2"><button id="boton1" class="btn btn-warning">Esperando</button></td>
					<td class="column100 column3" data-column="column3"><button id="boton1" class="btn btn-primary">Disponible</button></td>
					<td class="column100 column4" data-column="column4"><button id="boton1" class="btn btn-warning">Esperando</button></td>
					<td class="column100 column5" data-column="column5"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column6" data-column="column6"><button id="boton1" class="btn btn-primary">Disponible</button></td>
					<td class="column100 column7" data-column="column7"><button id="boton1" class="btn btn-danger">Reservado</button></td>
					<td class="column100 column8" data-column="column8"><button id="boton1" class="btn btn-warning">Esperando</button></td>
							</tr>
						</tbody>
					</table>
				</div>

				
			<!-- <div id="resultados_ajax"></div>
			<div class="outer_div"></div> --> <!-- Datos ajax Final -->         
        </section><!-- /.content -->
		<?php 
		} else{
		?>	
		<section class="content">
			<div class="alert alert-danger">
				<h3>Acceso denegado! </h3>
				<p>No cuentas con los permisos necesario para acceder a este módulo.</p>
			</div>
		</section>		
		<?php
		}
		?>
      </div><!-- /.content-wrapper -->
      <?php include("footer.php");?>
    </div><!-- ./wrapper -->
	<?php include("js.php");?>
	<script src="dist/js/VentanaCentrada.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.js"></script>
	
  </body>
</html>
	<script>
	$(function() {
		load(1);
	});
	function load(page){
		var query=$("#q").val();
		var per_page=$("#per_page").val();
		var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'./ajax/fabricantes_ajax.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='./img/ajax-loader.gif'>");
		  },
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}
	
	function per_page(valor){
		$("#per_page").val(valor);
		load(1);
		$('.dropdown-menu li' ).removeClass( "active" );
		$("#"+valor).addClass( "active" );
	}

	
	</script>

		<script>
		function eliminar(id){
			if(confirm('Esta acción  eliminará de forma permanente el fabricante \n\n Desea continuar?')){
				var page=1;
				var query=$("#q").val();
				var per_page=$("#per_page").val();
				var parametros = {"action":"ajax","page":page,"query":query,"per_page":per_page,"id":id};
				
				$.ajax({
					url:'./ajax/fabricantes_ajax.php',
					data: parametros,
					 beforeSend: function(objeto){
					$("#loader").html("<img src='./img/ajax-loader.gif'>");
				  },
					success:function(data){
						$(".outer_div").html(data).fadeIn('slow');
						$("#loader").html("");
						window.setTimeout(function() {
						$(".alert").fadeTo(500, 0).slideUp(500, function(){
						$(this).remove();});}, 5000);
					}
				})
			}
		}
	</script>
	



<script>
$('#new_register').validator().on('submit', function (e) {
  if (e.isDefaultPrevented()) {
    // handle the invalid form...
  } else {
    $('#guardar_datos').attr("disabled", true);
	 var parametros = $(this).serialize();
		 $.ajax({
				type: "POST",
				url: "ajax/registro/agregar_fabricante.php",
				data: parametros,
				 beforeSend: function(objeto){
					$("#resultados_ajax").html("Enviando...");
				  },
				success: function(datos){
				$("#resultados_ajax").html(datos);
				$('#guardar_datos').attr("disabled", false);
				load(1);
				window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();});}, 5000);
				$('#modal_register').modal('hide');
			  }
		});
	  event.preventDefault();
  }
})
</script>

<script>
function send_update(){
$('#update_register').validator().on('submit', function (e) {
  if (e.isDefaultPrevented()) {
    // handle the invalid form...
  } else {
     $('#actualizar_datos').attr("disabled", true);
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/modificar/fabricante.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Enviando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			load(1);
			window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove();});}, 5000);
			$('#modal_update').modal('hide');
		  }
	});
  event.preventDefault();
  }
})
}





</script>
<script>
		function editar(id){
			var parametros = {"action":"ajax","id":id};
			$.ajax({
					url:'modal/editar/fabricante.php',
					data: parametros,
					 beforeSend: function(objeto){
					$("#loader2").html("<img src='./img/ajax-loader.gif'>");
				  },
					success:function(data){
						$(".outer_div2").html(data).fadeIn('slow');
						$("#loader2").html("");
						send_update();
					}
				})
		}
		
		
</script>

 <!--<script type="text/javascript">
	$("#mi-boton").click(function(){
  $(this).toggleClass("btn-danger btn-success") ;
});
</script> -->
<script> 
	var boton1 = 0;
$(".boton1").click(function() { //Function del Click
  if (boton1 === 0) { //Condicion de la Variable = 0
    boton1 = 1; //Cambiamos a 1
    $(".boton1").text("Reservado"); //Modificamos el Texto del Boton
    $(".boton1").toggleClass("btn-danger") ; //Mostramos el Panel
  }else{ //Al darle Click de Nuevo
    mi-boton = 0; //Cambiamos a 0
    $(".boton1").text("Disponible"); //Modificamos el Texto del Boton
    $(".boton1").toggleClass("btn-success") ; //Mostramos el Panel
  }
});
</script>