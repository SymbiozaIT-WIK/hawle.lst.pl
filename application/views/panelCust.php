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
    <h1>Panel Klienta</h1>
    
    
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
        <div class="col-md-4 col-sm-6 col-lg-3 row-eq-height pt-2">
            <form action="<?php echo site_url('order/create_zs') ?>" method="post">
                <button style="font-size:24px" class="btn btn-block btn-invert py-4 mb-3 bg-primary">
                    <i class="material-icons">create</i>
                    <span>Utwórz zamówienie</span>
                </button>
            </form>
        </div>
    </div>
    <br>
    <div class="row pt-2">
        <div class="col-md-4 col-sm-6 col-lg-3 row-eq-height pt-2">
            <form action="<?php echo site_url('order/order_list') ?>" method="post">
                <button style="font-size:24px" class="btn btn-block btn-invert py-4 mb-3 bg-primary">
                   <i class="material-icons">list</i>
                    <span>Lista Zamówień</span>
                </button>
            </form>
        </div>
    </div>
    <br>
    <div class="row pt-2">
        <div class="col-md-4 col-sm-6 col-lg-3 row-eq-height pt-2">
            <form action="<?php echo site_url('fv') ?>" method="post">
                <button style="font-size:24px" class="btn btn-block btn-invert py-4 mb-3 bg-primary">
                   <i class="material-icons">account_balance</i>
                    <span>Lista FV</span>
                </button>
            </form>
        </div>
    </div>
    <!--    <li>Tworzenie zamówienia</li>
    <li>
        <ul>
            <li>
                zamówienia tylko z magazynu THAN
            </li>
        </ul>
    </li>
    <li>Lista zamówień</li>
    <li>
        <ul>
            <li>Możliwość edycji</li>
            <li>Możliwość usunięcia zamówienia</li>
        </ul>
    </li>
    <li>Lista faktur klienta</li>
    <li>
        <ul>
            <li>Możliwość podglądu faktury i druku PDF</li>
        </ul>
    </li>-->
</div>
<hr>
