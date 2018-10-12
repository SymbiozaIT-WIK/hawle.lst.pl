<?php if(!empty($items)): ?>
<style>
    .input-2{
        max-width:4em;
        margin:0;
        padding:0;
        text-align: center;
    }
</style>
<div class="container">
    <?php 
    $sum = 0; 
    foreach($items as $arr)
    {
        $sum = $sum + $arr['orderedQuantity'];
    }
    ?>
    <h1>Podsumowanie</h1>
    <form class="form" method="post" action="<?php echo site_url('Order/confirm_order')?>">
        <table class="table table-striped table-bordered table-hover" style="width:100%">
            <tr>
                <th>L.P.</th>
                <th>Kod towaru</th>
                <th>Nr katalogowy</th>
                <th>Cecha</th>
                <th>Opis</th>
                <th>Magazyn</th>
                <th>Ilość zamówiona</th>
                <th>Uwagi</th>
            </tr>
            <?php $lp = 0; ?>
            <?php foreach($items as $row): ?>
            <tr>
                <?php $lp += 1; ?>
                <td>
                    <input class="form-control input-2" name="<?php print($lp); ?>[id]" type="number" readonly value="<?php print($lp); ?>">
                </td>
                <td>
                    <input class="form-control input-md" name="<?php print($lp); ?>[code]" type="text" readonly value="<?php print_r($row['code']); ?>">
                </td>
                <td>
                    <input class="form-control input-md" name="<?php print($lp); ?>[catalogNo]" type="text" readonly value="<?php print_r($row['catalogNo']); ?>">
                </td>
                <td>
                    <input class="form-control input-md" name="<?php print($lp); ?>[attribute]" type="text" readonly value="<?php print_r($row['attribute']); ?>">
                </td>
                <td>
                    <input class="form-control input-md" name="<?php print($lp); ?>[item]" type="text" readonly value="<?php print_r($row['item']); ?>">
                </td>
                <td>
                    <input class="form-control input-md" name="<?php print($lp); ?>[warehouse]" type="text" readonly value="<?php print_r($row['warehouse']); ?>">
                </td>
                <td>
                    <input class="form-control input-md" name="<?php print($lp); ?>[orderedQuantity]" type="text" readonly value="<?php print_r($row['orderedQuantity']); ?>">
                </td>
                <td>
                    <input class="form-control input-md" name="<?php print($lp); ?>[comments]" type="text" readonly value="<?php print_r($row['comments']); ?>">
                </td>
            </tr>
            <?php endforeach; ?>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <input class="form-control input-md" type="text" readonly value="<?php echo $sum; ?>">
                    </td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        <button class="button" type="submit">Zatwierdź</button>
    </form>
    <?php else: ?>
    <h3>Nic nie wybrałeś</h3>
    <form metho type="submit" action="<?php echo site_url('Order/Create')?>">
        <button>Powrót do edycji zamówienia</button>
    </form>
    <?php endif; ?>
</div>
<hr>
