<h1>Panel MagReg</h1>
<ul>
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



</div>