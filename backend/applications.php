<?php
// Define the number of threads per page
$perPage = 10;

// Get the current page from the query parameter or default to 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Fetch threads for staff applications
$staffApplications = Forum::fetchThreadsByFid(2, $page, $perPage);

// Calculate the total number of pages
$totalThreads = Forum::countThreadsByFid(2);
$totalPages = ceil($totalThreads / $perPage);

// Back URL logic
$backUrl = $GLOBALS['config']['url'];

?>
