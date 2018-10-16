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
        <p style="color:#000;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, et, vero. Voluptate quo placeat delectus earum, nesciunt temporibus sit itaque.</p>
        <p><a class="btn btn-primary btn-lg" href="<?php echo site_url('inventory') ?>" role="button">Sprawdź stany magazynowe &raquo;</a></p>
      </div>
     </div>
    </div>

    <div class="container">
      <!-- Kolumny z dodatkowymi funkcjonalnościami albo jakieś info  -->
      <div class="row">
        <div class="col-md-4">
          <h2>Jakaś informacja</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="<?php echo site_url('Order') ?>" role="button">Zamówienie &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Jakaś informacja</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">Czytaj całość &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Jakaś informacja</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">Czytaj całość &raquo;</a></p>
        </div>
    
      </div>

      <hr>
      
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  KOMPONENTY
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lista komponentów</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
            <li class="list-group-item">
                <h2>Magazyn</h2>
            </li>
            <li class="list-group-item"><a href="<?php echo site_url('inventory'); ?>">Przeglądaj</a></li>
            <li class="list-group-item">
                <h2>Zamówienia</h2>
            </li>
            <li class="list-group-item"><a href="<?php echo site_url('order'); ?>">Dodaj</a></li>
            <li class="list-group-item">
                <h2>Faktury</h2>
            </li>
            <li class="list-group-item"><a href="<?php echo site_url('fv/fv_list'); ?>">Lista</a></li>
            <li class="list-group-item"><a href="<?php echo site_url('fv/fv_details/fvNo'); ?>">Szczegóły</a></li>
            <li class="list-group-item">
                <h2>WZ</h2>
            </li>
            <li class="list-group-item"><a href="<?php echo site_url('wz/wz_list'); ?>">Lista</a></li>
            <li class="list-group-item"><a href="<?php echo site_url('wz/wz_details'); ?>">Szczegóły</a></li>
            <li class="list-group-item"><a href="<?php echo site_url('wz/wz_edit'); ?>">Edycja</a></li>
            <li class="list-group-item">
                <h2>MM</h2>
            </li>
            <li class="list-group-item"><a href="<?php echo site_url('mm/mm_list'); ?>">Lista</a></li>
            <li class="list-group-item"><a href="<?php echo site_url('mm/mm_list'); ?>">Szczegóły</a></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
      </div>
    </div>
  </div>
</div>