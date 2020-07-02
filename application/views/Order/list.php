<div class="container">   
<h1>Podgląd zamówień</h1>
<hr><br/>
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
          <a href="<?php echo site_url('order/order_list/list/1'); ?>" class="btn btn-sq-lg btn-success btn-block">
            <i class="fas fa-user-check fa-2x"></i><br />
            Wprowadzane</a> 
       </div>
       <div class="col-md-2">
           <a href="<?php echo site_url('order/order_list/list/2'); ?>" class="btn btn-sq-lg btn-primary btn-block">
            <i class="fas fa-id-badge fa-2x"></i><br />
            Wysłane do akceptacji</a>
       </div>
       <div class="col-md-2">
           <a href="<?php echo site_url('order/order_list/list/3'); ?>" class="btn btn-sq-lg btn-info btn-block">
            <i class="fas fa-user-edit fa-2x"></i><br />
            Zatwierdzone</a>
       </div>
       <div class="col-md-3">
           <a href="<?php echo site_url('order/order_list/list/4'); ?>" class="btn btn-sq-lg btn-warning btn-block">
            <i class="fas fa-cloud-download-alt fa-2x"></i><br />
            Pobrane z systemu</a>
       </div>
   </div>
    
<?php if(isset($settings)):?>   
    
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
            <th></th>
            <th></th>
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
                <a href="<?php echo site_url('order/order_details/'.$row['tempid']); ?>" class="btn btn-primary btn-sm">
                Szczegóły</a>
            </td>
            <td>
                <button <?php if(isset($filterStatusId) && $filterStatusId>1){echo 'disabled';}?> type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteQuestion<?php echo $row['tempid'];?>">
                      Usuń
                </button>
            </td>
        </tr>
        
        <!-- czy usunąć zamówienie? -->
        <div class="modal fade" id="deleteQuestion<?php echo $row['tempid'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Czy usunąć zamówienie ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>
                    Czy chcesz całkowicie usunąć wybrane zamówienie ?
                </p>
                <p>
                    (Numer tymczasowy: <?php echo $row['tempid'];?>)
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                <a href="<?php echo site_url('order/order_delete/'.$row['tempid']); ?>" type="button" class="btn btn-danger">USUŃ!</a>
              </div>
            </div>
          </div>
        </div>
       
       
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
    
<?php endif;?>
    
</div> 


