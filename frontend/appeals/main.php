<div class="space-y-4">
    <?php foreach ($banAppeals as $thread): ?>
        <?php $slug = createSlugFromTitle($thread['subject']); ?>
        <a href="appeals/thread/<?= htmlspecialchars($thread['tid']) . '/' . htmlspecialchars($slug) . ''; ?>"
            class="block bg-opacity-50 hover:opacity-50 bg-red-900/10 p-4 rounded-md shadow hover:shadow-lg transition-all bg-red-900/10 card border-red-600 text-white rounded hover:bg-red-600">
            <div class="md:flex justify-between items-center text-white ">
                <div>
                    <div>
                        <span class="text-xs text-gray-400">
                            <?= zdateRelative($thread['dateline']);?>
                        </span>
                        
                    </div>
                    <div>
                        <span class="font-semibold">
                            <?= htmlspecialchars($thread['subject']); ?>
                        </span>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400">
                            <?= htmlspecialchars($thread['username']); ?>
                        </span>
                    </div>
                </div>
                <div class="flex items-center justify-around space-x-3">
                    <div class="flex items-center text-red-500">
                        <i class="fas fa-comment mr-2"></i>
                        <span class="text-white py-1 px-3 rounded-full">
                            <?= $thread['post_count'] - 1; ?>
                        </span>
                    </div>
                    <div class="flex items-center text-red-500">
                        <i class="fas fa-eye mr-2"></i>
                        <span class="text-white py-1 px-3 rounded-full">
                            <?= $thread['views']; ?>
                        </span>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>