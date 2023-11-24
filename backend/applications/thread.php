<?php

// Fetch the thread details and posts
$threadDetails = Forum::fetchThreadById($threadId);
$threadPosts = Forum::fetchPostsByThreadId($threadId);

// Create a new instance of the BBCode parser
$bbcodeParser = new ChrisKonnertz\BBCode\BBCode();


// Check if thread details exist
if (!$threadDetails) {
    echo "<p>Thread not found or does not exist.</p>";
    exit;
}

// Initialize an empty array to hold the parsed posts
$parsedPosts = [];

// Parse each post's message
foreach ($threadPosts as $post) {
    $parsedPosts[] = [
        'username' => $post['username'],
        'message' => $bbcodeParser->render($post['message']),
    ];
}
?>