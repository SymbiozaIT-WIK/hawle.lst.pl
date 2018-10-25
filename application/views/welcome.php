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
    <div class="jumbotron" style="background:url(http://www.hawle.pl/assets/cache/images/strona_glowna/1920x800-3.ecf.png) center center">
     <div style="background: rgba(50,50,50,0.3);">
      <div class="container" style="background: rgba(61,206,229,0.6); color:#444;">
        <h1>Sprawdź zapas na magazynie</h1>
        <p><a class="btn btn-primary btn-lg" href="<?php echo site_url('inventory') ?>" role="button">Sprawdź stany magazynowe &raquo;</a></p>
      </div>
     </div>
    </div>
    
        
    <?php if(isset($news)): ?>
        <?php $this->load->view('news/list',$news); ?>
    <?php endif; ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   
