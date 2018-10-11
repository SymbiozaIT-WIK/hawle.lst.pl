<?php
////////////////////////////////////////////////////////////////////////////////////////
////  DataTable Generator script                                                    ////
////  author:     Krzysztof Krzepicki <krzysztof.krzepicki@lst.pl>                  ////
////  date:       10.10.2018                                                        ////
////  License:    unlicensed                                                        ////
////                                                                                ////
////  DESCRIPTION:                                                                  ////
////  Script generate dynamic dataTable from data stored in associative array.      ////
////  Array must have keys:                                                         ////
////      $headings => array of table headings,                            ////
////      $rows     => array of data rows (the same qty as 'headings'),    ////
////      $settings['lp']                                                  ////
////          => TRUE/FALSE -for display numeric line counter                       ////
////      $settings['footerHeading']                                       ////
////          => TRUE/FALSE -for display numeric line counter in the bottom of table////
////////////////////////////////////////////////////////////////////////////////////////
?>
<div class="container">   
<table id="dataTable" class="table table-striped table-bordered table-hover" style="width:100%">
    <thead>
        <tr>
           <?php if($settings['lp']):?>
              <?php $lp=0;?>
               <th>Lp</th>
            <?php endif;?>
            <?php foreach($headings as $th): ?>
            <th><?php echo $th; ?></th>
            <?php endforeach;?>
        </tr>
    </thead>
    <tbody>
       
        <?php foreach($rows as $row): ?>
        <?php $lp++; ?>
        <tr>
           <?php if($settings['lp']):?>
               <td><?php echo $lp; ?></td>
            <?php endif;?>
            
            <?php foreach($row as $cell):?>
            <td>
                <?php echo $cell; ?>
            </td>
            <?php endforeach;?>
        </tr>
        <?php endforeach;?>
        
    </tbody>
    <?php if($settings['footerHeading']):?>
    <tfoot>
        <tr>
           <?php if($settings['lp']):?>
               <th>Lp</th>
            <?php endif;?>
            <?php foreach($headings as $th): ?>
            <th>
                <?php echo $th; ?>
            </th>
            <?php endforeach;?>
        </tr>
    </tfoot>
    <?php endif;?>
</table>
</div>