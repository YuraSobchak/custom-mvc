<h2>Все страницы</h2>

<div class="pages-block">
    <?php foreach ($data as $item): ?>
        <div class="news-item" style="border: 1px solid black">
            <div class="title">
                <span><a href="/home<?php echo $item['friendly'] ?>"><?= $item['title']; ?></a></span>
            </div>
        </div>

        <br/>
    <?php endforeach; ?>
</div>
