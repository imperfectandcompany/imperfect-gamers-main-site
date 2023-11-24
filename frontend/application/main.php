<div class="profile-header">
</div>
    <?php foreach ($staffApplications as $thread): ?>
        <a href="applications/thread/<?= htmlspecialchars($thread['tid']); ?>" class='thread-item'>
            <div class='thread-title'>
                <?= htmlspecialchars($thread['subject']); ?>
            </div>
            <div class='thread-details'>
                Replies:
                <?= $thread['post_count']-1; ?> |
                Views:
                <?= $thread['views']; ?>
            </div>
        </a>
    <?php endforeach; ?>
</div>
