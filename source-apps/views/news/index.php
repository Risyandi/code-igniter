<div class="container shadow-sm bg-white rounded">
    <h2><?php echo $title; ?></h2>
    <?php foreach ($news as $news_item): ?>
        <div class="card mb-3">
            <div class="card-header">
            <?php echo $news_item['title']; ?>
            </div>
            <div class="main p-3">
                <h1><?php echo $news_item['title']; ?></h1>
                <p><?php echo $news_item['text']; ?></p>
                <a href="<?php echo site_url('news/'.$news_item['slug']); ?>">
                    <button class="btn btn-primary">Read Articles</button>
                </a>
                <a href="<?php echo site_url('news/delete/'.$news_item['id']); ?>">
                    <button class="btn btn-danger">Delete Articles</button>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>