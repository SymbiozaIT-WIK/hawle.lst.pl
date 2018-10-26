    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Nawigacja</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>">
              <img src="<?php echo base_url();?>/assets/img/logo.png" height="35" class="d-inline-block align-top" alt="">
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
             
          <form action="<?php echo site_url('logout') ?>" class="navbar-form navbar-right" role="form" method="post">
             <div class="form-group">
                 <a class="btn btn-info form-control" href="<?php echo site_url('') ?>">
                    <i class="fas fa-home"></i>
                    </a>
                </div>
             <?php $usertype = $this->session->userdata('usertype');?>
             <?php if($usertype=='A'): ?>
                <div class="form-group">
                 <a class="btn btn-info form-control" href="<?php echo site_url('inventory') ?>">Stany</a>
                </div>
                <div class="form-group">
                 <a class="btn btn-info form-control" href="<?php echo site_url('order/order_list/export') ?>">Eksport</a>
                </div>
                <div class="form-group">
                 <a class="btn btn-info form-control" href="<?php echo site_url('order/order_list') ?>">Podgląd</a>
                </div>
             <?php elseif($usertype=='R'): ?>
                <div class="form-group">
                 <a class="btn btn-info form-control" href="<?php echo site_url('order/create_mm') ?>">Nowe zamówienie</a>
                 </div>
                <div class="form-group">
                 <a class="btn btn-info form-control" href="<?php echo site_url('order/create_wz') ?>">Nowe wydanie</a>
                 </div>
                <div class="form-group">
                 <a class="btn btn-info form-control" href="<?php echo site_url('order/order_list') ?>">Moje zamówienia</a>
                 </div>
                <div class="form-group">
                 <a class="btn btn-info form-control" href="<?php echo site_url('fv/fv_list') ?>">Lista faktur</a>
                </div>
            <?php elseif($usertype=='C'): ?>
                <div class="form-group">
                 <a class="btn btn-info form-control" href="<?php echo site_url('order/create_zs') ?>">Nowe zamówienie</a>
                 </div>
                <div class="form-group">
                 <a class="btn btn-info form-control" href="<?php echo site_url('order/order_list') ?>">Moje zamówienia</a>
                 </div>
                <div class="form-group">
                 <a class="btn btn-info form-control" href="<?php echo site_url('fv') ?>">Lista faktur</a>
             </div>
             <?php endif; ?>
             
            <div class="form-group">
                <a class="btn btn-primary form-control" href="<?php echo site_url('panel'); ?>">Panel użytkownika</a>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger form-control">Wyloguj</button>
            </div>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    
   
