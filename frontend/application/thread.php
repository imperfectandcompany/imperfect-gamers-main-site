<div class="py-1 px-2 sm:px-4">
    <div class="flex flex-col space-y-8">
    <?php 
        $isFirstPost = true;
        foreach ($parsedPosts as $parsedPost): 
            $postClass = $isFirstPost ? 'thread-post' : 'reply-post';
            $isFirstPost = false; // Set to false after the first iteration
        ?>        
            <div class='card justify-between rounded-lg bg-red-900/10 border-red-600/50 text-white
            post-content
            '>
                <div class='whitespace-normal text-xs sm:text-sm md:text-md antialiased break-all md:break-words sm:subpixel-antialiased md:antialiased'>
                    <?php if($postClass == 'thread-post'): ?>
                        <span class="text-white/50">Thread by:</span>
                        <h2 class="mb-2 text-md"><?= $parsedPost['username']; ?></h2>
                    <?php else: ?>
                        <span class="text-white/50">Reply by:</span>
                        <h3 class="mb-2 text-md"><?= $parsedPost['username']; ?></h3>                        
                        <?php endif; ?>
                        <?= $parsedPost['message']; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>