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
            <h1>Specyfikacja do faktury</h1>
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
                    <h4>Sprzedawca: <b><?php echo $fvHeader['vendName'];?></b></h4>
                </div>
                <div class="panel-body">
                    <p>
                        <?php echo $fvHeader['vendName2'];?><br>
                        <?php echo $fvHeader['vendAdress'];?><br>
                        <?php echo $fvHeader['vendAdress2'];?><br>
                        <?php echo $fvHeader['vendPostCode'];?><br>
                        <?php echo $fvHeader['vendCity'];?><br>
                        <?php echo $fvHeader['vendNip'];?><br>
                        <?php echo $fvHeader['vendTel'];?><br>
                        <?php echo $fvHeader['vendFax'];?><br>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-5 col-xs-offset-2 text-right">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Nabywca : <b><?php echo $fvHeader['custName'];?></b></h4>
                </div>
                <div class="panel-body">
                    <p>
                        <?php echo $fvHeader['custName2'];?><br>
                        <?php echo $fvHeader['custAdress'];?><br>
                        <?php echo $fvHeader['custAdress2'];?><br>
                        <?php echo $fvHeader['custPostCode'];?><br>
                        <?php echo $fvHeader['custCity'];?><br>
                        <?php echo $fvHeader['custNip'];?><br>
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
                <th>
                    <h4>VAT</h4>
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
                <td class="text-right"><?php echo $line['itemDesc'];?></td>
                <td class="text-right"><?php echo $line['attribute'];?></td>
                <td class="text-right"><?php echo $line['ITEMCATALOGNO'];?></td>
                <td class="text-right"><?php echo $line['QUANTITY'];?></td>
                <td class="text-right"><?php echo $line['NETAMOUNT'];?></td>
                <td class="text-right"><?php echo $line['AMOUNT'];?></td>
                <td class="text-right"><?php echo $line['perVat'];?>%</td>
                <td class="text-center"><a href="<?php echo site_url('externalFiles/deklaracjePDF/'.$line['ITEMCATALOGNO'].'.pdf');?>">ZOBACZ</a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <div class="row">
       <div class="col-xs-4 col-xs-offset-8 text-right">
           <table class="table">
               <tr>
                   <th class="text-center"></th>
                   <th class="text-center">Wartość netto</th>
                   <th class="text-center">VAT</th>
                   <th class="text-center">Kwota VAT</th>
                   <th class="text-center">Wartość brutto</th>
               </tr>
               <tr class="text-center">
                   <td>Razem:</td>
                   <td>234</td>
                   <td>23</td>
                   <td>234</td>
                   <td>23423</td>
               </tr>
               <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
               </tr>
           </table>
       </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4>Dane płatności</h4>
                </div>
                <div class="panel-body">
                    <table>
                        <tr>
                            <td>Do zapłaty słownie:</td>
                            <td><?php echo $fvHeader['inWordsValue'];?></td>
                        </tr>
                        <tr>
                            <td>Warunki płatności:</td>
                            <td><?php echo $fvHeader['paymentTerm'];?></td>
                        </tr>
                        <tr>
                            <td>Termin płatności:</td>
                            <td><?php echo $fvHeader['PAYMENTDATE'];?></td>
                        </tr>
                        <tr>
                            <td>Waluta:</td>
                            <td><?php echo $fvHeader['currency'];?></td>
                        </tr>
                    </table>
                    <p>
                        <b>Płatność ubezpiecza firma COFACE</b>
                    </p>
                    <table>
                        <tr>
                            <td>Bank:</td>
                            <td>ING Bank Śląski SA</td>
                        </tr>
                        <tr>
                            <td>Konto:</td>
                            <td>PL23 1050 1520 1000 0023 1024 5242</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="span7">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4>Dane kontaktowe</h4>
                    </div>
                    <div class="panel-body">
                        <p>
                            <?php echo $fvHeader['vendName2'];?><br>
                            <?php echo $fvHeader['vendAdress'];?><br>
                            <?php echo $fvHeader['vendAdress2'];?><br>
                            <?php echo $fvHeader['vendPostCode'];?><br>
                            <?php echo $fvHeader['vendCity'];?><br>
                            <?php echo $fvHeader['vendNip'];?><br>
                            Tel: <?php echo $fvHeader['vendTel'];?><br>
                            Fax: <?php echo $fvHeader['vendFax'];?><br>
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
