
<div class="container">   

<h1>Wydania do zatwierdzenia</h1>
<?php if($this->session->flashdata('alert')):?>
   <?php $msg=$this->session->flashdata('alert'); ?>
    <div class="container">
        <div class="alert alert-<?php echo $msg['color']; ?>" role="alert">
      <h4 class="alert-heading"><?php echo $msg['title']; ?></h4>
      <p><?php echo $msg['content']; ?></p>
    </div>
    </div>
    <?php else: ?>
        <p>Zaznacz dokumenty do zatwierdzenia.</p>
<?php endif; ?>
<form action="<?php echo site_url('wz/wz_confirm'); ?>" method="post">

    <table id="dataTable" class="table table-bordered" style="width:100%">
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
                    <button class="btn btn-primary">Zatwierdź zaznaczone</button>
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
                  <input hidden id="cb<?php echo $row['tempid']; ?>" class="checkbox-selectible" type="checkbox" name="wz[]" value="<?php echo $row['tempid']; ?>" /> 
                  <label for="cb<?php echo $row['tempid']; ?>" class="btn btn-success" rel="tooltip" title="Kliknij aby zaznaczyć" > 
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