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
    <div class="row pt-2">
        <div class="col-md-4 col-sm-6 col-lg-4 row-eq-height pt-2">
            <form action="<?php echo site_url('inventory') ?>" method="post">
                <button style="font-size:20px" class="btn btn-block btn-invert py-4 mb-3 bg-primary">
                    <i class="material-icons">store_mall_directory</i>
                    <span>Stany magazynowe</span>
                </button>
            </form>
        </div>
    </div>
    <br>
    <div class="row pt-2">
        <div class="col-md-4 col-sm-6 col-lg-4 row-eq-height pt-2">
            <form action="<?php echo site_url('order/order_list') ?>" method="post">
                <button style="font-size:20px" class="btn btn-block btn-invert py-4 mb-3 bg-primary">
                    <i class="material-icons">import_export</i>
                    <span>Eksport</span>
                </button>
            </form>
        </div>
    </div>
    <br>
    <div class="row pt-2">
        <div class="col-md-4 col-sm-6 col-lg-4 row-eq-height pt-2">
            <form action="<?php echo site_url('wz') ?>" method="post">
                <button style="font-size:20px" class="btn btn-block btn-invert py-4 mb-3 bg-primary">
                    <i class="material-icons">list</i>
                    <span>Podgląd</span>
                </button>
            </form>
        </div>
    </div>
    <br>
    <div style="display:none;" class="row pt-2">
        <div class="col-md-4 col-sm-6 col-lg-4 row-eq-height pt-2">
            <form action="<?php echo site_url('fv') ?>" method="post">
                <button style="font-size:20px" class="btn btn-block btn-invert py-4 mb-3 bg-primary">
                    <i class="material-icons">message</i>
                    <span>Wiadomości</span>
                </button>
            </form>
        </div>
    </div>
</div>
<hr>
