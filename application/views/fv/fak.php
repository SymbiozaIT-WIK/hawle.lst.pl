<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="<?php echo base_url();?>/assets/img/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap.min.css">

    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }

    </style>
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/main.css">

    <script src="<?php echo base_url();?>/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }

        * {
            font-family: Verdana, Arial, sans-serif;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table,
        td,
        th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            font-size: x-small;
            border-collapse: collapse;
            width: 100%;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        th,
        td {
            padding: 15px;
        }

        .invoice table {
            margin: 15px;
        }

        .invoice h3 {
            margin-left: 15px;
        }

        .information {
            color: #000000;
        }

        .information .logo {
            margin: 5px;
        }

        .information table {
            padding: 10px;
        }

    </style>

</head>

<body>
    <div class="information">
        <table width="100%">
            <tr>
                <td align="left" style="width: 40%;">
                    <h3>Fabryka Armatury<br />
                        Hawle Spółka z o.o. <br />
                        <small>
                            ul. Piaskowa 9 <br />
                            62-028 Koziegłowy, <br />
                            Polska<br />
                        </small>
                    </h3>
                </td>

                <td align="left">
                    <img src="../../../assets/img/logo.png" alt="Logo" width="64" class="logo" />
                </td>
                <td align="right" style="width: 40%;">
                    <h3>Nazwa Klienta<br />
                        Druga Linia nazwy klienta <br />
                        <small>
                            ulica <br />
                            kod + miasto, <br />
                            Kraj<br />
                        </small>
                    </h3>
            </tr>

        </table>
    </div>


    <br />

    <div class="invoice">
        <table width="100%">
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
                <tr>
                    <td>1</td>
                    <td>yyyyyy</td>
                    <td>xxxxx</td>
                    <td>90 stopni</td>
                    <td>abc</td>
                    <td>1</td>
                    <td>15,00 PLN</td>
                    <td>18,45 PLN</td>
                    <td align="left">Deklaracja</td>
                </tr>
                
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="1"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="left">Total</td>
                    <td align="left" class="gray">15,00 PLN</td>
                    <td align="left" class="gray">18,45 PLN</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="information" style="position: absolute; bottom: 0;">
        <table width="100%">
            <tr>
                <td align="left" style="width: 50%;">
                    &copy; Wzór fatury przygotowany przez firmę LST-NET.
                </td>
            </tr>

        </table>
    </div>
</body>

</html
