<section class="banner-area mx-auto">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="flex flex-col fullscreen justify-content-center align-items-center">
            <a href="<?php echo $GLOBALS['config']['url'] ?>" class="cursor-pointer">
                <div class="mx-auto text-center animate__animated animate__fadeIn animate__delay-1s">
                    <object class="pointer-events-none	" data="https://cdn.imperfectgamers.org/inc/assets/svg/text.svg"
                        height="30px"></object>
                </div>
            </a>
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
                    <?php foreach ($banAppealsThreads as $thread): ?>
                        <a href="thread-link.php?tid=<?= htmlspecialchars($thread['tid']); ?>" class='thread-item'>
                            <div class='thread-title'>
                                <?= htmlspecialchars($thread['subject']); ?>
                            </div>
                            <div class='thread-details'>
                                Replies:
                                <?= $thread['post_count']; ?> |
                                Views:
                                <?= $thread['views']; ?>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
<!-- Pagination -->
<nav aria-label="Forum Page navigation">
    <ul class="pagination justify-center">
        <!-- First Page Link -->
        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=1">First</a>
        </li>

        <!-- Previous Page Link -->
        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= max($page - 1, 1) ?>">Previous</a>
        </li>

        <!-- Page Number Links -->
        <?php for ($i = max($page - 2, 1); $i <= min($page + 2, $totalPages); $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
            </li>
        <?php endfor; ?>

        <!-- Next Page Link -->
        <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= min($page + 1, $totalPages) ?>">Next</a>
        </li>

        <!-- Last Page Link -->
        <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $totalPages ?>">Last</a>
        </li>
    </ul>
</nav>

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