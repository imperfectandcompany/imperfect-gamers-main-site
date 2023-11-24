<?php

class Forum
{
    public static function fetchThreadsByFid(array $fids, $page, $perPage)
    {
        $pdoMyBB = DatabaseConnector::getDatabase("igfastdl_mybb");
        $start = ($page - 1) * $perPage; // Calculate the offset for the LIMIT clause

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

    // Fetch posts for a specific thread
    public static function fetchPostsByThreadId($threadId) {
        $pdoMyBB = DatabaseConnector::getDatabase("igfastdl_mybb");
        $stmt = $pdoMyBB->prepare("SELECT * FROM mybb_posts WHERE tid = :tid");
        $stmt->execute([':tid' => $threadId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>