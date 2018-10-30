<!doctype html>
<?php $fvHeader=$fvHeader[0];?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
      body { font-family: DejaVu Sans, sans-serif; }
    </style>
    <title>
        <?php echo $fvHeader['INVOICENO'];?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/main.css">
</head>

<body>

<div class="container" style="margin:0 auto; padding:0;">
   
    <div class="row" style="margin:0;padding:0;">
        <div class="col-xs-4">
            <h1>
                <img src="<?php echo base_url();?>/assets/img/logo.png" class="img-responsive">
            </h1>
        </div>
        <div class="col-xs-7 text-right">
            <h1>Specyfikacja do faktury</h1>
            <h1><small>Numer:
                    <b><?php echo $fvHeader['INVOICENO'];?></b></small></h1>
            <h2><small>Data wystawienia:
                    <b><?php echo $fvHeader['DOCUMENTDATE'];?></b></small></h2>
            <h2><small>Opis księgowania:
                    <b><?php echo $fvHeader['POSTINGDESCRIPTION'];?></b></small></h2>
                    <?php
            if($fvHeader['EXTERNALDOCNO']!=''):?>
            ?>
            <h2><small>Numer dokumentu zewnętrznego:
                   <b> <?php echo $fvHeader['EXTERNALDOCNO'];?></b></small></h2>
                    <?php endif;?>
        </div>
    </div>
    
    <div class="row" style="margin:0;padding:0;">

<div class="col-md-12">
      <table class="table">
      <tr>
          <td>
              <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 style="margin:0;padding:0;">Sprzedawca: <b>
                            <?php echo $fvHeader['vendName'];?></b></h4>
                </div>
                <div class="panel-body">
                        <?php 
                        if($fvHeader['vendName2']!='') echo $fvHeader['vendName2'].'<br/>';
                        if($fvHeader['vendAdress']!='') echo $fvHeader['vendAdress'].'<br/>';
                        if($fvHeader['vendAdress2']!='') echo $fvHeader['vendAdress2'].'<br/>';
                        if($fvHeader['vendPostCode']!='') echo $fvHeader['vendPostCode'].'<br/>';
                        if($fvHeader['vendCity']!='') echo $fvHeader['vendCity'].'<br/>';
                        if($fvHeader['vendNip']!='') echo $fvHeader['vendNip'].'<br/>';
                        if($fvHeader['vendTel']!='') echo $fvHeader['vendTel'].'<br/>';
                        if($fvHeader['vendFax']!='') echo $fvHeader['vendFax'];
                        ?>
                </div>
            </div>
          </td>
          <td>
              <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 style="margin:0;padding:0;">Nabywca : <b>
                            <?php echo $fvHeader['custName'];?></b></h4>
                </div>
                <div class="panel-body">
                       <?php
                        if($fvHeader['custName2']!='') echo $fvHeader['custName2'].'<br/>';
                        if($fvHeader['custAdress']!='') echo $fvHeader['custAdress'].'<br/>';
                        if($fvHeader['custAdress2']!='') echo $fvHeader['custAdress2'].'<br/>';
                        if($fvHeader['custPostCode']!='') echo $fvHeader['custPostCode'].'<br/>';
                        if($fvHeader['custCity']!='') echo $fvHeader['custCity'].'<br/>';
                        if($fvHeader['custNip']!='') echo $fvHeader['custNip'];
                        ?>
                </div>
            </div>
          </td>
      </tr>
  </table>
