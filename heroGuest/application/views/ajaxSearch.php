<html>
<head>
<title>CodeIgniter ajax post</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">

// Ajax post
$(document).ready(function() {
	$(".submit").click(function(event) {
		event.preventDefault();
		var idEmpleado = $("input#idEmpleado").val();		
		jQuery.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>" + "/empleado/ajaxSearchSubmit",
		dataType: 'json',
		data: {idEmpleado: idEmpleado},
		success: function(res) 
		{
			if (res)
			{
				// Show Entered Value
				jQuery("div#result").show();
				jQuery("#nombre").html(res.nombre);				
				jQuery("#apellidoPaterno").html(res.apellidoPaterno);				
				jQuery("#apellidoMaterno").html(res.apellidoMaterno);				
				jQuery("#fechaDeNacimiento").html(res.fechaDeNacimiento);				
				jQuery("#ingresosAnuales").html(res.ingresosAnuales);				
				
			}
		}
		});
	});
});
</script>
</head>
<body>
<div class="main">
<div id="content">
<div id="form_input">


							<div class="col-xs-12">
                                <form method="POST">
                                    <div class="input-group ">
                                      <input type="text" class="form-control input_box" id="idEmpleado" name="idEmpleado" placeholder="Search for...">
                                      <span class="input-group-btn">
                                        <input type="submit" class="btn btn-success submit" id="submit" value="Search"/>
                                      </span>
                                    </div>
                                     <span class="error"><?php echo form_error('idEmpleado'); ?></span>
                                </form>
                                </br>
								</br>
                            </div>


<div id='result' style='display: none'>
	<table class="table col-xs-12">
	    <thead>      
	        <th class="col-xs-6 textWhiteXl" style="background-color: #3366FF; ">Campo</th>
	        <th class="col-xs-6 textWhiteXl" style="background-color: #3366FF; ">Valor</th>        
	      </tr>
	    </thead>
	    <tbody>
			<tr class="danger">
	        <td class="textBlackSm">Nombre</td>
	        <td class="textBlackSm"><div id="nombre"></div></td>        
	      </tr>
	      <tr class="success">
	        <td class="textBlackSm">Apellido Paterno</td>
	        <td class="textBlackSm"><div id="apellidoPaterno"></div></td>        
	      </tr>
	      <tr class="danger">
	        <td class="textBlackSm">Apellido Materno</td>
	        <td class="textBlackSm"><div id="apellidoMaterno"></div></td>        
	      </tr>
	      <tr class="success">
	        <td class="textBlackSm">Fecha de nacimiento</td>
	        <td class="textBlackSm"><div id="fechaDeNacimiento"></div></td>        
	      </tr>
	      <tr class="danger">
	        <td class="textBlackSm">Ingresos anuales</td>
	        <td class="textBlackSm"><div id="ingresosAnuales"></div></td>        
	      </tr>
	    </tbody>
	  </table>
</div>
</body>
</html>