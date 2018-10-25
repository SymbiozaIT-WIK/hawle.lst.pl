
<div class="container">   

<h1>Podgląd zgłoszeń</h1>
<?php if($this->session->flashdata('alert')):?>
   <?php $msg=$this->session->flashdata('alert'); ?>
    <div class="container">
        <div class="alert alert-<?php echo $msg['color']; ?>" role="alert">
      <h4 class="alert-heading"><?php echo $msg['title']; ?></h4>
      <p><?php echo $msg['content']; ?></p>
    </div>
    </div>
<?php endif; ?>
   
   <div class="row">
       <div class="col-md-2 col-md-offset-1">
          <a href="<?php echo site_url('order/order_list/list/3'); ?>" class="btn btn-sq-lg btn-success btn-block">
            <i class="fas fa-user-check fa-2x"></i><br />
            Zatwierdzone</a> 
       </div>
       <div class="col-md-2">
           <a href="<?php echo site_url('order/order_list/list/2'); ?>" class="btn btn-sq-lg btn-primary btn-block">
            <i class="fas fa-id-badge fa-2x"></i><br />
            Do zatwierdzenia</a>
       </div>
       <div class="col-md-2">
           <a href="<?php echo site_url('order/order_list/list/1'); ?>" class="btn btn-sq-lg btn-info btn-block">
            <i class="fas fa-user-edit fa-2x"></i><br />
            Wprowadzone</a>
       </div>
       <div class="col-md-3">
           <a href="<?php echo site_url('order/order_list/list'); ?>" class="btn btn-sq-lg btn-warning btn-block">
            <i class="fas fa-cloud-download-alt fa-2x"></i><br />
            Pokaż wszystkie zamówienia</a>
       </div>
   </div>
<?php if(isset($settings)):?>
<form action="<?php echo site_url('order/order_export'); ?>" method="post">

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
                <th>
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
                    <a href="<?php echo site_url('order/order_details/'.$row['tempid']); ?>" class="btn btn-info">Podgląd</a>
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
<?php endif;?>

</div>