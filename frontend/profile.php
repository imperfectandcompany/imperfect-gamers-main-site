<section class="mx-auto">
    <div class="container">
        <div class="flex flex-col fullscreen justify-content-center align-items-center">
            <div class="animate__animated animate__fadeIn animate__delay-0s text-white relative">
                <!-- Conditional content rendering -->
                <?php if (isset($GLOBALS['url_loc'][3]) && $GLOBALS['url_loc'][3] === 'threads'): ?>
                    <!-- Threads Section -->
                    <?php if (isset($threads) && !empty($threads)): ?>
                        <div class="threads-container">
                            <h2 class="text-lg font-semibold text-gray-700 capitalize text-white">
                                <?php echo ($profileExists ? $ownsProfile ? 'Your threads' : $GLOBALS['url_loc'][2] . "'s threads" : "") ?>
                            </h2>
                            <div class="profile-header">
                            </div>
                            <?php foreach ($threads as $thread): ?>
                                <div class="thread-item">
                                    <a href="thread-link.php?tid=<?= htmlspecialchars($thread['tid']); ?>" class="thread-title">
                                        <?= htmlspecialchars($thread['subject']); ?>
                                    </a>
                                    <div class="thread-details">
                                        <span class="thread-date">
                                            <?= date('Y-m-d', $thread['dateline']); ?>
                                        </span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="no-content">No threads to display.</p>
                    <?php endif; ?>
                <?php elseif (isset($GLOBALS['url_loc'][3]) && $GLOBALS['url_loc'][3] === 'posts'): ?>
                    <h2 class="text-lg font-semibold text-gray-700 capitalize text-white">
                        <?php echo ($profileExists ? $ownsProfile ? 'Your posts' : $GLOBALS['url_loc'][2] . "'s posts" : "") ?>
                    </h2>
                    <div class="container">
                        <div class="section-header">
                        </div>
                        <!-- Posts Section -->
                        <?php if (isset($posts) && !empty($posts)): ?>
                            <div class="posts-container">
                                <?php foreach ($posts as $post): ?>
                                    <div class="post-item">
                                        <p class="post-content">
                                            <?= stripQuotesAndContents(htmlspecialchars($post['message'])); ?>
                                        </p>
                                        <div class="post-details">
                                            <span class="post-date">
                                                <?= date('Y-m-d', $post['dateline']); ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p class="no-content">No posts to display.</p>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($GLOBALS['url_loc'][3]) && ($GLOBALS['url_loc'][3] === 'posts' || $GLOBALS['url_loc'][3] === 'threads')): ?>
                        <!-- Pagination Controls -->
                        <nav aria-label="Forum Page navigation">
                            <ul class="pagination  justify-center">
                                <?php if ($page > 1): ?>
                                    <li class="page-item"><a class="page-link"
                                            href="<?= $GLOBALS['config']['url'] . '/profile/' . $GLOBALS['url_loc'][2] . '/' . $GLOBALS['url_loc'][3] . '/' . 1 ?>">First</a>
                                    </li>
                                    <li class="page-item"><a class="page-link"
                                            href="<?= $GLOBALS['config']['url'] . '/profile/' . $GLOBALS['url_loc'][2] . '/' . $GLOBALS['url_loc'][3] . '/' . ($page - 1) ?>">Previous</a>
                                    </li>
                                <?php endif; ?>

                                <?php for ($i = $pagination['start']; $i <= $pagination['end']; $i++): ?>
                                    <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                        <a class="page-link"
                                            href="<?= $GLOBALS['config']['url'] . '/profile/' . $GLOBALS['url_loc'][2] . '/' . $GLOBALS['url_loc'][3] . '/' . $i ?>">
                                            <?= $i ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>

                                <?php if ($page < $totalPages): ?>
                                    <li class="page-item"><a class="page-link"
                                            href="<?= $GLOBALS['config']['url'] . '/profile/' . $GLOBALS['url_loc'][2] . '/' . $GLOBALS['url_loc'][3] . '/' . ($page + 1) ?>">Next</a>
                                    </li>
                                    <li class="page-item"><a class="page-link"
                                            href="<?= $GLOBALS['config']['url'] . '/profile/' . $GLOBALS['url_loc'][2] . '/' . $GLOBALS['url_loc'][3] . '/' . $totalPages ?>">Last</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>

                <?php else: ?>
                    <?php if ($profileExists): ?>
                        <div class="container">
                            <!-- Profile Header -->
                            <div class="section-header">
                                <h2 class="text-lg font-semibold text-gray-700 capitalize text-white">
                                    <?php echo ($profileExists ? $ownsProfile ? 'Your profile' : "Profile" : '') ?>
                                </h2>
                                <div class="profile-header-content">
                                    <div class="text-content">
                                        <p class="main-username highlighted-username"
                                            style="font-size: 0.9em; margin-top: 5px;">
                                            <?= htmlspecialchars($mainUsername); ?>
                                        </p>
                                        <?php if (!empty($additionalUsernames)): ?>
                                            <p class="additional-usernames" style="font-size: 0.9em; margin-top: 5px;">
                                                Also known as:
                                                <?= implode(', ', $additionalUsernames); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="profile-avatar">
                                        <img src="<?= htmlspecialchars($userProfile['avatar'] ? $GLOBALS['config']['avatar_url'] . '/' . $userProfile['avatar'] : $GLOBALS['config']['avatar_url'] . '/' . $GLOBALS['config']['default_avatar']); ?>"
                                            class="avatar-image" alt="Profile Avatar">
                                    </div>
                                </div>
                            </div>

                            <!-- Associated Emails Section -->
                            <?php if ($ownsProfile): ?>
                                <div class="profile-section associated-emails">
                                    <label>Your associated emails:</label>
                                    <?php if (empty($userProfile['steam_id'])): ?>
                                        <p>Please link your Steam account to see more details.</p>
                                    <? else: ?>
                                        <ul>
                                            <?php foreach ($associatedEmails as $email): ?>
                                                <li>
                                                    <?= htmlspecialchars($email); ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <small class="explanation">
                                            *Emails are gathered from various parts of our services where you may have used different
                                            emails.
                                        </small>
                                    <? endif; ?>

                                </div>
                            <?php endif; ?>

                            <?php if ((empty($userProfile['steam_id']) && $ownsProfile) || (!empty($userProfile['steam_id']))): ?>
                                <!-- Titles Section -->
                                <div class="profile-section">
                                    <label>
                                        <?php echo ($ownsProfile ? 'Your titles' : 'Titles') ?>:
                                    </label>
                                    <?php if (empty($userProfile['steam_id'])): ?>
                                        <p>Please link your Steam account to see more details.</p>
                                    <? else: ?>
                                        <ul>
                                            <?php foreach ($processedTitles as $processedTitle): ?>
                                                <?php if (!empty($processedTitle)): // Check if the title is not empty ?>
                                                    <li>
                                                        <?= $processedTitle; ?>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    <? endif; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ((empty($userProfile['steam_id']) && $ownsProfile) || (!empty($userProfile['steam_id']))): ?>
                                <!-- Role Section -->
                                <div class="profile-section user-role">
                                    <label>
                                        <?php echo ($ownsProfile ? 'Your roles' : 'Roles') ?>:
                                    </label>
                                    <?php if (empty($userProfile['steam_id'])): ?>
                                        <p>Please link your Steam account to see more details.</p>
                                    <? else: ?>
                                        <div>
                                            <?php
                                            if (!empty($userRoles)) {
                                                echo '<ul>';
                                                foreach ($userRoles as $role) {
                                                    echo '<li>' . htmlspecialchars($role) . '</li>';
                                                }
                                                echo '</ul>';
                                            } else {
                                                echo '<p>No roles listed.</p>';
                                            }
                                            ?>
                                        </div>
                                    <? endif; ?>
                                </div>
                            <? endif; ?>

                            <?php if ((empty($userProfile['steam_id']) && $ownsProfile) || (!empty($userProfile['steam_id']))): ?>
                                <!-- Packages Section -->
                                <div class="profile-section permanent-packages">
                                    <label>
                                        <?php echo ($ownsProfile ? 'Your permanent packages' : 'Permanent packages') ?>:
                                    </label>
                                    <?php if (empty($userProfile['steam_id'])): ?>
                                        <p>Please link your Steam account to see more details.</p>
                                    <? else: ?>
                                        <ul>
                                            <?php foreach ($permanentPackages as $packageTitle): ?>
                                                <li>
                                                    <?= htmlspecialchars($packageTitle); ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <? endif; ?>
                                </div>
                            <?php endif; ?>


                            <?php if ((empty($userProfile['steam_id']) && $ownsProfile) || (!empty($userProfile['steam_id']))): ?>
                                <!-- Forum Section -->
                                <div class="profile-section forum-activity">
                                    <label>
                                        <?php echo ($ownsProfile ? 'Your social activity' : 'Social Activity') ?>:
                                    </label>
                                    <?php if (empty($userProfile['steam_id'])): ?>
                                        <p>Please link your Steam account to see more details.</p>
                                    <? else: ?>
                                        <?php if (!empty($forumAccountsInfo)): ?>
                                            <ul>
                                                <?php foreach ($forumAccountsInfo as $account): ?>
                                                    <li>
                                                        <strong>Posts:</strong>
                                                        <?= htmlspecialchars($account['postnum']); ?><br>
                                                        <strong>Threads:</strong>
                                                        <?= htmlspecialchars($account['threadnum']); ?><br>
                                                        <strong>Recent Activity:</strong>
                                                        <ul>
                                                            <?php foreach (array_slice($account['posts'], 0, 5) as $post): ?>
                                                                <li>
                                                                    <?php
                                                                    // Strip all BBCode from the post content
                                                                    $postContent = stripQuotesAndContents($post['message']);
                                                                    // Truncate the post content to a reasonable length
                                                                    $postSnippet = htmlspecialchars($postContent);
                                                                    ?>
                                                                    <?= $postSnippet; ?>
                                                                    <em>in</em>
                                                                    <a href="thread-link.php?tid=<?= htmlspecialchars($post['tid']); ?>">
                                                                        <?= htmlspecialchars(trim(preg_replace("/^RE:\s*/i", "", $post['subject']))); ?>
                                                                    </a>
                                                                    -
                                                                    <?= date('Y-m-d', $post['dateline']); ?>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                        <a href="<?= htmlspecialchars($GLOBALS['config']['url']) . '/profile/' . $GLOBALS['url_loc'][2] . '/posts' ?>"
                                                            class="view-all">View All Posts</a>
                                                        <a href="<?= htmlspecialchars($GLOBALS['config']['url']) . '/profile/' . $GLOBALS['url_loc'][2] . '/threads' ?>"
                                                            class="view-all">View All Threads</a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php else: ?>
                                            <p>No forum activity found.</p>
                                        <?php endif; ?>
                                    <? endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>



            <div class="banner-content text-center">
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