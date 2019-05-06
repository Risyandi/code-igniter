<div class="container shadow-sm p-5 bg-white rounde">
<a href="<?php echo site_url('news/'); ?>"> Back to list news</a>
    <?php
    echo '<h1>'.$news_item['title'].'</h1>';
    echo $news_item['text'];
    ?>
</div>