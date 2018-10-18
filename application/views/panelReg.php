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
    <h1>Panel MagReg</h1>
    <div class="row pt-2">
        <div class="col-md-4 col-sm-6 col-lg-3 row-eq-height pt-2">
            <form action="<?php echo site_url('order/create_mm') ?>" method="post">
                <button style="font-size:24px" class="btn btn-block btn-invert py-4 mb-3 bg-primary">
                    <i class="material-icons">create</i>
                    <span>Stwórz MM</span>
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
                    <span>Stwórz WZ</span>
                </button>
            </form>
        </div>
    </div>
    <br>
    <div class="row pt-2">
        <div class="col-md-4 col-sm-6 col-lg-3 row-eq-height pt-2">
            <form action="<?php echo site_url('order') ?>" method="post">
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
                    <span>Lista FV klienta</span>
                </button>
            </form>
        </div>
    </div>
</div>
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
                    <li class="list-group-item"><a href="<?php echo site_url('order/create_mm'); ?>">MM</a></li>
                    <li class="list-group-item"><a href="<?php echo site_url('order/create_wz'); ?>">WZ</a></li>
                    <li class="list-group-item"><a href="">Moje zamówienia</a></li>
                    <li class="list-group-item"><a href="">Moje faktury</a></li>
                </ul>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h2 class="card-title">Stany magazynowe</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="<?php echo site_url('order/create_mm'); ?>">MM</a></li>
                    <li class="list-group-item"><a href="<?php echo site_url('order/create_wz'); ?>">WZ</a></li>
                    <li class="list-group-item"><a href="">Moje zamówienia</a></li>
                    <li class="list-group-item"><a href="">Moje faktury</a></li>
                </ul>
            </div>
        </div>



    </div>-->
<hr>
