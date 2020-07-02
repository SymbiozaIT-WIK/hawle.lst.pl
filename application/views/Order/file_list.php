<div class="container">
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>
</div>


<?php $lp=0;?>
<div class="container">
    <table id="dataTable" class="table table-striped table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Lp</th>
                <th>PLik</th>
                <th>Data utworzenia</th>
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
                    <form action="" method="get">
                        <input hidden type="text" name="filename" value="<?php echo $finfo['basename']; ?>">
                        <button type="submit" class="btn btn-warning">Pobierz</button>
                    </form>
                </td>
                <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirm<?php echo $lp; ?>">Usuń</button>
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


