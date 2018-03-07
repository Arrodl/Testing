<style>
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    max-width: 100%;    
    height: 250px;
    
}

.fake-input { position: relative; width:100%; }
.fake-input input { border:none: background:; display:block; width: 100%; box-sizing: border-box }
.img-candado { position: absolute; top: 2px; left: -13px;height:14px; width:auto;}
.img-sobre { position: absolute; top: 2px; left: -20px;height:12px; width:auto;}
.box-text {color:#0096a9; font-weight: bold;}
::placeholder {font-weight: normal;}
body {font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;}
</style>
<body>
        <div class="col-xs-12" style=""><img class="center" src="http://redapptests.tk/heroGuest/hero_guest.png"></div>
        <div class="col-xs-12" style=""><br></div>   
        <form action="<?= base_url()."user/update"?>" method="POST" enctype="multipart/form-data">       
        <input type="hidden" class="form-control box-text" id="email" name="email" value="<?php echo $_SESSION['email']?>" required="required"/>   
                <div style="" class="<?php if(form_error('names')){echo'has-error';} ?> fake-input col-xs-12" >   
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-8 col-sm-4">             
                            <input type="text" placeholder="Nombre(s)" class="form-control box-text" id="names" name="names" required="required"/>               
                            <span class="error"><?php echo form_error('names'); ?></span>
                    </div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                </div>
                <div style="" class="<?php if(form_error('user_first_surname')){echo'has-error';} ?> fake-input col-xs-12" >   
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-8 col-sm-4">             
                            <input type="text" placeholder="Apellido Paterno" class="form-control box-text" id="user_first_surname" name="user_first_surname" required="required"/>               
                            <span class="error"><?php echo form_error('user_first_surname'); ?></span>
                    </div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                </div>
                <div style="" class="<?php if(form_error('user_second_surname')){echo'has-error';} ?> fake-input col-xs-12" >   
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-8 col-sm-4">             
                            <input type="text" placeholder="Apellido Materno" class="form-control box-text" id="user_second_surname" name="user_second_surname" required="required"/>               
                            <span class="error"><?php echo form_error('user_second_surname'); ?></span>
                    </div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                </div>                
                <div style="" class="<?php if(form_error('password')){echo'has-error';} ?> fake-input col-xs-12" >   
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-8 col-sm-4">                                         
                            <input type="password" placeholder="Password" class="form-control box-text" id="password" name="password" required="required"/>              
                            <span class="error"><?php echo form_error('password'); ?></span>
                    </div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                </div>
                <div style="" class="col-xs-12" >   
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-8 col-sm-4" style="text-align: center">            
                            <br>                                                         
                            <span class="text-muted">Forgot password?</span>
                            <a class="text-muted" href="<?php echo base_url()."user/cerrar_sesion" ?>">Cerrar sesión</a>
                    </div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                </div>                
                <div class="form-group ">
                <div class="col-xs-2 col-sm-2"></div>
                <div class="col-xs-1 col-sm-2"></div>
                    <div class="col-xs-6 col-sm-4">                                        
                        <input type="hidden" name="" value="" id="TOKEN"/></br>
                        <input type="submit" value="Guardar Cambios"  style="border-radius: 20px;background-color: #0096a9" class="btn btn-block btn-info">
                    </div>
                    <div class="col-xs-1 col-sm-2"></div>
                    <div class="col-xs-2 col-sm-2"></div>
                </div>
                
      </form>    

    


</body>
</html>