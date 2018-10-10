    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Nawigacja</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>">
              <img src="<?php echo base_url();?>/assets/img/logo.png" height="50" class="d-inline-block align-top" alt="">
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form action="<?php echo site_url('logout') ?>" class="navbar-form navbar-right" role="form" method="post">
            <button type="submit" class="btn btn-info">Wyloguj</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>