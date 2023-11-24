<?php
// Define the number of threads per page
$perPage = 10;
$forumIds = [3, 19]; // Ban Appeals fid and Archived Ban Appeals fid

// Get the current page from the query parameter or default to 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Fetch threads for ban appeals
$banAppealsThreads = Forum::fetchThreadsByFid($forumIds, $page, $perPage);

// Calculate the total number of pages
$totalThreads = Forum::countThreadsByFid($forumIds);
$totalPages = ceil($totalThreads / $perPage);

// Back URL logic
$backUrl = $GLOBALS['config']['url'];

?>
