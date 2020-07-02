<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1>Pliki bazy:</h1>
        </div>
        
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
        
        <div class="col-md-12">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#uploadModal">Dodaj plik</button>

            <div id="uploadModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Dodaj plik z danymi</h4>
                  </div>
                  <div class="modal-body">
                    <!-- Form -->
<!--                    <form method='post' action='Update/doUploadDbFile' enctype="multipart/form-data">-->
                      <?php echo form_open_multipart('Update/doUploadDbFile');?>
                       Wybierz plik z komputera: <input type='file' name='dbfile' id='dbfile' class='form-control' ><br>
                        <button type='submit' class='btn btn-info'>Wyślij</button>
                    </form>
                  </div>

                </div>

              </div>
            </div>
       
        </div>
    </div>
</div>


<?php $lp=0;?>
<div class="container">
    <table id="dataTable" class="table table-striped table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Lp</th>
                <th>Plik</th>
                <th>Data utworzenia</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($fileList as $file): ?>
            <?php $finfo = pathinfo(site_url($file)); ?>
            <tr>
                <td>
                    <?php echo $lp+=1; ?>
                </td>
                <td>
                    <?php echo $finfo['basename']; ?>
                </td>
                <td>
                    <?php echo date("Y/n/j", filectime($file)).'<br />'.date("H:i:s", filectime($file)); ?>
                </td>
                <td>
                   <form action="updateDbFromFile" method="post">
                      <input type="text" hidden value="<?php echo $finfo['basename']; ?>" name="filename" id="filename">
                       <select id="tablename" name="tablename" class="form-control">
                          <option>Wybierz tabelę w bazie</option>
                          <option value="item">item</option>
                          <option value="inventory">inventory</option>
                          <option value="order_header">order_header</option>
                          <option value="order_lines">order_lines</option>
                          <option value="user">user</option>
                          <option value="regional_warehouse">regional_warehouse</option>
                          <option value="invoice_header">invoice_header</option>
                          <option value="invoice_lines">invoice_lines</option>
                        </select>
                       <button class="btn btn-success btn-block" type="submit">Aktualizuj bazę</button>
                   </form>
                    
                </td>
                <td>
                    <form action="" method="get">
                        <input hidden type="text" name="filename" value="<?php echo $finfo['basename']; ?>">
                        <button type="submit" class="btn btn-sm btn-warning">Pobierz</button>
                    </form>
                </td>
                <td>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteConfirm<?php echo $lp; ?>">Usuń</button>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteConfirm<?php echo $lp; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Potwierź usunięcie</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Czy usunąć plik: <?php echo $finfo['basename']; ?> ?
                              </div>
                              <div class="modal-footer">
                               <form action="" method="get">
                                    <input hidden type="text" name="filename" value="<?php echo $finfo['basename']; ?>">
                                    <input hidden type="text" name="del" value="yes">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                </td>
            </tr>
            <?php endforeach;?>

        </tbody>
    </table>
</div>


