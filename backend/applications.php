<?php
// Define the number of threads per page
$perPage = 10;

$forumIds = [2]; // Ban Appeals fid and Archived Ban Appeals fid


// Get the current page from the query parameter or default to 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Fetch threads for staff applications
$staffApplications = Forum::fetchThreadsByFid($forumIds, $page, $perPage);

// Calculate the total number of pages
$totalThreads = Forum::countThreadsByFid($forumIds);
$totalPages = ceil($totalThreads / $perPage);

// Back URL logic
$backUrl = $GLOBALS['config']['url'];

?>
