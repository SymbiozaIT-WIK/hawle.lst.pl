<div class="container">
    <?php $i=0;?>
    <?php foreach($news as $newsBox):?>
    <?php $i++; ?>
        <div class="blog-card <?php if($i%2==0){echo 'alt';}; ?>">
            <div class="meta">
                <div class="photo" style="background-image: url(<?php echo site_url('externalFiles/news/'.$newsBox['newsImage']);?>)"></div>
                <ul class="details">
                    <li class="author"><a href="<?php echo $newsBox['authorWebPage']; ?>"><?php echo $newsBox['author']; ?></a></li>
                    <li class="date"><?php echo $newsBox['dt_add']; ?></li>
                </ul>
            </div>
            <div class="description">
                <h1><?php echo $newsBox['title']; ?></h1>
                <h2><?php echo $newsBox['subTitle']; ?></h2>
                <p><?php echo $newsBox['shortContent']; ?> [...]</p>
                <?php if($newsBox['readMore']=='y'): ?>
                <p class="read-more">
                    <a href="<?php echo site_url('news/read/'.$newsBox['id']); ?>">Czytaj więcej</a>
                </p>
                <?php endif; ?>
            </div>
        </div>
     <?php endforeach;?>
</div>


<!--<pre>-->
    
    <?php #print_r($news); ?>
    
<!--</pre>-->