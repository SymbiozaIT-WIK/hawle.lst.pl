<div class="container">
    <h1>Nowe zamówienie</h1>
</div>
<div class="container">

    <table class="table table-hover table-bordered">

        <tr>
            <td colspan="2" style="vertical-align:middle; font-weight:bold;">Wystawił:</td>
            <td style="vertical-align:middle; font-weight:bold;">Odbiorca:</td>
            <td>Nr zamówienia klienta</td>
            <td colspan="2">
                <form action="" method="post" id="submitChangeForm">
                    <input hidden type="text" value="<?php echo $zsDetails['orderHeader']['tempid'] ?>" name="tempid">
                    <input type="text" name="customerDocNo" class="submit--this" value="<?php echo $zsDetails['orderHeader']['CUSTOMERDOCNO']; ?>">
                </form>
            </td>
        </tr>
        <tr>
            <td rowspan="2" colspan="2">
                <h4>Fabryka Armatury <br>Hawle Spółka z o.o.</h4>
                <p>
                    ul. Piaskowa 9 <br>
                    62-028 Koziegłowy,<br>
                    Polska
                </p>
            </td>
            <td rowspan="2">
                <h4>
                    <?php echo $this->session->userdata('name'); ?>
                </h4>
                <?php if($this->session->userdata('name2')) echo $this->session->userdata('name2').'<br>'; ?>
                <?php if($this->session->userdata('email')) echo $this->session->userdata('email').'<br>'; ?>
                <?php if($this->session->userdata('city')) echo $this->session->userdata('city').'<br>'; ?>
                Numer klienta:
                <?php echo $this->session->userdata('login'); ?>
            </td>
            <td>Data przyjęcia</td>
            <td colspan="2">2018-10-16</td>
        </tr>
        <tr>
            <td class="bg-info text-center"><b class="text-primary">Wprowadzone</b></td>
            <td>Uwagi</td>
            <td colspan="2" style="padding:0;margin:0;">
                <form action="" method="post" id="submitChangeForm">
                    <input hidden type="text" value="<?php echo $zsDetails['orderHeader']['tempid'] ?>" name="tempid">
                    <textarea style="padding:0;margin:0;" name="headerDesc" id="" class="submit--this" cols="30" rows="5">
                <?php echo $zsDetails['orderHeader']['DESCRIPTION']; ?>
            </textarea>
                </form>

            </td>
        </tr>
        <tr>
            <th>Lp</th>
            <th>Kod twaru</th>
            <th>Opis</th>
            <th>Cecha</th>
            <th>Ilość</th>
            <th>Magazyn</th>
            <th>Uwagi</th>
        </tr>
        <?php $lp=0;?>

        <?php foreach($zsDetails['orderLines'] as $line): ?>
        <?php $lp++; ?>
        <tr>
            <td>
                <?php echo $lp ?>
            </td>
            <td>
                <?php echo $line['ITEMCODE']; ?>
            </td>
            <td>
                <?php echo $line['DESCRIPTION']; ?>
            </td>
            <td>
                <?php echo $line['DESCRIPTION']; ?>
            </td>
            <td>
                <?php echo $line['QUANTITY']; ?>
            </td>
            <td>
                <?php echo $line['REGIONALWAREHOUSECODE']; ?>
            </td>
            <!--            <td><?php #echo $line['DESCRIPTION']; ?></td>-->
            <td>

                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteQuestion<?php echo $line['LINENO']; ?>">
                    Usuń
                </button>

            </td>
        </tr>

        <!-- czy usunąć linię zamówienia? -->
        <div class="modal fade" id="deleteQuestion<?php echo $line['LINENO']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Czy usunąć pozycję ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>
                            Kod towaru:
                            <?php echo $line['ITEMCODE']; ?>
                        </h4>
                        <h4>
                            Ilość:
                            <?php echo $line['QUANTITY']; ?>
                        </h4>
                    </div>
                    <div class="modal-footer">

                        <form action="" method="post">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                            <input hidden type="text" name="dellineno" value="<?php echo $line['LINENO'];?>">
                            <input hidden type="text" value="<?php echo $zsDetails['orderHeader']['tempid'] ?>" name="tempid">
                            <input hidden type="text" name="deleteline" value="true">
                            <button type="submit" class="btn btn-danger">USUŃ!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach;?>
        <tr>
            <td colspan="7">
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteQuestion">
                    Usuń całe zamówienie
                </button>
            </td>
        </tr>
        <tr>
            <td colspan="8" class="text-right">
                <a href="<?php echo site_url('order/order_confirm/'.$zsDetails['orderHeader']['tempid']); ?>" class="btn btn-success btn-lg">Akceptuj</a>
            </td>
        </tr>
    </table>

