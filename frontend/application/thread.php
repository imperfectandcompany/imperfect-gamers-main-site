<div class="thread-details">

    <div class="posts">
        <?php foreach ($parsedPosts as $parsedPost): ?>
            <div class='post'>
                <h2><?= $parsedPost['username']; ?></h2>
                <div class='post-content'>
                    <?= $parsedPost['message']; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>