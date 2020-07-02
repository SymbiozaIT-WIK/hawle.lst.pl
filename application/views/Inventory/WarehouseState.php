<div class="container">
    <div class="row" style="margin:2em 0;">
        <div class="col-md-8">
            <h1>Stan magazynu: <?php echo $warehouseCode; ?></h1>
            <h2>
                <?php echo $warehouseDesc; ?>
            </h2>
        </div>
        <div class="col-md-4">
           <form action="<?php echo site_url('inventory/print_warehouse_state'); ?>" method="post">
               <input type="text" hidden name="warehouseCode" value="<?php echo $warehouseCode;;;;; ?>">
                <button type="submit" href="" class="btn btn-primary btn-sm" style="padding:1em;">
                <i class="material-icons">print</i><br>
                Drukuj listę</button>
           </form>
        </div>
    </div>
</div>
<?php $this->view('dataTable',$dataTable); ?>