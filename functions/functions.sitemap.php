<?php

function getApplicationUrls()
{
    // Define the forum IDs (FIDs) and per page value
    $forumIds = [2]; // Example: FID 2 for "applications"
    $perPage = 10;   // Example: 10 threads per page

    // Call the function to generate thread URLs by FIDs and per page
    $threadUrlsData = Forum::generateThreadUrlsByFids($forumIds, $perPage);

    // Get the thread URLs sorted by page and the total number of threads
    $threadUrlsByPage = $threadUrlsData['threadUrlsByPage'];
    $totalThreads = $threadUrlsData['totalThreads'];

    // Initialize an array to store the URLs
    $applicationThreadUrls = [];

    // Loop through the thread URLs by page and flatten the array
    foreach ($threadUrlsByPage as $page => $pageThreadUrls) {
        foreach ($pageThreadUrls as $url) {
            $applicationThreadUrls[] = $url;
        }
    }
    return $applicationThreadUrls;
}

function getAppealUrls()
{
    // Define the forum IDs (FIDs) and per page value
    $forumIds = [3, 19]; // Ban Appeals fid and Archived Ban Appeals fid
    $perPage = 10;   // Example: 10 threads per page

    // Call the function to generate thread URLs by FIDs and per page
    $threadUrlsData = Forum::generateThreadUrlsByFids($forumIds, $perPage);

    // Get the thread URLs sorted by page and the total number of threads
    $threadUrlsByPage = $threadUrlsData['threadUrlsByPage'];
    $totalThreads = $threadUrlsData['totalThreads'];

    // Initialize an array to store the URLs
    $appealThreadUrls = [];

    // Loop through the thread URLs by page and flatten the array
    foreach ($threadUrlsByPage as $page => $pageThreadUrls) {
        foreach ($pageThreadUrls as $url) {
            $appealThreadUrls[] = $url;
        }
    }
    return $appealThreadUrls;
}