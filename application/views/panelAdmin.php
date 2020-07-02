<?php if($this->session->flashdata('alert')):?>
   <?php $msg=$this->session->flashdata('alert'); ?>
    <div class="container">
        <div class="alert alert-<?php echo $msg['color']; ?>" role="alert">
      <h4 class="alert-heading"><?php echo $msg['title']; ?></h4>
      <p><?php echo $msg['content']; ?></p>
    </div>
    </div>
<?php endif; ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<div class="container">
    <h1>Administracja</h1>
    
    <?php if(isset($_SESSION['flash_msg'])):?>
   <?php $msg=$_SESSION['flash_msg']; ?>
    <div class="container">
        <div class="alert alert-<?php echo $msg['color']; ?>" role="alert">
      <h4 class="alert-heading"><?php echo $msg['title']; ?></h4>
      <p><?php echo $msg['content']; ?></p>
    </div>
    </div>
       <?php unset($_SESSION['flash_msg']);?>
<?php endif; ?>
    
    
    <div class="row pt-2">
        <div class="col-md-4 col-sm-6 col-lg-4 row-eq-height pt-2">
            
                <a href="<?php echo site_url('inventory') ?>" style="font-size:20px" class="btn btn-block btn-invert py-4 mb-3 bg-primary">
                    <i class="material-icons">store_mall_directory</i>
                    <span>Stany magazynowe</span>
                </a>
            
        </div>
    </div>
    <br>
    <div class="row pt-2">
        <div class="col-md-4 col-sm-6 col-lg-4 row-eq-height pt-2">
            
                <a href="<?php echo site_url('order/order_list/export') ?>" style="font-size:20px" class="btn btn-block btn-invert py-4 mb-3 bg-primary">
                    <i class="material-icons">import_export</i>
                    <span>Eksport</span>
                </a>
            
        </div>
    </div>
    <br>
    <div class="row pt-2">
        <div class="col-md-4 col-sm-6 col-lg-4 row-eq-height pt-2">
            
                <a href="<?php echo site_url('order/order_list'); ?>" style="font-size:20px" class="btn btn-block btn-invert py-4 mb-3 bg-primary">
                    <i class="material-icons">list</i>
                    <span>Podgląd</span>
                </a>
            
        </div>
    </div>
        <br>
    <div class="row pt-2">
        <div class="col-md-4 col-sm-6 col-lg-4 row-eq-height pt-2">
            
                <a href="<?php echo site_url('news') ?>" style="font-size:20px" class="btn btn-block btn-invert py-4 mb-3 bg-primary">
                    <i class="material-icons">list</i>
                    <span>Wiadomości</span>
                </a>
            
        </div>
    </div>
    <br>
    <div class="row pt-2">
        <div class="col-md-4 col-sm-6 col-lg-4 row-eq-height pt-2">
            
                <a href="<?php echo site_url('Update/fileImport') ?>" style="font-size:20px" class="btn btn-block btn-invert py-4 mb-3 bg-warning">
                    <i class="material-icons">import_export</i>
                    <span>Import bazy</span>
                </a>
            
        </div>
    </div>
    <br><br>
    
<!--
        <div class="row pt-2">
        <div class="col-md-4 col-sm-6 col-lg-4 row-eq-height pt-2">
            
                <a href="<?php #echo site_url('Ftpsync/sap2hpl/?redirect=true') ?>" style="font-size:20px" class="btn btn-block btn-invert py-4 mb-3 bg-danger">
                    <i class="material-icons">import_export</i>
                    <span>SAP2HPL</span>
                </a>
            
        </div>
    </div>
-->
    
    <hr>
    <div class="row pt-2">
        <div class="col-md-4 col-sm-6 col-lg-4 row-eq-height pt-2">
            
                <a href="<?php echo site_url('order/file2order') ?>" style="font-size:20px" class="btn btn-block btn-invert py-4 mb-3 bg-info">
                    <i class="material-icons">import_export</i>
                    <span>XML -> WZ </span>
                </a>
            
        </div>
    </div>
</div>
<hr>
