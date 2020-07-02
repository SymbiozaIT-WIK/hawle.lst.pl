<?php if($this->session->flashdata('alert')):?>
   <?php $msg=$this->session->flashdata('alert'); ?>
    <div class="container">
        <div class="alert alert-<?php echo $msg['color']; ?>" role="alert">
      <h4 class="alert-heading"><?php echo $msg['title']; ?></h4>
      <p><?php echo $msg['content']; ?></p>
    </div>
    </div>
<?php endif; ?>

<div class="container">

<div class="row">

   <div class="col-md-12">
       <h1>Skład Regionalny</h1>
       
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

   </div>
    <div class="col-md-6">
      <h2>&nbsp;</h2>
       <ul class="nav flex-column">
           <li class="nav-item border-bottom">
                <a href="<?php echo site_url('order/create_mm') ?>" class="nav-link">
                <i class="material-icons" style="margin:0;padding:0; font-size:2em;;">create</i>
                <span style="font-size:2em;"> Utwórz zamówienie</span></a>
            </li>
            <li class="nav-item">
                <a href="<?php echo site_url('order/create_wz') ?>" class="nav-link">
                <i class="material-icons" style="margin:0;padding:0; font-size:2em;;">create</i>
                <span style="font-size:2em;"> Zarejestruj wydanie</span></a>
            </li>
            <li class="nav-item">
                <a href="<?php echo site_url('order/order_list') ?>" class="nav-link">
                <i class="material-icons" style="margin:0;padding:0; font-size:2em;;">list</i>
                <span style="font-size:2em;"> Lista Zamówień</span></a>
            </li>
            <li class="nav-item">
                <a href="<?php echo site_url('fv/fv_list') ?>" class="nav-link">
                <i class="material-icons" style="margin:0;padding:0; font-size:2em;;">account_balance</i>
                <span style="font-size:2em;"> Lista Faktur</span></a>
            </li>
       </ul>
    </div>
    
    <div class="col-md-6">
       <?php if(isset($availableWarehouses) && is_array($availableWarehouses)): ?>
        <h2>Stany w magazynach</h2>
        <ul class="nav flex-column">
          <?php foreach($availableWarehouses as $warehouse): ?>
           <li class="nav-item bg-default">
                <a href="<?php echo site_url('inventory/warehouse_state/'.$warehouse['code']) ?>" class="nav-link">
                <i class="fas fa-warehouse fa-2x"></i>
                <span style="font-size:2em;">&nbsp;&nbsp;<?php echo $warehouse['code']; ?></span>
                <span style="font-size:1.6em; display:block; padding:0 2em;">&nbsp;&nbsp;<?php echo $warehouse['description']; ?></span>
                </a>
            </li>
            <?php endforeach;?>
       </ul>
       <?php endif; ?>
       
    </div>
</div>
    
</div>
<!--
<div class="container">
    
           
    <h1>Skład Regionalny</h1>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-lg-3 row-eq-height pt-2">
            <form action="<?php echo site_url('order/create_mm') ?>" method="post">
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
            <form action="<?php echo site_url('order/create_wz') ?>" method="post">
                <button style="font-size:24px" class="btn btn-block btn-invert py-4 mb-3 bg-primary">
                    <i class="material-icons">create</i>
                    <span>Zarejestruj wydanie</span>
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
            <form action="<?php echo site_url('fv/fv_list') ?>" method="post">
                <button style="font-size:24px" class="btn btn-block btn-invert py-4 mb-3 bg-primary">
                    <i class="material-icons">account_balance</i>
                    <span>Lista Faktur</span>
                </button>
            </form>
        </div>
    </div>
</div>
           
    
-->
    
<!--    <ul>
        <li>Tworzenie zamówienia MM</li>
        <li>
            <ul>
                <li>
                    zamówienia tylko z magazynu THAN
                </li>
                <li>
                    na wybrany magazyn przypisany do magreg'a
                </li>
            </ul>
        </li>
        <li>Tworzenie zamówienia WZ</li>
        <li>
            <ul>
                <li>
                    zamówienia tylko ze swoich magazynów (sk42, sk10 itp)
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
        </li>
    </ul>




    <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h2 class="card-title">Zamówienia</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="<?php #echo site_url('order/create_mm'); ?>">MM</a></li>
                    <li class="list-group-item"><a href="<?php #echo site_url('order/create_wz'); ?>">WZ</a></li>
                    <li class="list-group-item"><a href="">Moje zamówienia</a></li>
                    <li class="list-group-item"><a href="">Moje faktury</a></li>
                </ul>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h2 class="card-title">Stany magazynowe</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="<?php #echo site_url('order/create_mm'); ?>">MM</a></li>
                    <li class="list-group-item"><a href="<?php #echo site_url('order/create_wz'); ?>">WZ</a></li>
                    <li class="list-group-item"><a href="">Moje zamówienia</a></li>
                    <li class="list-group-item"><a href="">Moje faktury</a></li>
                </ul>
            </div>
        </div>



    </div>-->
<hr>
