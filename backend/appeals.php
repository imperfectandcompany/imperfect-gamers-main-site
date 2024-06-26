<?php
// Define the number of threads per page
$perPage = 10;

$forumIds = [3, 19]; // Ban Appeals fid and Archived Ban Appeals fid

// Calculate the total number of pages
$totalThreads = Forum::countThreadsByFid($forumIds);
$totalPages = ceil($totalThreads / $perPage);

// Get the current page from the query parameter or default to 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Validate page number
if ($page < 1 || $page > $totalPages) {
    $pageOutOfRange = true;
    $errorMessage = "The requested page number is out of range.";
} else {
    $pageOutOfRange = false;
    // Fetch threads for ban appeals
    $banAppeals = Forum::fetchThreadsByFid($forumIds, $page, $perPage);
}



// Determine the page context based on the URL segments
$threadRequested = isset($GLOBALS['url_loc'][2]) && $GLOBALS['url_loc'][2] === 'thread';
$threadId = $threadRequested ? ($GLOBALS['url_loc'][3] ?? null) : null;

// Determine if a thread is requested
if ($threadRequested && is_numeric($threadId)) {
    require_once 'appeals/thread.php';
}

// Back URL logic
$backUrl = $GLOBALS['config']['url'];
$backUrlText = "Home";

?>