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
        <?php foreach($items as $row): ?>
        <tr>
           <td>
               <input name="id" type="number" readonly value="1">
           </td>
            <td>
                <input name="serial" type="text" readonly value="<?php print_r($row['SerialNumber']); ?>">
            </td>
            <td>
                <input name="item" type="text" readonly value="<?php print_r($row['Item']); ?>">
            </td>
            <td>
                <input name="warehouse" type="text" readonly value="<?php print_r($row['Warehouse']); ?>">
            </td>
            <td>
                <input name="quantity" type="text" readonly value="<?php print_r($row['Quantity']); ?>">
            </td>
            <td><input name = "orderedQuantity" class="input"></td>
            <td><input name = "comments" class="input"></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <button class="button" type="submit">Wyślij zamówienie</button>
</form>
