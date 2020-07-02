<div class="container">
    
    <div class="row">
        <div class="col-md-12">
           <?php 
            if(isset($editMode) && $editMode==true){
                $data['newsId']=$newsId;
                $data['newsDetails'] = $newsDetails;
                $this->view('News/create',$data);
            }else{
                $this->view('News/create');
            }?>
        </div>
    </div>
    
    <?php if(isset($newsNotPublishedList)): ?>
     <?php $newsNotPublishedList['news']=$newsNotPublishedList; ?>
        <div class="row">
            <div class="col-md-12">
                <?php $this->view('News/list',$newsNotPublishedList); ?>
            </div>
        </div>
    <?php endif;?>
    
    
    <?php if(isset($newsList)): ?>
    <h2>Lista wiadomości ze strony:</h2>
     <?php $newsList['news']=$newsList; ?>
        <div class="row">
            <div class="col-md-12">
                <?php $this->view('News/list',$newsList); ?>
            </div>
        </div>
    <?php endif;?>


</div>