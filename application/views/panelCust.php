<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<div class="container">
    <h1>Panel Klienta</h1>
    <div class="row pt-2">
        <div class="col-md-4 col-sm-6 col-lg-3 row-eq-height pt-2">
            <form action="<?php echo site_url('order/create_zs') ?>" method="post">
                <button style="font-size:24px" class="btn btn-block btn-invert py-4 mb-3 bg-primary">
                    <i class="material-icons">create</i>
                    <span>Stwórz zamówienie</span>
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
