<div class="container">
    <?php $i=0;?>
    <?php foreach($news as $newsBox):?>
    <?php $i++; ?>
        <div class="blog-card <?php if($i%2==0){echo 'alt';}; ?>">
            <div class="meta">
                <div class="photo" style="background-image: url(<?php echo site_url('externalFiles/news/'.$newsBox['newsImage']);?>)"></div>
                <ul class="details">
                    <li class="author"><a href="http://<?php echo $newsBox['authorWebPage']; ?>"><?php echo $newsBox['author']; ?></a></li>
<!--                    <li class="date"><#?php echo $newsBox['dt_add']; ?></li>-->
                </ul>
            </div>
            <div class="description">
                <h1><?php echo $newsBox['title']; ?></h1>
                <h2><?php echo $newsBox['subTitle']; ?></h2>
                <p><?php echo $newsBox['shortContent']; ?></p>
            <?php $usertype = $this->session->userdata('usertype');?>
             <?php if(isset($usertype) && $usertype=='A'): ?>
                    <p class="news--controls">
                        <button data-toggle="modal" data-target="#hideQuestion" class="btn btn-primary btn-sm link--bright">Nie wyświetlaj</button>
                        <a href="<?php echo site_url('news/panel/'.$newsBox['id']); ?>" class="btn btn-warning btn-sm link--bright">Edytuj</a>
                        <button data-toggle="modal" data-target="#deleteQuestion" class="btn btn-danger btn-sm link--bright">Usuń</button>
                    </p>
                    <!-- czy usunąć wpis? -->
                    <div class="modal fade" id="deleteQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Czy usunąć wiadomość ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p> Czy chcesz całkowicie usunąć wpis ? </p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                            <a href="<?php echo site_url('news/delete/'.$newsBox['id']); ?>" type="button" class="btn btn-danger">USUŃ!</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="hideQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Czy ukryć wiadomość ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <h3>Moduł w przygotowaniu...</h3>
                            <p>
                                Wiadomość nie będzie wyświetlana na stronie. <br>
                                Będzie można ją edytować, lub opublikować w późniejszym czasie.
                            </p>
                              <h3>Moduł w przygotowaniu...</h3>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                            <a href="" type="button" class="btn btn-warning">Nie wyświetlaj!</a>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php endif; ?>
                
                <?php if($newsBox['readMore']=='y'): ?>
                <p class="read-more">
                    <a href="<?php echo site_url('news/read/'.$newsBox['id']); ?>">Czytaj więcej</a>
                </p>
                <?php endif; ?>
            </div>
        </div>
     <?php endforeach;?>
</div>