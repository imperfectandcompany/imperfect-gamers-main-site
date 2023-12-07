<?php

class Forum
{
    public static function fetchThreadsByFid(array $fids, $page, $perPage)
    {
        $pdoMyBB = DatabaseConnector::getDatabase("igfastdl_mybb");
        $start = max(($page - 1) * $perPage, 0); // Ensure start is not negative

        // Convert $fids array to a comma-separated string of integers
        $fidList = implode(',', array_map('intval', $fids));

        // Users and threads to exclude
        $excludedUids = [880, 881, 879, 771, 271, 882];
        $excludedTids = [652, 653];

        // Prepare the SQL query using prepared statements to prevent SQL injection
        $stmt = $pdoMyBB->prepare("
            SELECT t.*, COUNT(p.pid) as post_count
            FROM mybb_threads t
            LEFT JOIN mybb_posts p ON t.tid = p.tid
            WHERE t.fid IN ($fidList) AND t.visible = 1
            AND t.uid NOT IN (" . implode(',', array_map('intval', $excludedUids)) . ") 
            AND t.tid NOT IN (" . implode(',', array_map('intval', $excludedTids)) . ") 
            GROUP BY t.tid
            ORDER BY t.lastpost DESC
            LIMIT :start, :perPage
        ");

        // Execute the query with the provided forum ID(s) and pagination parameters
        $stmt->bindValue(':start', $start, PDO::PARAM_INT);
        $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch and return the results
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function generateThreadUrlsByFids(array $forumIds, $perPage)
    {
        // if forum ids have 2 then we know its the applications page, otherwise its the appeals page
        $page = $forumIds[0] == 2 ? 'applications' : 'appeals';
        $pdoMyBB = DatabaseConnector::getDatabase("igfastdl_mybb");
    
        // Convert $forumIds array to a comma-separated string of integers
        $fidList = implode(',', array_map('intval', $forumIds));
    
        // Users and threads to exclude
        $excludedUids = [880, 881, 879, 771, 271, 882];
        $excludedTids = [652, 653];
    
        // Get the total number of threads for the specified FIDs
        $stmtCount = $pdoMyBB->prepare("
            SELECT COUNT(t.tid) as total_threads
            FROM mybb_threads t
            WHERE t.fid IN ($fidList) AND t.visible = 1
            AND t.uid NOT IN (" . implode(',', array_map('intval', $excludedUids)) . ") 
            AND t.tid NOT IN (" . implode(',', array_map('intval', $excludedTids)) . ")
        ");
        $stmtCount->execute();
        $totalThreads = $stmtCount->fetch(PDO::FETCH_ASSOC)['total_threads'];
    
        // Calculate the total number of pages
        $totalPages = ceil($totalThreads / $perPage);
    
        // Initialize an array to hold the thread URLs sorted by page
        $threadUrlsByPage = [];
    
        // Fetch the thread data (subject and tid)
        $stmt = $pdoMyBB->prepare("
            SELECT t.tid, t.subject
            FROM mybb_threads t
            WHERE t.fid IN ($fidList) AND t.visible = 1
            AND t.uid NOT IN (" . implode(',', array_map('intval', $excludedUids)) . ") 
            AND t.tid NOT IN (" . implode(',', array_map('intval', $excludedTids)) . ") 
            ORDER BY t.lastpost DESC
        ");
        $stmt->execute();
    
        // Initialize variables to track the current page and thread count
        $currentPage = 1;
        $currentThreadCount = 0;
    
        // Create an array to store thread URLs for the current page
        $pageThreadUrls = [];
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tid = $row['tid'];
            $subject = $row['subject'];
            $slug = createSlugFromTitle($subject);
    
            // Generate the thread URL and add it to the current page's array
            $threadUrl = "{$page}/thread/{$tid}/{$slug}";
            $pageThreadUrls[] = $threadUrl;
    
            // Check if we have reached the desired number of threads for the current page
            $currentThreadCount++;
            if ($currentThreadCount >= $perPage) {
                // Add the page's thread URLs to the result array
                $threadUrlsByPage[$currentPage] = $pageThreadUrls;
    
                // Reset variables for the next page
                $currentPage++;
                $currentThreadCount = 0;
                $pageThreadUrls = [];
            }
        }
    
        // Add any remaining thread URLs to the result array
        if (!empty($pageThreadUrls)) {
            $threadUrlsByPage[$currentPage] = $pageThreadUrls;
        }
    
        return [
            'threadUrlsByPage' => $threadUrlsByPage,
            'totalThreads' => $totalThreads,
        ];
    }

    public static function countThreadsByFid(array $fids)
    {
        $pdoMyBB = DatabaseConnector::getDatabase("igfastdl_mybb");
    
        $fidList = implode(',', array_map('intval', $fids));
    
        $excludedUids = [880, 881, 879, 771, 271, 882];
        $excludedTids = [652, 653];
    
        $stmt = $pdoMyBB->prepare("
            SELECT COUNT(DISTINCT t.tid) FROM mybb_threads t
            WHERE t.fid IN ($fidList) AND t.visible = 1
            AND t.uid NOT IN (" . implode(',', array_map('intval', $excludedUids)) . ") 
            AND t.tid NOT IN (" . implode(',', array_map('intval', $excludedTids)) . ")
        ");
    
        $stmt->execute();
    
        return $stmt->fetchColumn();
    }

    // Fetch a single thread by ID
    public static function fetchThreadById($threadId) {
        $pdoMyBB = DatabaseConnector::getDatabase("igfastdl_mybb");
        $stmt = $pdoMyBB->prepare("SELECT t.*, COUNT(p.pid) as post_count FROM mybb_threads t LEFT JOIN mybb_posts p ON t.tid = p.tid WHERE t.tid = :tid GROUP BY t.tid");
        $stmt->execute([':tid' => $threadId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

// Fetch posts for a specific thread ordered by creation date
public static function fetchPostsByThreadId($threadId) {
    $pdoMyBB = DatabaseConnector::getDatabase("igfastdl_mybb");
    $stmt = $pdoMyBB->prepare("SELECT * FROM mybb_posts WHERE tid = :tid ORDER BY dateline ASC");
    $stmt->execute([':tid' => $threadId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}