  <script>
  $(function() {
    $( "#fechaDeNacimiento" ).datepicker();
  });
  </script>
</head>
<body>

<div class="panel panel-primary">
    <div class="panel-heading">Registro de empleado</div>
      <div class="panel-body">
        <form action="<?= base_url()?>empleado/nuevo" method="POST" enctype="multipart/form-data">
 
                

                <div class="form-group <?php if(form_error('nombre')){echo'has-error';} ?>" >
                    <label for="input-text" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" required="required" />
                        <span class="error"><?php echo form_error('nombre'); ?></span>
                    </div>
                </div>

                <div class="form-group <?php if(form_error('apellidoPaterno')){echo'has-error';} ?>" >
                    <label for="input-text" class="col-sm-2 control-label">Apellido Paterno</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" required="required" />
                        <span class="error"><?php echo form_error('apellidoPaterno'); ?></span>
                    </div>
                </div>

                <div class="form-group <?php if(form_error('apellidoMaterno')){echo'has-error';} ?>" >
                    <label for="input-text" class="col-sm-2 control-label">Apellido Materno</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" required="required" />
                        <span class="error"><?php echo form_error('apellidoMaterno'); ?></span>
                    </div>
                </div>
                
                <div class="form-group <?php if(form_error('fechaDeNacimiento')){echo'has-error';} ?>" >
                    <label for="input-text" class="col-sm-2 control-label">Fecha de Nacimiento</label>
                    <div class="col-sm-10">                
                        <input type="text" class="form-control" id="fechaDeNacimiento" name="fechaDeNacimiento" value=""  required="required" />
                        <span class="error"><?php echo form_error('fechaDeNacimiento'); ?></span>
                    </div>
                </div>

                <div class="form-group <?php if(form_error('ingresosAnuales')){echo'has-error';} ?>" >
                    <label for="input-text" class="col-sm-2 control-label">Ingresos anuales</label>
                    <div class="col-sm-10">                
                        <input type="text" class="form-control" id="ingresosAnuales" name="ingresosAnuales" value=""  required="required" />
                        <span class="error"><?php echo form_error('ingresosAnuales'); ?></span>
                    </div>
                </div>
                    
                <div class="form-group ">
                    <div class="col-sm-12">                                        
                        <input type="hidden" name="" value="" id="TOKEN"/></br>
                        <input type="submit" value="Registrar"  class="btn btn-block btn-success">
                    </div>
                </div>
                
      </form>    

    </div>

</div>
</body>
</html>