<pre>
    <?php
//        print_r($fvHeader);
//        print_r($fvLines);
    ?>
</pre>
<?php $fvHeader=$fvHeader[0];?>
<div class="container" style="border:0.1em solid #ddd;">
    <div class="row">
        <div class="col-xs-6">
            <h1>
                <img src="<?php echo base_url();?>/assets/img/logo.png">
            </h1>
        </div>
        <div class="col-xs-6 text-right">
            <h1>FAKTURA</h1>
            <h1><small>Numer: <?php echo $fvHeader['INVOICENO'];?></small></h1>
            <h2><small>Data wystawienia: <?php echo $fvHeader['DOCUMENTDATE'];?></small></h2>
            <h2><small>Opis księgowania: <?php echo $fvHeader['POSTINGDESCRIPTION'];?></small></h2>
            <h2><small>Numer dokumentu zewnętrznego: <?php echo $fvHeader['EXTERNALDOCNO'];?></small></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Sprzedawca: <b>HAWLE</b></h4>
                </div>
                <div class="panel-body">
                    <p>
                        Adres <br>
                        Adres <br>
                        Adres <br>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-5 col-xs-offset-2 text-right">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Nabywca : <b>Klient</b></h4>
                </div>
                <div class="panel-body">
                    <p>
                        Adres <br>
                        Adres <br>
                        Adres <br>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>
                    <h4>Lp</h4>
                </th>
                <th>
                    <h4>Kod towaru</h4>
                </th>
                <th>
                    <h4>Opis</h4>
                </th>
                <th>
                    <h4>Cecha</h4>
                </th>
                <th>
                    <h4>Nr katalogowy</h4>
                </th>
                <th>
                    <h4>Ilość</h4>
                </th>
                <th>
                    <h4>Netto</h4>
                </th>
                <th>
                    <h4>Brutto</h4>
                </th>
                <th class="text-center">
                    <h4>Deklaracja</h4>
                </th>
            </tr>
        </thead>
        <tbody>
           <?php $lp=0;?>
           <?php foreach($fvLines as $line):?>
           <?php $lp++;?>
            <tr>
                <td><?php echo $lp; ?></td>
                <td><?php echo $line['ITEMCODE'];?></td>
                <td class="text-right"><?php echo $line['itemdesc'];?></td>
                <td class="text-right"><?php echo $line['attribute'];?></td>
                <td class="text-right"><?php echo $line['ITEMCATALOGNO'];?></td>
                <td class="text-right"><?php echo $line['QUANTITY'];?></td>
                <td class="text-right"><?php echo $line['NETAMOUNT'];?></td>
                <td class="text-right"><?php echo $line['AMOUNT'];?></td>
                <td class="text-center"><a href="">ZOBACZ</a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <div class="row text-right">
        <div class="col-xs-2 col-xs-offset-8">
            <p>
                <strong>
                    Kwota: <br>
                </strong>
            </p>
        </div>
        <div class="col-xs-2">
            <strong>
                <?php echo $fvHeader['AMOUNT'];?> <br>
            </strong>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4>Dane płatności</h4>
                </div>
                <div class="panel-body">
                    <p>Sprzedawca.dane</p>
                    <p>Sprzedawca.dane</p>
                    <p>Numer konta : --------</p>
                    <p>Termin płatności : <strong>2019-01-13</strong></p>
                </div>
            </div>
        </div>
        <div class="col-xs-7">
            <div class="span7">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4>Dane kontaktowe</h4>
                    </div>
                    <div class="panel-body">
                        <p>
                            Email : email@email.pl <br><br>
                            Tel : 123-456-789 <br> <br>
                        </p>
                        <h4></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
   <form action="<?php echo site_url('fv/fv_download') ?>" method="post">
    <button type="submit" class="btn btn-primary btn-lg btn-block">Pobierz PDF</button>
    </form>
</div>
