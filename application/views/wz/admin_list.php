



<div class="container">   

<h1>WZki do zatwierdzenia</h1>
<p>
    Zaznacz dokumenty do zatwierdzenia.
</p>
<form action="">
    
    <table id="dataTable" class="table table-striped table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
               <?php if($settings['lp']):?>
                  <?php $lp=0;?>
                   <th>Lp</th>
                <?php endif;?>
                <?php foreach($headings as $th): ?>
                <th><?php echo $th; ?></th>
                <?php endforeach;?>
                <th style="width:178px; max-width: 178px;">
<!--                    <button class="btn btn-primary" name="wzno" value="">Zatwierdź zaznaczone</button>-->
                </th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($rows as $row): ?>
            <?php $lp++; ?>
            <tr>
               <?php if($settings['lp']):?>
                   <td><?php echo $lp; ?></td>
                <?php endif;?>

                <?php foreach($row as $cell):?>
                <td>
                    <?php echo $cell; ?>
                </td>
                <?php endforeach;?>
                <td>
                  <input hidden id="cb" type="checkbox" name="wz" /> 
                  <label for="cb" class="btn btn-success" rel="tooltip" title="Kliknij aby zaznaczyć" > 
                    Zaznacz
                  </label>
                    <a href="" class="btn btn-default">Podgląd</a>
                </td>
            </tr>
            <?php endforeach;?>

        </tbody>
        <?php if($settings['footerHeading']):?>
        <tfoot>
            <tr>
               <?php if($settings['lp']):?>
                   <th>Lp</th>
                <?php endif;?>
                <?php foreach($headings as $th): ?>
                <th>
                    <?php echo $th; ?>
                </th>
                <?php endforeach;?>
            </tr>
        </tfoot>
        <?php endif;?>
    </table>

</form>

</div>