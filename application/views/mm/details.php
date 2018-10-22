<pre>
    <?php
//        print_r($mmHeader);
//        print_r($mmLines);
    ?>
</pre>




<div class="container">
    <table class="table table-hover table-bordered">

        <tr>
            <td colspan="2" style="vertical-align:middle; font-weight:bold;">Wystawił:</td>
            <td style="vertical-align:middle; font-weight:bold;">Odbiorca:</td>
            <td rowspan="2" class="bg-info text-center text-primary">
                <h1>Zamówienie</h1>
                Lokalizacja docelowa <br>
                <h3>
                    <?php echo $mmHeader['tomagname']; ?>
                </h3>
            </td>
            <td>Nr zamówienia klienta</td>
            <td colspan="2">
                <?php echo $mmHeader['CUSTOMERDOCNO']; ?>
            </td>
        </tr>
        <tr>
            <td rowspan="2" colspan="2">
                <h4>Fabryka Armatury <br>Hawle Spółka z o.o.</h4>
                <p>
                    ul. Piaskowa 9 <br>
                    62-028 Koziegłowy,<br>
                    Polska
                </p>
            </td>
            <td rowspan="2">
            <h4>Klient nr: <?php echo $mmHeader['SELLTO']; ?></h4>

            </td>
            <td>Data przyjęcia</td>
            <td colspan="2">
                <?php echo $mmHeader['DATE_ADD']; ?>
            </td>
        </tr>
        <tr>
            <td class="bg-info text-center"><b class="text-primary">
                <?php echo $mmHeader['statusname']; ?>
                </b></td>
            <td>Uwagi</td>
            <td colspan="2" style="padding:0;margin:0;">

                <?php echo $mmHeader['DESCRIPTION']; ?>

            </td>
        </tr>
        <tr>
            <th>Lp</th>
            <th>Kod twaru</th>
            <th>Opis</th>
            <th>Cecha</th>
            <th>Ilość</th>
            <th>Magazyn</th>
            <!--        <th>Uwagi</th>-->
        </tr>
        <?php $lp=0;?>
        <?php foreach($mmLines as $line): ?>
        <?php $lp++; ?>
            <tr>
                <td><?php echo $lp; ?></td>
                <td><?php echo $line['ITEMCODE']; ?></td>
                <td><?php echo $line['DESCRIPTION']; ?></td>
                <td><?php echo $line['attribute']; ?></td>
                <td><?php echo $line['QUANTITY']; ?></td>
                <td><?php echo $line['REGIONALWAREHOUSECODE']; ?></td>
            </tr>
        <?php endforeach;?>
        <tr>
            <td colspan="7" class="text-right">
            <?php if($this->session->userdata('usertype')!='A'): ?>
            
        <a href="<?php echo site_url('order/order_confirm/'.$mmHeader['tempid']); ?>" type="button" <?php if($mmHeader['STATUSID']>1){echo 'disabled';} ?> class="btn btn-success btn-sm">
          Wyślij
        </a>
        <form action="<?php echo site_url('order/create_mm'); ?>" method="post" style="display:inline;">
            <input hidden type="text" name="tempid" value="<?php echo $mmHeader['tempid']; ?>">
            <button type="submit" <?php if($mmHeader['STATUSID']>2){echo 'disabled';} ?> class="btn btn-warning btn-sm">
              Edytuj zamówienie
            </button>
        </form>
        <button type="button" <?php if($mmHeader['STATUSID']!=1){echo 'disabled';} ?> class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteQuestion">
          Usuń
        </button>
        <?php else:?>
        <form action="<?php echo site_url('order/order_export'); ?>" method="post">
           <?php $backurl = htmlspecialchars($_SERVER['HTTP_REFERER']); ?>
           <a href="<?php echo $backurl; ?>" class="btn btn-warning btn-lg">Wstecz</a>
            <input hidden type="text" name="order[]" value="<?php echo $mmHeader['tempid']; ?>" >
            <button type="submit" class="btn btn-primary btn-lg">Eksportuj</button>
        </form>
        <?php endif;?>
        
        </td>
        </tr>
    </table>
</div>


<!-- czy usunąć zamówienie? -->
<div class="modal fade" id="deleteQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Czy usunąć zamówienie ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
            Czy chcesz całkowicie usunąć aktualne zamówienie ?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
        <a href="<?php echo site_url('order/order_delete/'.$mmHeader['tempid']); ?>" type="button" class="btn btn-danger">USUŃ!</a>
      </div>
    </div>
  </div>
</div>