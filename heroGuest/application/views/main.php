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
        <div class="col-xs-12">
            <div class="col-xs-2 col-sm-2"></div>
            <div class="col-xs-1 col-sm-2"></div>
            <form action="<?= base_url()."user/register"?>" >               
            <div class="col-xs-6 col-sm-4">                                                        
                <input type="submit" value="Regístrate"  style="border-radius: 20px;background-color: #0096a9" class="btn btn-block btn-info">
            </div>
            </form>
            <div class="col-xs-1 col-sm-2"></div>
            <div class="col-xs-2 col-sm-2"></div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-2 col-sm-2"></div>
            <div class="col-xs-1 col-sm-2"></div>
            <form action="<?= base_url()."user/login"?>" >   
            <div class="col-xs-6 col-sm-4">                                        
                <input type="hidden" name="" value="" id="TOKEN"/></br>
                <input type="submit" value="Log in"  style="border-radius: 20px;background-color: #0096a9" class="btn btn-block btn-info">
            </div>
            </form>
            <div class="col-xs-1 col-sm-2"></div>
            <div class="col-xs-2 col-sm-2"></div>
        </div>        
                
      </form>    

    


</body>
</html>