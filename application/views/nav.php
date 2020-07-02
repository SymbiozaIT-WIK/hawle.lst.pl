    <nav class="navbar navbar-default navbar-fixed-top" style="padding: px 0;" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Nawigacja</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>">
              <img src="<?php echo base_url();?>/assets/img/logo.png" height="33" class="d-inline-block align-top" alt="Logo Hawle">
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form action="<?php echo site_url('login') ?>" class="navbar-form navbar-right" role="form" method="post">
            <div class="form-group">
                 <a class="btn btn-primary form-control" href="<?php echo site_url('') ?>">
                    <i class="fas fa-home"></i>
                    </a>
                </div>
            <div class="form-group">
              <input type="text" name="login" placeholder="Login" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Hasło" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary" name="startLogin" value="true">Zaloguj się</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>