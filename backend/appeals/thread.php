<?php

// Check if the slug is present in the URL
$slugInUrl = $GLOBALS['url_loc'][4] ?? null;

if ($threadId) {
    // Fetch the thread details from the database
    $threadDetails = Forum::fetchThreadById($threadId);

    $PAGE_TITLE = htmlspecialchars($threadDetails['subject']);

    if ($threadDetails) {
        // Generate the correct slug from the thread's title
        $correctSlug = createSlugFromTitle($threadDetails['subject']);
        $threadPosts = Forum::fetchPostsByThreadId($threadId);

        // Create a new instance of the BBCode parser
        $bbcodeParser = new ChrisKonnertz\BBCode\BBCode();

        // Initialize an empty array to hold the parsed posts
        $parsedPosts = [];
        $firstPostContent = '';

        // Parse each post's message
        foreach ($threadPosts as $index => $post) {
            $parsedMessage = $bbcodeParser->render($post['message']);
            $parsedPosts[] = [
                'username' => $post['username'],
                'message' => $parsedMessage,
            ];

            // Use the first post's content for meta description
            if ($index === 0) {
                $firstPostContent = $parsedMessage;
            }
        }

        // Set meta description and keywords based on the first post content
        $META_DESC = createMetaDescription($firstPostContent);
        $META_WORDS = createMetaKeywords($threadDetails['subject']);

        // Check if the slug in the URL is incorrect or missing
        if (!$slugInUrl || $slugInUrl !== $correctSlug) {
            $newUrl = "https://imperfectgamers.org/appeals/thread/" . $threadId . "/" . $correctSlug;
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $newUrl);
            exit;
        }
    }
}
?>