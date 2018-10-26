<style>
.form-inline .form-group { margin-right:10px; }
.well-primary {
color: rgb(255, 255, 255);
background-color: rgb(66, 139, 202);
/*border-color: rgb(53, 126, 189);*/
}
.glyphicon { margin-right:5px; }
</style>
   
    <?php if($this->session->flashdata('alert')):?>
    <?php $msg=$this->session->flashdata('alert'); ?>
     <div class="container">
         <div class="alert alert-<?php echo $msg['color']; ?>" role="alert">
       <h4 class="alert-heading"><?php echo $msg['title']; ?></h4>
       <p><?php echo $msg['content']; ?></p>
     </div>
     </div>
     <?php $this->session->set_flashdata('alert',false); ?>
    <?php endif;?>

<?php if(isset($newsDetails) && isset($editMode) && $editMode==true): ?>


<!--Formularz edycji wpisu -->
<!--Formularz edycji wpisu -->
<!--Formularz edycji wpisu -->
    <div class="container">
        <div class="row" style="margin:20px 0;">
            <div class="col-md-12">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <i class="far fa-newspaper fa-2x"> Edycja wiadomości</i>
                               </a>
                            </h1>
                        </div>
                        <form enctype="multipart/form-data" action="<?php echo site_url('news/create'); ?>" method="post">
                        <input hidden value="<?php echo $newsDetails['id']; ?>" type="text" name="newsId" />
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8" style="border-right:1px solid #444; height:100%;">
                                        <div class="form-group">
                                            <input value="<?php echo $newsDetails['title']; ?>" type="text" class="form-control" placeholder="Tytuł" name="title" required />
                                        </div>
                                        <div class="form-group">
                                            <input value="<?php echo $newsDetails['subTitle']; ?>" type="text" class="form-control" name="subTitle" placeholder="Podtytuł"/>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="content" placeholder="Treść..." rows="5" required><?php echo $newsDetails['content']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="field" align="left">
                                            <h3>Zmień obrazek wyróżniający</h3>
                                            <input type="file" id="files" name="img" class="btn btn-block btn-primary" />
                                            <h3>Aktualnie wybrany: </h3>
                                            <?php $newsImage=$newsDetails['newsImage'];?>
                                            <img src="<?php echo site_url('externalFiles/news/'.$newsImage); ?>" alt="" class="img-thumbnail img-responsive">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-12">
                                       <h3>
                                           <i class="fas fa-cogs"> Ustawienia</i>
                                       </h3>
                                   </div>
                                    <div class="col-md-6">
                                        <div class="well well-sm">
                                            <div class="input-group">
                                                <span class="input-group-addon" style="min-width:15em;">Autor: </span>
                                                <input type="text" class="form-control" name="author" value="<?php echo $newsDetails['author']; ?>" required />
                                            </div>
                                        </div>
                                        <div class="well well-sm">
                                            <div class="input-group">
                                                <span class="input-group-addon" style="min-width:15em;">Strona autora: </span>
                                                <input type="text" class="form-control" name="authorWebPage" value="<?php echo $newsDetails['authorWebPage']; ?>" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="well well-sm">
                                            <div class="input-group">
                                                <span class="input-group-addon" style="min-width:14em;">Pokaż: Czytaj więcej</span>
                                                <select class="form-control" name="readMore">
                                                   <?php if($newsDetails['readMore']=='y'): ?>
                                                        <option value="y">Tak</option>
                                                        <option value="n">Nie</option>
                                                   <?php else: ?>
                                                        <option value="n">Nie</option>
                                                        <option value="y">Tak</option>
                                                   <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="well well-sm well-primary">
                                            <div class="form form-inline">
                                            <div class="form-group">
                                               <?php $currDate=date("Y/m/d"); ?>
                                                <input disabled type="text" class="form-control" style="min-width:12em;" value="" placeholder="<?php echo $currDate; ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <select name="visible" class="form-control">
                                                   <?php if($newsDetails['visible']=='y'): ?>
                                                        <option value="y">Opublikuj</option>
                                                        <option value="n">Opublikuj później</option>
                                                   <?php else: ?>
                                                        <option value="n">Opublikuj później</option>
                                                        <option value="y">Opublikuj</option>
                                                   <?php endif;?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="far fa-save fa-2x"> Zapisz</i></button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
<!--Formularz nowego wpisu -->
<!--Formularz nowego wpisu -->
<!--Formularz nowego wpisu -->
    <div class="container">
        <div class="row" style="margin:20px 0;">
            <div class="col-md-12">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <i class="far fa-newspaper fa-2x"> Dodaj nową wiadomość na stronie głównej</i>
                               </a>
                            </h1>
                        </div>
                        <form enctype="multipart/form-data" action="<?php echo site_url('news/create'); ?>" method="post">
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8" style="border-right:1px solid #444; height:100%;">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Tytuł" name="title" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="subTitle" placeholder="Podtytuł"/>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="content" placeholder="Treść..." rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="field" align="left">
                                            <h3>Dodaj obrazek wyróżniający</h3>
                                            <input type="file" id="files" name="img" class="btn btn-block btn-primary" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-12">
                                       <h3>
                                           <i class="fas fa-cogs"> Ustawienia</i>
                                       </h3>
                                   </div>
                                    <div class="col-md-6">
                                        <div class="well well-sm">
                                            <div class="input-group">
                                                <span class="input-group-addon" style="min-width:15em;">Autor: </span>
                                                <input type="text" class="form-control" name="author" value="HAWLE" required />
                                            </div>
                                        </div>
                                        <div class="well well-sm">
                                            <div class="input-group">
                                                <span class="input-group-addon" style="min-width:15em;">Strona autora: </span>
                                                <input type="text" class="form-control" name="authorWebPage" value="www.hawle.pl" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="well well-sm">
                                            <div class="input-group">
                                                <span class="input-group-addon" style="min-width:14em;">Pokaż: Czytaj więcej</span>
                                                <select class="form-control" name="readMore">
                                                    <option value="y">Tak</option>
                                                    <option value="n">Nie</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="well well-sm well-primary">
                                            <div class="form form-inline">
                                            <div class="form-group">
                                               <?php $currDate=date("Y/m/d"); ?>
                                                <input disabled type="text" class="form-control" style="min-width:12em;" value="" placeholder="<?php echo $currDate; ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <select name="visible" class="form-control">
                                                    <option value="y">Opublikuj</option>
                                                    <option value="n">Opublikuj później</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="far fa-save fa-2x"> Zapisz</i></button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>