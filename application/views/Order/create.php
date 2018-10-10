<form class="form" method="post">
    <table class="table">
        <tr>
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
                <?php print_r($row['SerialNumber']); ?>
            </td>
            <td>
                <?php print_r($row['Item']); ?>
            </td>
            <td>
                <?php print_r($row['Warehouse']); ?>
            </td>
            <td>
                <?php print_r($row['Quantity']); ?>
            </td>
            <td><input class="input"></td>
            <td><input class="input"></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <button class="button" type="submit">Wyślij zamówienie</button>
</form>
