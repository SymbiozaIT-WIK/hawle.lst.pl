<form class="form" method="post" action="<?php echo site_url('Order/confirm_order')?>">
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
               <input name="<?php print($lp); ?>[id]" type="number" readonly value="<?php print($lp); ?>">
           </td>
            <td>
                <input name="<?php print($lp); ?>[serial]" type="text" readonly value="<?php print_r($row['serial']); ?>">
            </td>
            <td>
                <input name="<?php print($lp); ?>[item]" type="text" readonly value="<?php print_r($row['item']); ?>">
            </td>
            <td>
                <input name="<?php print($lp); ?>[warehouse]" type="text" readonly value="<?php print_r($row['warehouse']); ?>">
            </td>
            <td>
                <input name="<?php print($lp); ?>[quantity]" type="text" readonly value="<?php print_r($row['quantity']); ?>">
            </td>
            <td>
                <input name="<?php print($lp); ?>[quantity]" type="text" readonly value="<?php print_r($row['orderedQuantity']); ?>">
            </td>
            <td>
                <input name="<?php print($lp); ?>[quantity]" type="text" readonly value="<?php print_r($row['comments']); ?>">
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <button class="button" type="submit">Zatwierdź</button>
</form>

