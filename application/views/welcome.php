<style>
#headerMain
{
  background-image: url(https://zamowienia.hawle.pl/assets/img/1920x800-1.ecf.png);
  background-position: center top;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
    min-height: 45vh;
}
</style>
<?php

if($this->session->flashdata('alert')):?>
   <?php $msg=$this->session->flashdata('alert'); ?>
    <div class="container">
        <div class="alert alert-<?php echo $msg['color']; ?>" role="alert">
      <h4 class="alert-heading"><?php echo $msg['title']; ?></h4>
      <p><?php echo $msg['content']; ?></p>
    </div>
    </div>
<?php endif; ?>

   <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" id="headerMain">
     <div style="background: rgba(50,50,50,0.3);">
      <div class="container" style="background: rgba(61,206,229,0.6); color:#444;">
        <h1 style="color: #ffffff">Sprawdź zapas na magazynie</h1>
        <p><a class="btn btn-primary btn-lg" href="<?php echo site_url('inventory') ?>" role="button">Sprawdź stany magazynowe &raquo;</a></p>
      </div>
     </div>
    </div>

    <?php if(isset($newsList)): ?>
       <?php $newsList['news']=$newsList; ?>
        <?php $this->load->view('News/list',$newsList); ?>
    <?php endif; ?>