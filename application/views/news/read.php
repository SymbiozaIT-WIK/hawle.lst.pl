<!--<pre>-->
    <?php # print_r($newsDetails); ?>
    <?php #print_r($newsList); ?>
<!--</pre>-->




<div class="container">
    <div class="row"  style="margin:0 0 5em 0;">
        <div class="col-xs-4">
           <p style="padding:2em;">
                Autor: <a href="http://<?php print $newsDetails['authorWebPage'] ?>"><?php print $newsDetails['author'] ?></a> <br>
<!--                Data dodania: <?php# print $newsDetails['dt_add'] ?> <br>-->
           </p>
           <div style="padding:0 2em;">
            <img src="https://zamowienia.hawle.pl/externalFiles/news/<?php print $newsDetails['newsImage'] ?>" class="img-responsive img-thumbnail" alt="">
               
           </div>
        </div>
        <div class="col-xs-8">
            <h1><?php print $newsDetails['title'] ?></h1>
            <h3><?php print $newsDetails['subTitle'] ?></h3>
            <p>
                <?php print $newsDetails['content'] ?>
            </p>
        </div>
    </div>
</div>
<hr/>
<div class="divider" style="width:100%; height:1em; display:block; background: rgba(245,245,245,0.8)"></div>
<?php $data['news']=$newsList?>
<?php $this->load->view('News/list',$data); ?>