</div>
<hr><br>
<div class="container">
        
        <div class="container">
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
              
            <form action="" class="form-horizontal" method="post">
                <fieldset>
                <input hidden type="text" value="<?php echo $zsDetails['orderHeader']['tempid'] ?>" name="tempid">
                <legend>Wyszukaj towar w magazynie</legend>
                <div class="form-group">
                  <label class="col-md-4 control-label" for="ItemCatalogNumber">Numer katalogowy</label>  
                  <div class="col-md-4">
                  <input id="ItemCatalogNumber" name="SearchItemCatalogNumber" type="text" placeholder="numer katalogowy" class="form-control input-md">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label" for="ItemCode">Kod towaru</label>  
                  <div class="col-md-4">
                  <input id="ItemCode" name="SearchItemCode" type="text" placeholder="kod towaru" class="form-control input-md">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label" for="Warehouse">Magazyn</label>  
                  <div class="col-md-4">
                  <input id="Warehouse" name="SearchWarehouse" type="text" placeholder="nazwa" class="form-control input-md">
                  </div>
                </div>
                    <div class="form-group">
                  <label class="col-md-4 control-label" for="Warehouse"></label>  
                  <div class="col-md-4">
                          <button id="submit" name="search" value="true" type="submit" class="btn btn-primary btn-block">Szukaj</button>
                  </div>
                </div>
                </fieldset>
            </form>
            <form action="" class="form-horizontal" method="post">
                <fieldset>
                <input hidden type="text" value="<?php echo $zsDetails['orderHeader']['tempid'] ?>" name="tempid">
                <legend class="text-center">lub</legend>
                    <div class="form-group">
                  <label class="col-md-4 control-label" for="Warehouse"></label>  
                  <div class="col-md-4">
                          <button id="submit" type="submit" class="btn btn-info btn-block">Pobierz wszystko</button>
                  </div>
                </div>
                </fieldset>
            </form>
            </div>
            
            <?php if(isset($datatable)):?>
            <table id="dataTable" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                       <?php if($datatable['settings']['lp']):?>
                          <?php $lp=0;?>
                           <th>Lp</th>
                        <?php endif;?>
                        <?php foreach($datatable['headings'] as $th): ?>
                        <th><?php echo $th; ?></th>
                        <?php endforeach;?>
                        <th>Ilość</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($datatable['rows'] as $row): ?>
                    <?php $lp++; ?>

                        <tr>

                           <?php if($datatable['settings']['lp']):?>
                               <td><?php echo $lp; ?></td>
                            <?php endif;?>

                            <?php foreach($row as $cell):?>
                            <td>
                                <?php echo $cell; ?>
                            </td>
                            <?php endforeach;?>
                            <td>
                                <form action="" method="post" id="submitChangeForm">
                                    <input hidden type="text" value="<?php echo $zsDetails['orderHeader']['tempid'] ?>" name="tempid">
                                    <input hidden type="text" value="<?php echo $row['itemCode'];?>" name="itemCode">
                                    <input hidden type="text" value="<?php echo $row['description'];?>" name="lineDescription">
                                    <input hidden type="text" value="<?php echo $row['regionalWarehouseCode'];?>" name="regionalWarehouseCode">
                                    <input type="text" class="submit--this" name="quantity">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    
                    </tbody>
                <?php if($datatable['settings']['footerHeading']):?>
                <tfoot>
                    <tr>
                       <?php if($datatable['settings']['lp']):?>
                           <th>Lp</th>
                        <?php endif;?>
                        <?php foreach($datatable['headings'] as $th): ?>
                        <th>
                            <?php echo $th; ?>
                        </th>
                        <?php endforeach;?>
                        <th>Ilość</th>
                    </tr>
                </tfoot>
                <?php endif;?>
            </table>
        
        <?php endif; ?>        
        
    </div>


<!-- czy usunąć zamówienie? -->
<div class="modal fade" id="deleteQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Czy usunąć zamówienie ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Czy chcesz całkowicie usunąć aktualne zamówienie ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                <a href="<?php echo site_url('order/order_delete/'.$zsDetails['orderHeader']['tempid']); ?>" type="button" class="btn btn-danger">USUŃ!</a>
            </div>
        </div>
    </div>
</div>
