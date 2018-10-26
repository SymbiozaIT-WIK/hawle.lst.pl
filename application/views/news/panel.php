<div class="container">
    
    <div class="row">
        <div class="col-md-12">
           <?php 
            if(isset($editMode) && $editMode==true){
                $data['newsId']=$newsId;
                $data['newsDetails'] = $newsDetails;
                $this->view('news/create',$data);
            }else{
                $this->view('news/create');
            }?>
        </div>
    </div>
    
    <?php if(isset($newsList)): ?>
     <?php $newsList['news']=$newsList; ?>
        <div class="row">
            <div class="col-md-12">
                <?php $this->view('news/list',$newsList); ?>
            </div>
        </div>
    <?php endif;?>


</div>