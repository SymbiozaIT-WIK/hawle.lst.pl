<pre>
    <?php print_r($newsDetails); ?>
    <?php print_r($newsList); ?>
</pre>


<?php $data['news']=$newsList?>
<?php $this->load->view('news/list',$data); ?>
