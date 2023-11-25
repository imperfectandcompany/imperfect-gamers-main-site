<?php foreach ($staffApplications as $thread): ?>
    <a href="applications/thread/<?= htmlspecialchars($thread['tid']); ?>" class='thread-item'>
        <div class='thread-details'>
            Replies:
            <?= $thread['post_count'] - 1; ?> |
            Views:
            <?= $thread['views']; ?>
        </div>
        <div class='thread-title'>
            <?= htmlspecialchars($thread['subject']); ?>
        </div>
    </a>
<?php endforeach; ?>