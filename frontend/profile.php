<section class="banner-area mx-auto">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="flex flex-col mt-20 fullscreen justify-content-center align-items-center">

            <div class="mb-4 flex">
                <?php
                /*Call our notification handling*/include("../frontend/sitenotif.php");
                ?>
            </div>
            <div class="animate__animated animate__fadeIn animate__delay-0s text-white relative">

                <!-- Conditional content rendering -->
                <?php if (isset($GLOBALS['url_loc'][3]) && $GLOBALS['url_loc'][3] === 'threads'): ?>
                    <!-- Threads Section -->
                    <?php if (isset($threads) && !empty($threads)): ?>
                        <div class="threads-container">
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
                    <?php endif; ?>

                <?php else: ?>
                    <h2 class="text-lg font-semibold text-gray-700 capitalize text-white">
                        <?php echo ($profileExists ? $ownsProfile ? 'Your profile' : $GLOBALS['url_loc'][2] : '') ?>
                    </h2>
                    <div class="profile-container <?php echo ($profileExists ? '' : 'hidden') ?>">
                        <!-- Profile Header -->
                        <div class="profile-header">
                            <div class="header-content">
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
                            </div>
                        <?php endif; ?>

                        <!-- Titles Section -->
                        <div class="profile-section">
                            <label>
                                <?php echo ($ownsProfile ? 'Your titles' : 'Titles') ?>:
                            </label>
                            <ul>
                                <?php foreach ($processedTitles as $processedTitle): ?>
                                    <?php if (!empty($processedTitle)): // Check if the title is not empty ?>
                                        <li>
                                            <?= $processedTitle; ?>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <!-- Role Section -->
                        <div class="profile-section user-role">
                            <label>
                                <?php echo ($ownsProfile ? 'Your roles' : 'Roles') ?>:
                            </label>
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
                        </div>

                        <!-- Packages Section -->
                        <div class="profile-section permanent-packages">
                            <label>
                                <?php echo ($ownsProfile ? 'Your permanent packages' : 'Permanent packages') ?>:
                            </label>
                            <ul>
                                <?php foreach ($permanentPackages as $packageTitle): ?>
                                    <li>
                                        <?= htmlspecialchars($packageTitle); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>



                        <!-- Forum Section -->
                        <div class="profile-section forum-activity">
                            <label>
                                <?php echo ($ownsProfile ? 'Your social activity' : 'Social Activity') ?>:
                            </label>
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
                        </div>
                    </div>
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