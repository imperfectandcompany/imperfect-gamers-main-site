<section class="banner-area mx-auto">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="flex flex-col mt-20 fullscreen justify-content-center align-items-center">
            <div class="mb-4 flex">
                <?php
                /*Call our notification handling*/include("../frontend/sitenotif.php");
                ?>
            </div>
            <div class="forum-container animate__animated animate__fadeIn animate__delay-0s text-white relative">
            <h2 class="text-lg font-semibold text-gray-700 capitalize text-white">
                Ban Appeals
                            </h2>
                            <div class="profile-header">
                            </div>
                <div class="banner-content text-center">
<?php foreach ($staffApplications as $thread): ?>
    <a href="thread-link.php?tid=<?= htmlspecialchars($thread['tid']); ?>" class='thread-item'>
        <div class='thread-title'>
            <?= htmlspecialchars($thread['subject']); ?>
        </div>
        <div class='thread-details'>
            Posts: <?= $thread['post_count']; ?> |
            Views: <?= $thread['views']; ?>
        </div>
    </a>
<?php endforeach; ?>
                </div>
                <!-- Pagination -->
                <div class="pagination">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <div class="page-item  <?= $i == $page ? 'active' : '' ?>">
                        <a class="page-link<?= $page == $i ? ' active' : '' ?>" href="?page=<?= $i; ?>">
                            <?= $i; ?>
                        </a>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <div class="banner-content text-center mb-12">
                <a href="<?php echo $backUrl ?>"
                    class="flex space-x-4 mt-12 banner-btn text-white font-bold text-lg items-center animate__animated animate__fadeInUp">
                    <span class="material-icons">arrow_back_ios_new</span>
                    Go back
                </a>
            </div>
        </div>
    </div>
</section>