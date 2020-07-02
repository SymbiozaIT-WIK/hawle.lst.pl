
<div class="container">
<h1>Nowe zamówienie</h1>
</div>
<style>
    #dataTable_wrapper{
        margin-top:2em;
        border: 1px solid #ddd;
        box-shadow: 2px 2px 10px #ddd;
        padding:1em;
        background: #fafaff
    }
    #dataTable_filter{
/*        border:1px solid #444;*/
    }
    #dataTable_filter label{
        width:100%;
        padding:1em;
    }
    #dataTable_filter input{
        width:100%;
        background: #fdd6ba;
    }
</style>
    
<div class="container">
   
    <table class="table table-hover table-bordered">

    <tr>
        <td colspan="2" style="vertical-align:middle; font-weight:bold;">Wystawił:</td>
        <td style="vertical-align:middle; font-weight:bold;">Odbiorca:</td>
        <td rowspan="2" class="bg-info text-center text-primary">
            <h1>Zamówienie</h1>
            Kod lokalizacji docelowej
            <div class="form-group">
              <label for="selMag" class="text-danger" style="font-size: 1.3em;"><strong>*Wybierz magazyn:</strong></label>
            <form action="" method="post" id="submitChangeForm">
                <input hidden type="text" value="<?php echo $mmDetails['mmHeader']['tempid'] ?>" name="tempid">
                <select id="selMag" class="submit--this form-control" name="headerMag" required>
                  <option value="<?php echo $mmDetails['mmHeader']['TOMAG']; ?>"><?php echo $mmDetails['mmHeader']['tomagname'];?></option>
                      <?php foreach($availableWarehouses as $warehouse): ?>
                       <option value="<?php echo $warehouse['code']; ?>"><?php echo $warehouse['description']; ?></option>
                    <?php endforeach;?>
                </select>
            </form>
            </div>
        </td>
        <td>Nr zamówienia klienta</td>
        <td colspan="2">
            <form action="" method="post" id="submitChangeForm">
               <input hidden type="text" value="<?php echo $mmDetails['mmHeader']['tempid'] ?>" name="tempid">
                <input disabled type="text" name="customerDocNo" class="submit--this" value="<?php echo $mmDetails['mmHeader']['CUSTOMERDOCNO']; ?>">
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
           <h4><?php echo $this->session->userdata('name'); ?></h4>
            <?php if($this->session->userdata('name2')) echo $this->session->userdata('name2').'<br>'; ?>
            <?php if($this->session->userdata('email')) echo $this->session->userdata('email').'<br>'; ?>
            <?php if($this->session->userdata('city')) echo $this->session->userdata('city').'<br>'; ?>
            Numer klienta: <?php echo $this->session->userdata('login'); ?>
        </td>
        <td>Data przyjęcia</td>
        <td colspan="2">2018-10-16</td>
    </tr>
    <tr>
       <td class="bg-info text-center"><b class="text-primary"><?php echo $mmDetails['mmHeader']['statusname'] ?></b></td>
        <td>Uwagi</td>
        <td colspan="2" style="padding:0;margin:0;">
        <form action="" method="post" id="submitChangeForm">
            <input hidden type="text" value="<?php echo $mmDetails['mmHeader']['tempid'] ?>" name="tempid">
            <textarea disabled style="padding:0;margin:0;" name="headerDesc" id="" class="submit--this" cols="30" rows="5"><?php echo rtrim(ltrim($mmDetails['mmHeader']['DESCRIPTION'])); ?></textarea>
        </form>
        
        </td>
    </tr>
    </table>
</div>

