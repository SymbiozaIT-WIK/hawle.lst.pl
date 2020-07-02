<style>
    .headerTable{
        display: block;
        border:1px solid #444;
        padding-bottom: 20px;
    }
    .table1{
        border:1px solid #000;
        margin:50px 0;
        width:100%;
    }
    .table1 tr th{
        text-align:center;
        font-weight: bold;
        padding:10px 0;
    }
    .table1 th, .table1 td{padding:1em; border:1px solid #444;}
    td{text-align: center; padding:1em}

</style>   
<table class="headerTable">
    <tr>
        <td>
            <h1>Stan na magazynie: </h1>
        </td>
        <td>
            <h1><?php echo $warehouseCode; ?></h1>
            <h3><?php echo $warehouseDesc; ?></h3>
        </td>
    </tr>
    <tr>
        <td>Data wygenerowania dokumentu:</td>
        <td>
            <?php echo date("d/m/Y") ?>
        </td>
    </tr>
</table>

<table class="table1">
    <tr>
        <th>lp</th>
        <th colspan="2">Kod towaru</th>
        <th colspan="3">INDEX</th>
        <th colspan="2">Nr katalogowy</th>
        <th colspan="2">Cecha</th>
        <th colspan="3">Opis</th>
        <th style="white-space: nowrap">Stan</th>
    </tr>
<!--
    <tr>
        <th>wolny</th>
        <th>rzecz.</th>
    </tr>
-->
    <?php $lp=0;?>
    <?php foreach($dataTable['rows'] as $row): ?>
        <tr>
            <td><?php echo $lp+=1; ?></td>
            <td colspan="2"><?php echo $row['itemCode']; ?></td>
            <td colspan="3"><?php echo $row['index']; ?></td>
            <td colspan="2"><?php echo $row['catalogNo']; ?></td>
            <td colspan="2"><?php echo $row['attribute']; ?></td>
            <td colspan="3"><?php echo $row['description']; ?></td>
            <td><?php echo $row['spareStock']; ?></td>
<!--            <td><?php echo $row['realStock']; ?></td>-->
        </tr>

    <?php endforeach; ?>
</table>

