<?php

class Forum
{
    public static function fetchThreadsByFid($fid, $page, $perPage) {
        // Get the PDO instance for the MyBB database
        $pdoMyBB = DatabaseConnector::getDatabase("igfastdl_mybb");

        // Calculate the start point for the threads to be fetched
        $start = ($page - 1) * $perPage;

                // Users and threads to exclude
                $excludedUids = [880, 881, 879, 771, 271, 882];
                $excludedTids = [652, 653];

        // Prepare the SQL query using prepared statements to prevent SQL injection
        $stmt = $pdoMyBB->prepare("
            SELECT t.*, COUNT(p.pid) as post_count, t.views
            FROM mybb_threads t
            LEFT JOIN mybb_posts p ON t.tid = p.tid
            WHERE t.fid = :fid 
            AND t.visible = 1 
            AND t.uid NOT IN (" . implode(',', array_map('intval', $excludedUids)) . ") 
            AND t.tid NOT IN (" . implode(',', array_map('intval', $excludedTids)) . ") 
            GROUP BY t.tid
            ORDER BY t.lastpost DESC
            LIMIT :start, :perPage
        ");

        // Bind the parameters
        $stmt->bindValue(':fid', $fid, PDO::PARAM_INT);
        $stmt->bindValue(':start', $start, PDO::PARAM_INT);
        $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Fetch and return the results
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function countThreadsByFid($fid) {
        $pdoMyBB = DatabaseConnector::getDatabase("igfastdl_mybb");

        // Users and threads to exclude
        $excludedUids = [880, 881, 879, 771, 271, 882];
        $excludedTids = [652, 653];

        // Prepare the SQL query for counting threads, excluding specific users and threads
        $stmt = $pdoMyBB->prepare("
            SELECT COUNT(*) FROM mybb_threads
            WHERE fid = :fid 
            AND visible = 1 
            AND uid NOT IN (" . implode(',', array_map('intval', $excludedUids)) . ") 
            AND tid NOT IN (" . implode(',', array_map('intval', $excludedTids)) . ")
        ");

        // Execute the query
        $stmt->execute([':fid' => $fid]);

        // Return the count result
        return $stmt->fetchColumn();
    }
}
?>
