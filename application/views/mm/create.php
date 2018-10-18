<pre>
    
<?php
print_r($mmDetails);
print_r($_POST);
?>
</pre>
<div class="container">
<h1>Nowe zamówienie : MM</h1>
</div>

    
<div class="container">
   
    <table class="table table-hover table-bordered">

    <tr>
        <td colspan="2">Wystawił:</td>
        <td>Odbiorca:</td>
        <td rowspan="2" class="bg-info text-center text-primary">
            <h1>Zamówienie</h1>
            KodLokalizacjiDocelowej
            <div class="form-group">
              <label for="selMag">Wybierz magazyn:</label>
            <form action="" method="post" id="submitChangeForm">
                <input hidden type="text" value="<?php echo $mmDetails['mmHeader']['tempid'] ?>" name="tempid">
                <select id="selMag" class="submit--this form-control" name="headerMag">
                  <option value="0"></option>
                  <option value="1">SK42</option>
                  <option value="1">SK10</option>
                  <option value="1">Inne</option>
                  <option value="1">Jeszcze inne</option>
                </select>
            </form>
            </div>
        </td>
        <td>Nr zamówienia klienta</td>
        <td colspan="2">
            <form action="" method="post" id="submitChangeForm">
               <input hidden type="text" value="<?php echo $mmDetails['mmHeader']['tempid'] ?>" name="tempid">
                <input type="text" name="customerDocNo" class="submit--this">
            </form>
        </td>
    </tr>
    <tr>
        <td rowspan="2" colspan="2">
            HAWLE <br>
            HAWLE <br>
            HAWLE <br>
            HAWLE <br>
            HAWLE <br>
        </td>
        <td rowspan="2">
            DANE ZAMAWIAJĄCEGO <br>
            DANE ZAMAWIAJĄCEGO <br>
            DANE ZAMAWIAJĄCEGO <br>
            DANE ZAMAWIAJĄCEGO <br>
            DANE ZAMAWIAJĄCEGO <br>
        </td>
        <td>Data przyjęcia</td>
        <td colspan="2">2018-10-16</td>
    </tr>
    <tr>
       <td class="bg-info text-center"><b class="text-primary">Wprowadzone</b></td>
        <td>Uwagi</td>
        <td colspan="2" style="padding:0;margin:0;">
        <form action="" method="post" id="submitChangeForm">
            <input hidden type="text" value="<?php echo $mmDetails['mmHeader']['tempid'] ?>" name="tempid">
            <textarea style="padding:0;margin:0;" name="headerDesc" id="" class="submit--this" cols="30" rows="5"></textarea>
        </form>
        
        </td>
    </tr>
    <tr>
        <th>Lp</th>
        <th>Kod twaru</th>
        <th>Opis</th>
        <th>Cecha</th>
        <th>Ilość</th>
        <th>Magazyn</th>
        <th>Uwagi</th>
    </tr>
    <tr>
        <td>1</td>
        <td>NrZapasu</td>
        <td>Opis</td>
        <td>SA07.6 16 (1/min) IP68 400V</td>
        <td>1000</td>
        <td>KodLokalizacjiPierwotnej</td>
        <td><input type="text"></td>
    </tr>
    <tr>
        <td colspan="7"><button class="btn btn-danger btn-sm">Usuń całe zamówienie</button></td>
    </tr>
    <tr>
        <td colspan="8" class="text-right">
            <button class="btn btn-success btn-lg">Akceptuj</button>
        </td>
    </tr>
    </table>





</div>
    <hr><br>
    <div class="container">
        
    <h1>Dodaj pozycję do zamówienia:</h1>
        <p>Aby ddać towar - wyszukaj go na liście i wpisz ilość.</p>
        
<table id="dataTable" class="table table-striped table-bordered table-hover" style="width:100%">
    <thead>
        <tr>
           <?php if($datatable['settings']['lp']):?>
              <?php $lp=0;?>
               <th>Lp</th>
            <?php endif;?>
            <?php foreach($datatable['headings'] as $th): ?>
            <th><?php echo $th; ?></th>
            <?php endforeach;?>
            <th>Ilość</th>
        </tr>
    </thead>
    <tbody>
       
        <?php foreach($datatable['rows'] as $row): ?>
        <?php $lp++; ?>
        
            <tr>
            
               <?php if($datatable['settings']['lp']):?>
                   <td><?php echo $lp; ?></td>
                <?php endif;?>

                <?php foreach($row as $cell):?>
                <td>
                    <?php echo $cell; ?>
                </td>
                <?php endforeach;?>
                <td>
                    <form action="" method="post" id="submitChangeForm">
                        <input hidden type="text" value="<?php echo $mmDetails['mmHeader']['tempid'] ?>" name="tempid">
                        <input hidden type="text" value="<?php echo $row['itemCode'];?>" name="itemCode">
                        <input hidden type="text" value="<?php echo $row['regionalWarehouseCode'];?>" name="regionalWarehouseCode">
                        <input type="text" class="submit--this" name="quantity">
                    </form>
                </td>
           
            </tr>
        <?php endforeach;?>
        
    </tbody>
    <?php if($datatable['settings']['footerHeading']):?>
    <tfoot>
        <tr>
           <?php if($datatable['settings']['lp']):?>
               <th>Lp</th>
            <?php endif;?>
            <?php foreach($datatable['headings'] as $th): ?>
            <th>
                <?php echo $th; ?>
            </th>
            <?php endforeach;?>
            <th>Ilość</th>
        </tr>
    </tfoot>
    <?php endif;?>
</table>
    
    </div>
    
    
    





<!--
<form action="" method="get" id="submitChangeForm">
  <input type="checkbox" class="submit--this" name="p[]" value="1">
</form>

<form id="zmien">
  <input type="text" class="to" name="Search" value="Search" autocomplete="off" />
  <input type="submit" name="Search" value="Search" />
</form>
-->



