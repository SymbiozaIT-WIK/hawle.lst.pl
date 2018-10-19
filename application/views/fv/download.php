<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$html = "
<!doctype html>
<!--[if lt IE 7]>      <html class=\"no-js lt-ie9 lt-ie8 lt-ie7\" lang=\"\"> <![endif]-->
<!--[if IE 7]>         <html class=\"no-js lt-ie9 lt-ie8\" lang=\"\"> <![endif]-->
<!--[if IE 8]>         <html class=\"no-js lt-ie9\" lang=\"\"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=\"no-js\" lang=\"\"> <!--<![endif]-->
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
        <title></title>
        <meta name=\"description\" content=\"\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <link rel=\"apple-touch-icon\" href=\"apple-touch-icon.png\">
        <link rel=\"shortcut icon\" href=\"<?php echo base_url();?>/assets/img/favicon.ico\">
        <link rel=\"stylesheet\" href=\"<?php echo base_url();?>/assets/css/bootstrap.min.css\">
        
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel=\"stylesheet\" href=\"<?php echo base_url();?>/assets/css/bootstrap-theme.min.css\">
        <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\">
<!--        <link href=\"<?php #echo base_url();?>/assets/md/css/mdb.min.css\" rel=\"stylesheet\">-->
        <link rel=\"stylesheet\" href=\"<?php echo base_url();?>/assets/css/main.css\">

        <script src=\"<?php echo base_url();?>/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js\"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class=\"browserupgrade\">You are using an <strong>outdated</strong> browser. Please <a href=\"http://browsehappy.com/\">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
<div id=\"overlay\" class=\"loading\">Ładowanie&#8230;</div>
                    
   <div class=\"container\" style=\"border:0.1em solid #ddd;\">
    <div class=\"row\">
        <div class=\"col-xs-6\">
            <h1>
                <img src=\"<?php echo base_url();?>/assets/img/logo.png\">
            </h1>
        </div>
        <div class=\"col-xs-6 text-right\">
            <h1>FAKTURA</h1>
            <h1><small>Numer: F118/10/265</small></h1>
            <h2><small>Data wystawienia: 2018-10-15</small></h2>
            <h2><small>Opis księgowania: TA: mail p.Młodziński</small></h2>
            <h2><small>Numer dokumentu zewnętrznego: 2018-10-15</small></h2>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-xs-5\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h4>Sprzedawca: <b>HAWLE</b></h4>
                </div>
                <div class=\"panel-body\">
                    <p>
                        Adres <br>
                        Adres <br>
                        Adres <br>
                    </p>
                </div>
            </div>
        </div>
        <div class=\"col-xs-5 col-xs-offset-2 text-right\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h4>Nabywca : <b>Klient</b></h4>
                </div>
                <div class=\"panel-body\">
                    <p>
                        Adres <br>
                        Adres <br>
                        Adres <br>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- / end client details section -->
    <table class=\"table table-bordered\">
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
                <th class=\"text-center\">
                    <h4>Deklaracja</h4>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>ZS4000200E1XW16</td>
                <td class=\"text-right\">Zasuwa kołnierzowa typu E1</td>
                <td class=\"text-right\">DN200, PN16</td>
                <td class=\"text-right\">4000E1</td>
                <td class=\"text-right\">2</td>
                <td class=\"text-right\">939.02</td>
                <td class=\"text-right\">1 878.04</td>
                <td class=\"text-center\"><a href=\"\">ZOBACZ</a><\/td>
            </tr>
            <tr>
                <td>1</td>
                <td>ZS4000200E1XW16</td>
                <td class=\"text-right\">Zasuwa kołnierzowa typu E1</td>
                <td class=\"text-right\">DN200, PN16</td>
                <td class=\"text-right\">4000E1</td>
                <td class=\"text-right\">2</td>
                <td class=\"text-right\">939.02</td>
                <td class=\"text-right\">1 878.04</td>
                <td class=\"text-center\"><a href=\"\">ZOBACZ</a></td>
            </tr>
            <tr>
                <td>1</td>
                <td>ZS4000200E1XW16</td>
                <td class=\"text-right\">Zasuwa kołnierzowa typu E1</td>
                <td class=\"text-right\">DN200, PN16</td>
                <td class=\"text-right\">4000E1</td>
                <td class=\"text-right\">2</td>
                <td class=\"text-right\">939.02</td>
                <td class=\"text-right\">1 878.04</td>
                <td class=\"text-center\"><a href=\"\">ZOBACZ</a></td>
            </tr>
            <tr>
                <td>1</td>
                <td>ZS4000200E1XW16</td>
                <td class=\"text-right\">Zasuwa kołnierzowa typu E1</td>
                <td class=\"text-right\">DN200, PN16</td>
                <td class=\"text-right\">4000E1</td>
                <td class=\"text-right\">2</td>
                <td class=\"text-right\">939.02</td>
                <td class=\"text-right\">1 878.04</td>
                <td class=\"text-center\"><a href=\"\">ZOBACZ</a></td>
            </tr>
        </tbody>
    </table>
    <div class=\"row text-right\">
        <div class=\"col-xs-2 col-xs-offset-8\">
            <p>
                <strong>
                    Netto : <br>
                    Podatek : <br>
                    Brutto : <br>
                </strong>
            </p>
        </div>
        <div class=\"col-xs-2\">
            <strong>
                1200.00 PLN <br>
                50,23 PLN <br>
                1200.00 PLN <br>
            </strong>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-xs-5\">
            <div class=\"panel panel-info\">
                <div class=\"panel-heading\">
                    <h4>Dane płatności</h4>
                </div>
                <div class=\"panel-body\">
                    <p>Sprzedawca.dane</p>
                    <p>Sprzedawca.dane</p>
                    <p>Numer konta : --------</p>
                    <p>Termin płatności : <strong>2019-01-13</strong></p>
                </div>
            </div>
        </div>
        <div class=\"col-xs-7\">
            <div class=\"span7\">
                <div class=\"panel panel-info\">
                    <div class=\"panel-heading\">
                        <h4>Dane kontaktowe</h4>
                    </div>
                    <div class=\"panel-body\">
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
</div>";



// instantiate and use the dompdf class
$dompdf = new Dompdf();
//$dompdf->load_html_file(__DIR__.'\fak.html');
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("hawle_faktura");
?>