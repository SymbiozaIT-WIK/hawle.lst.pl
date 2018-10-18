<style>
    .input-2{
        max-width:4em;
        margin:0;
        padding:0;
        text-align: center;
    }
</style>
<div class="container">
   <div>
   <h1>Stwórz Zamówienie</h1>
   </div>
    <div class="col-md-12">
        <form class="form" method="post" action="<?php echo site_url('zs/show_order_summary')?>">
            <table class="table table-striped table-bordered table-hover" style="width:100%">
                <tr>
                    <th>L.P.</th>
                    <th>Kod towaru</th>
                    <th>Nr katalogowy</th>
                    <th>Cecha</th>
                    <th>Opis</th>
                    <th>Magazyn</th>
                    <th>Zapas</th>
                    <th>Ilość</th>
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
                        <input class="form-control input-md" name="<?php print($lp); ?>[item]" type="text" readonly value="<?php print_r($row['Item']); ?>">
                    </td>
                    <td>
                        <input class="form-control input-md" name="<?php print($lp); ?>[warehouse]" type="text" readonly value="<?php print_r($row['Warehouse']); ?>">
                    </td>
                    <td>
                        <input class="form-control input-md" name="<?php print($lp); ?>[quantity]" type="text" readonly value="<?php print_r($row['Quantity']); ?>">
                    </td>
                    <td><input class="form-control input-md" name="<?php print($lp); ?>[orderedQuantity]" class="input"></td>
                    <td><input class="form-control input-md" name="<?php print($lp); ?>[comments]" class="input"></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <button class="button" type="submit">Wyślij zamówienie</button>
        </form>
    </div>
</div>
<hr>
