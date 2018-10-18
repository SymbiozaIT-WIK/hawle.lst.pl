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
                KodLokalizacjiDocelowej <br>
                <h3>
                    <?php echo $mmHeader['FROMMAG']; ?>
                </h3>
            </td>
            <td>Nr zamówienia klienta</td>
            <td colspan="2">

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
                <?php echo $mmHeader['STATUSID']; ?>
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
        <button type="button" <?php if($mmHeader['STATUSID']>1){echo 'disabled';} ?> class="btn btn-success btn-sm" data-toggle="modal" data-target="#deleteQuestion">
          Zatwierdź
        </button>
        <button type="button" <?php if($mmHeader['STATUSID']>2){echo 'disabled';} ?> class="btn btn-warning btn-sm" data-toggle="modal" data-target="#deleteQuestion">
          Edytuj zamówienie
        </button>
        <button type="button" <?php if($mmHeader['STATUSID']!=1){echo 'disabled';} ?> class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteQuestion">
          Usuń
        </button>
        </td>
        </tr>
    </table>
</div>