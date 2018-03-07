
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
        <form action="<?= base_url()."user/validate_login"?>" method="GET" enctype="multipart/form-data">                     
                <div style="" class="<?php if(form_error('email')){echo'has-error';} ?> fake-input col-xs-12" >   
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-8 col-sm-4">             
                            <img class="img-sobre" src="http://redapptests.tk/heroGuest/sobre.png" width=25 />
                            <input type="text" placeholder="Email" class="form-control box-text" id="email" name="email" required="required"/>               
                            <span class="error"><?php echo form_error('nombre'); ?></span>
                    </div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                </div>
                <div style="" class="<?php if(form_error('password')){echo'has-error';} ?> fake-input col-xs-12" >   
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-8 col-sm-4">             
                            <img class="img-candado" src="http://redapptests.tk/heroGuest/candado.png" width=25 />
                            <input type="password" placeholder="Password" class="form-control box-text" id="password" name="password" required="required"/>              
                            <span class="error"><?php echo form_error('nombre'); ?></span>
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
                    </div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                    <div class="col-xs-1 col-sm-2" style="background:;"></div>
                </div>                
                <div class="form-group ">
                <div class="col-xs-2 col-sm-2"></div>
                <div class="col-xs-1 col-sm-2"></div>
                    <div class="col-xs-6 col-sm-4">                                        
                        <input type="hidden" name="" value="" id="TOKEN"/></br>
                        <input type="submit" value="Log in"  style="border-radius: 20px;background-color: #0096a9" class="btn btn-block btn-info">
                    </div>
                    <div class="col-xs-1 col-sm-2"></div>
                    <div class="col-xs-2 col-sm-2"></div>
                </div>
                
      </form>    

    


</body>
</html>