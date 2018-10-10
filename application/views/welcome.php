<?php if($this->session->userdata('logged')){
    $this->load->view('navLogged');
} else {
    $this->load->view('nav');
}
?>

   <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background:url(http://www.hawle.pl/assets/cache/images/strona_glowna/1920x800-3.ecf.png) center center">
     <div style="background: rgba(50,50,50,0.3);">
      <div class="container" style="background: rgba(250,250,250,0.6);">
        <h1>Sprawdź zapas na magazynie</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quas nesciunt alias rerum, nam dolorum. Voluptatem doloribus, omnis autem. Dolore.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Dowiedz się więcej &raquo;</a></p>
      </div>
     </div>
    </div>

    <div class="container">
      <!-- Kolumny z dodatkowymi funkcjonalnościami albo jakieś info  -->
      <div class="row">
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
        <div class="col-md-4">
          <h2>Jakaś informacja</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">Czytaj całość &raquo;</a></p>
        </div>
    
      </div>

      <hr>