<div class="container">
<?php if($this->session->flashdata('alert')):?>
   <?php $msg=$this->session->flashdata('alert'); ?>
    <div class="container">
        <div class="alert alert-<?php echo $msg['color']; ?>" role="alert">
      <h4 class="alert-heading"><?php echo $msg['title']; ?></h4>
      <p><?php echo $msg['content']; ?></p>
    </div>
    </div>
    <?php $this->session->set_flashdata('alert',false); ?>
<?php endif; ?>
   <form action="<?php echo site_url('inventory/search') ?>" class="form-horizontal" method="post">
    <fieldset>
    <legend>Wyszukaj towar w magazynie</legend>
    <div class="form-group">
      <label class="col-md-4 control-label" for="ItemCatalogNumber">Numer katalogowy</label>  
      <div class="col-md-4">
      <input id="ItemCatalogNumber" name="ItemCatalogNumber" type="text" placeholder="numer katalogowy" class="form-control input-md">
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label" for="ItemCode">Kod towaru</label>  
      <div class="col-md-4">
      <input id="ItemCode" name="ItemCode" type="text" placeholder="kod towaru" class="form-control input-md">
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label" for="ItemName">Nazwa</label>  
      <div class="col-md-4">
      <input id="ItemName" name="ItemName" type="text" placeholder="nazwa" class="form-control input-md">
      </div>
    </div>
        <div class="form-group">
      <label class="col-md-4 control-label" for="ItemName"></label>  
      <div class="col-md-4">
              <button id="submit" name="search" value="true" type="submit" class="btn btn-primary btn-block">Szukaj</button>
      </div>
    </div>
    </fieldset>
</form>
<form action="<?php echo site_url('inventory/dynamic_table') ?>" class="form-horizontal" method="post">
    <fieldset>
    <legend class="text-center">lub</legend>
        <div class="form-group">
      <label class="col-md-4 control-label" for="ItemName"></label>  
      <div class="col-md-4">
              <button id="submit" type="submit" class="btn btn-info btn-block">Pobierz wszystko</button>
      </div>
    </div>
    </fieldset>
</form>
</div>