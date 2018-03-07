

        <div class='container-fluid'>                                    
                        <!-- inser and search-->
                        <div class="row" >                            
                            <div class="col-xs-12">
                                <form action="<?= base_url()?>empleado/search"  method="POST">
                                    <div class="input-group <?php if(form_error('key')){echo'has-error';} ?>">
                                      <input type="text" class="form-control" id="key" name="key" value="<?php echo set_value('key'); ?>" placeholder="Search for...">
                                      <span class="input-group-btn">
                                        <input type="submit" class="btn btn-success" value="Search"/>
                                      </span>
                                    </div>
                                     <span class="error"><?php echo form_error('key'); ?></span>
                                </form>
                            </div>
                        </div>
                        <br/>
                        <!-- Table -->
                        <div class="row" >
                            <div class="panel panel-primary">
                              <div class="panel-heading ">Users</div>
                                <div class="panel-body">
                                    <table class="table table-condensed">
                                        <thead>
                                          <tr class="success">
                                            
                                            <th width="5%">Id</th>                                            
                                            <th width="20%">Nombre</th>
                                            <th width="20%">Apellido paterno</th>
                                            <th width="20%">Apellido Materno</th>
                                            <th width="20%">Fecha de nacimiento</th>
                                            <th width="15%">Ingresos Anuales</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach ($userlist->result() as $u) {
                                                    echo "<tr>".
                                                            "<td>$u->idEmpleado</td>".
                                                            "<td>$u->nombre</td>".
                                                            "<td>$u->apellidoPaterno</td>".
                                                            "<td>$u->apellidoMaterno</td>" .  
                                                            "<td>$u->fechaDeNacimiento</td>".
                                                            "<td>$u->ingresosAnuales</td>"; 
                                                            /*"<td>".
                                                                "<a href='".base_url()."user/view/$u->id' class='btn btn-primary btn-sm'>Edit</a> &nbsp;".
                                                                "<a href='".base_url()."user/delete/$u->id' class='btn btn-danger btn-sm'>Delete</a> ".
                                                            "</td>".
                                                            "</tr> ";*/
                                                }
                                            ?>
                                              
                                        </tbody>
                                     </table>
                                      <div align="center"><?php echo $page_link; ?></div>
                                    
                                
                                </div>  
                            </div>
                        </div>
                    </div>
                        
                </div>
                    
                    
            </div>
        </div>
        
    <!-- footer -->
    <div class="container-fluid foot">
        <div class="row">
            <div class="col-xs-12">
                    <h4>Prueba de Evaluación para Candidato PHP <br/>PagaFácil.net</h4>                    
            </div>
        </div>
    </div>
    
    <!-- alert veiw -->
    <div class='modal fade' id='myModal' role='dialog'>
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>User Data</h4>
        </div>
        <div class='modal-body'>
          <h2>This is all detail</h2>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
    
    
    <!-- script references -->
    
    <script src="<?= base_url(); ?>asset/js/jquery.js"></script>
     <script src="<?= base_url(); ?>asset/js/bootstrap.min.js"></script>
      <script src="<?= base_url(); ?>asset/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
</body>
</html>