</div>
   
    </div>
    
    
    
    
    <div class="row" style="font-size:13px;margin:0;padding:0;">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">
                            <h4 style="margin:0;padding:0;">Lp</h4>
                        </th>
                        <th class="text-center">
                            <h4 style="margin:0;padding:0;">Kod towaru</h4>
                        </th>
                        <th class="text-center">
                            <h4 style="margin:0;padding:0;">Opis</h4>
                        </th>
                        <th class="text-center">
                            <h4 style="margin:0;padding:0;">Cecha</h4>
                        </th>
                        <th class="text-center">
                            <h4 style="margin:0;padding:0;">Nr katalogowy</h4>
                        </th>
                        <th class="text-center">
                            <h4 style="margin:0;padding:0;">Ilość</h4>
                        </th>
                        <th class="text-center">
                            <h4 style="margin:0;padding:0;">Netto</h4>
                        </th>
                        <th class="text-center">
                            <h4 style="margin:0;padding:0;">Brutto</h4>
                        </th>
                        <th class="text-center">
                            <h4 style="margin:0;padding:0;">VAT</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $lp=0;?>
                    <?php foreach($fvLines as $line):?>
                    <?php $lp++;?>
                    <tr>
                        <td class="text-center">
                            <?php echo $lp; ?>
                        </td>
                        <td>
                            <?php echo $line['ITEMCODE'];?>
                        </td>
                        <td class="text-right">
                            <?php echo $line['itemDesc'];?>
                        </td>
                        <td class="text-right">
                            <?php echo $line['attribute'];?>
                        </td>
                        <td class="text-right">
                            <?php echo $line['ITEMCATALOGNO'];?>
                        </td>
                        <td class="text-right">
                            <?php echo $line['QUANTITY'];?>
                        </td>
                        <td class="text-right">
                            <?php echo $line['NETAMOUNT'];?>
                        </td>
                        <td class="text-right">
                            <?php echo $line['AMOUNT'];?>
                        </td>
                        <td class="text-right">
                            <?php echo $line['perVat'];?> %</td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <div class="col-md-8 col-md-offset-2 text-right">
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
                    <td>
                        <?php echo $fvHeader['netValue'];?>
                    </td>
                    <td class="text-center">X</td>
                    <td>
                        <?php echo $fvHeader['vatValue'];?>
                    </td>
                    <td>
                        <?php echo $fvHeader['grossValue'];?>
                    </td>
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
    
        <div class="row" style="margin:0;padding:0;">

  <table class="table">
      <tr>
          <td>
              <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 style="margin:0;padding:0;">Dane płatności</h4>
                </div>
                <div class="panel-body">
                    <table>
                        <tr>
                            <td>Do zapłaty słownie:</td>
                            <!--                            <td><?php #echo $fvHeader['inWordsValue'];?></td>-->
                            <td>
                                <?php echo $fvHeader['kwota_slownie'];?>
                            </td>
                        </tr>
                        <tr>
                            <td>Warunki płatności:</td>
                            <td>
                                <?php echo $fvHeader['paymentTerm'];?>
                            </td>
                        </tr>
                        <tr>
                            <td>Termin płatności:</td>
                            <td>
                                <?php echo $fvHeader['PAYMENTDATE'];?>
                            </td>
                        </tr>
                        <tr>
                            <td>Waluta:</td>
                            <td>
                                <?php echo $fvHeader['currency'];?>
                            </td>
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
          </td>
          <td>
              <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 style="margin:0;padding:0;">Dane kontaktowe</h4>
                    </div>
                    <div class="panel-body">
                        <p>
                            <?php echo $fvHeader['vendName'];?><br>
                            <?php echo $fvHeader['vendName2'];?><br>
                            <?php echo $fvHeader['vendAdress'];?><br>
                            <?php echo $fvHeader['vendAdress2'];?><br>
                            <?php echo $fvHeader['vendPostCode'];?><br>
                            <?php echo $fvHeader['vendCity'];?><br>
                            <?php echo $fvHeader['vendNip'];?><br>
                            Tel:
                            <?php echo $fvHeader['vendTel'];?><br>
                            Fax:
                            <?php echo $fvHeader['vendFax'];?><br>
                        </p>
                        <h4 style="margin:0;padding:0;"></h4>
                    </div>
                </div>
          </td>
      </tr>
  </table>
   
    </div>
    
    
</div>

</body>

</html>