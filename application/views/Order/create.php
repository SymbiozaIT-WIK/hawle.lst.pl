<div class="container">
    <form class="form" method="post" action="<?php echo site_url('Order/show_order_summary')?>">
        <table class="table">
            <tr>
                <th>L.P.</th>
                <th>Numer Seryjny</th>
                <th>Produkt</th>
                <th>Magazyn</th>
                <th>Ilość dostępna</th>
                <th>Zamów</th>
                <th>Komentarz</th>
            </tr>
            <?php $lp = 0; ?>
            <?php foreach($items as $row): ?>
            <tr>
                <?php $lp += 1; ?>
                <td>
                    <input name="id<?php print($lp); ?>" type="number" readonly value="<?php print($lp); ?>">
                </td>
                <td>
                    <input name="serial<?php print($lp); ?>" type="text" readonly value="<?php print_r($row['SerialNumber']); ?>">
                </td>
                <td>
                    <input name="item<?php print($lp); ?>" type="text" readonly value="<?php print_r($row['Item']); ?>">
                </td>
                <td>
                    <input name="warehouse<?php print($lp); ?>" type="text" readonly value="<?php print_r($row['Warehouse']); ?>">
                </td>
                <td>
                    <input name="quantity<?php print($lp); ?>" type="text" readonly value="<?php print_r($row['Quantity']); ?>">
                </td>
                <td><input name="orderedQuantity<?php print($lp); ?>" class="input"></td>
                <td><input name="comments<?php print($lp); ?>" class="input"></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <button class="button" type="submit">Wyślij zamówienie</button>
    </form>
</div>
