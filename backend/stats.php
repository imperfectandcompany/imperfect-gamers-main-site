<?php
// backend/stats.php

// Function to search players by name and paginate the results
function searchPlayers($searchTerm, $page, $playersPerPage)
{
    $pdo = DatabaseConnector::getExternalDatabase();
    $offset = ($page - 1) * $playersPerPage;
    $searchTerm = "%{$searchTerm}%";
    $stmt = $pdo->prepare("SELECT PlayerName, SteamID, GlobalPoints FROM PlayerStats WHERE PlayerName LIKE :searchTerm ORDER BY GlobalPoints DESC LIMIT :limit OFFSET :offset");
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $stmt->bindParam(':limit', $playersPerPage, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get the total record count for a search
function getSearchRecordCount($searchTerm)
{
    $pdo = DatabaseConnector::getExternalDatabase();
    $searchTerm = "%{$searchTerm}%";
    $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM PlayerStats WHERE PlayerName LIKE :searchTerm");
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

function fetchAllMaps()
{
    $pdo = DatabaseConnector::getExternalDatabase();
    $stmt = $pdo->prepare("SELECT DISTINCT MapName FROM PlayerRecords WHERE MapName LIKE 'surf_%' AND MapName NOT LIKE '%\_bonus%' ORDER BY MapName ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetchAllBonuses()
{
    $pdo = DatabaseConnector::getExternalDatabase();
    $stmt = $pdo->prepare("SELECT DISTINCT MapName FROM PlayerRecords WHERE MapName LIKE '%\_bonus%' ORDER BY MapName ASC");
    $stmt->execute();
    $bonuses = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Process bonuses to associate them with parent maps
    $bonusMap = [];
    foreach ($bonuses as $bonus) {
        $parts = explode('_bonus', $bonus['MapName']);
        $parentMap = $parts[0];
        $bonusMap[$parentMap][] = $bonus['MapName'];
    }

    return $bonusMap;
}

function getPlayerMapRank($playerName, $mapName)
{
    $pdo = DatabaseConnector::getExternalDatabase();
    $stmt = $pdo->prepare("
        SELECT COUNT(DISTINCT p.SteamID) + 1 AS rank
        FROM PlayerRecords AS p
        WHERE p.TimerTicks < (
            SELECT p2.TimerTicks
            FROM PlayerRecords AS p2
            WHERE p2.PlayerName = :playerName AND p2.MapName = :mapName
            LIMIT 1
        ) AND p.MapName = :mapName
    ");
    $stmt->bindParam(':playerName', $playerName, PDO::PARAM_STR);
    $stmt->bindParam(':mapName', $mapName, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['rank'] ?? null;
}


// New function to retrieve bonuses for a given map
function fetchMapBonuses($mapName)
{
    $pdo = DatabaseConnector::getExternalDatabase();
    $stmt = $pdo->prepare("SELECT DISTINCT MapName FROM PlayerRecords WHERE MapName LIKE :mapName AND MapName LIKE '%\_bonus%' ORDER BY MapName ASC");
    $stmt->bindValue(':mapName', $mapName . '\_bonus%', PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetchMapSpecificRecords($mapName, $page, $playersPerPage)
{
    try {
        $pdo = DatabaseConnector::getExternalDatabase();
        $offset = ($page - 1) * $playersPerPage; // Calculate offset based on current page
        $stmt = $pdo->prepare("SELECT `SteamID`, `PlayerName`, `FormattedTime` FROM PlayerRecords WHERE MapName = :mapName ORDER BY `TimerTicks` ASC LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':mapName', $mapName, PDO::PARAM_STR);
        $stmt->bindParam(':limit', $playersPerPage, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT); // Bind offset
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Handle exception
        error_log("Database error: " . $e->getMessage());
        return []; // Return an empty array to indicate failure
    }
}

function getPlayerLastJoinedRank($playerName)
{
    $pdo = DatabaseConnector::getExternalDatabase();
    $stmt = $pdo->prepare("
        SELECT COUNT(*) + 1 AS rank
        FROM PlayerStats
        WHERE LastConnected > (
            SELECT LastConnected
            FROM PlayerStats
            WHERE PlayerName = :playerName
            LIMIT 1
        )
    ");
    $stmt->bindParam(':playerName', $playerName, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['rank'] ?? null;
}

function searchMapSpecificPlayers($mapName, $searchTerm, $currentPage, $playersPerPage)
{
    $pdo = DatabaseConnector::getExternalDatabase();
    $searchTerm = '%' . $searchTerm . '%';
    // Calculate the offset for the current page
    $offset = ($currentPage - 1) * $playersPerPage;

    $stmt = $pdo->prepare("SELECT DISTINCT `SteamID`, `PlayerName`, `FormattedTime`, `MapName` FROM PlayerRecords WHERE MapName = :mapName AND PlayerName LIKE :searchTerm ORDER BY `TimerTicks` ASC LIMIT :limit OFFSET :offset");
    $stmt->bindParam(':mapName', $mapName, PDO::PARAM_STR);
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $stmt->bindParam(':limit', $playersPerPage, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT); // Bind the offset value
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getSearchRecordCountForMap($mapName, $searchTerm)
{
    $pdo = DatabaseConnector::getExternalDatabase();
    $searchTerm = '%' . $searchTerm . '%'; // Prepare the search term for a LIKE query
    $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM PlayerRecords WHERE MapName = :mapName AND PlayerName LIKE :searchTerm");
    $stmt->bindParam(':mapName', $mapName, PDO::PARAM_STR);
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}


function getTotalRecordCountForMap($mapName)
{
    $pdo = DatabaseConnector::getExternalDatabase();
    $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM PlayerRecords WHERE MapName = :mapName");
    $stmt->bindParam(':mapName', $mapName, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}


function getPlayersByPage($page, $playersPerPage = 10)
{
    $pdo = DatabaseConnector::getExternalDatabase();
    $offset = ($page - 1) * $playersPerPage;
    // Include SteamID in the SELECT statement
    $stmt = $pdo->prepare("SELECT PlayerName, GlobalPoints, SteamID FROM PlayerStats ORDER BY GlobalPoints DESC LIMIT :limit OFFSET :offset");
    $stmt->bindParam(':limit', $playersPerPage, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get ranking of a player
function getPlayerRank($playerName)
{
    $pdo = DatabaseConnector::getExternalDatabase();
    // Add LIMIT 1 to ensure only a single row is returned from the subquery
    $stmt = $pdo->prepare("SELECT COUNT(*) + 1 AS rank FROM PlayerStats WHERE GlobalPoints > (SELECT GlobalPoints FROM PlayerStats WHERE PlayerName = :playerName ORDER BY GlobalPoints DESC LIMIT 1)");
    $stmt->bindParam(':playerName', $playerName, PDO::PARAM_STR);
    $stmt->execute();
    $rank = $stmt->fetch(PDO::FETCH_ASSOC);
    return $rank['rank'] ?? null;
}


function getUserIDBySteamID64($steamId64)
{
    $pdo = DatabaseConnector::getDatabase(); // This uses the default database
    $stmt = $pdo->prepare("SELECT user_id FROM profiles WHERE steam_id_64 = :steamId64");
    $stmt->execute([':steamId64' => $steamId64]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['user_id'] : false;
}


// Function to get the latest players with pagination
function getLatestPlayers($page, $playersPerPage, $searchTerm = '')
{
    $pdo = DatabaseConnector::getExternalDatabase();
    $offset = ($page - 1) * $playersPerPage;
    $query = "SELECT PlayerName, SteamID, LastConnected FROM PlayerStats ";
    if (!empty($searchTerm)) {
        $query .= "WHERE PlayerName LIKE :searchTerm ";
    }
    $query .= "ORDER BY LastConnected DESC LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($query);
    if (!empty($searchTerm)) {
        $searchTerm = "%{$searchTerm}%";
        $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    }
    $stmt->bindParam(':limit', $playersPerPage, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get the latest records with pagination
// Modified function to get the latest records with optional search and pagination
function getLatestRecords($page, $playersPerPage, $searchTerm = '')
{
    $pdo = DatabaseConnector::getExternalDatabase();
    $offset = ($page - 1) * $playersPerPage;
    $query = "SELECT PlayerName, FormattedTime, MapName, SteamID, UnixStamp FROM PlayerRecords ";
    if (!empty($searchTerm)) {
        // Assuming you want to search by PlayerName or MapName
        $query .= "WHERE PlayerName LIKE :searchTerm OR MapName LIKE :searchTerm ";
    }
    $query .= "ORDER BY UnixStamp DESC LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($query);
    if (!empty($searchTerm)) {
        $searchTerm = "%{$searchTerm}%";
        $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    }
    $stmt->bindParam(':limit', $playersPerPage, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// Function to get the total record count for latest players
function getLatestPlayersRecordCount($searchTerm = '')
{
    $pdo = DatabaseConnector::getExternalDatabase();
    $query = "SELECT COUNT(*) as total FROM PlayerStats ";
    if (!empty($searchTerm)) {
        $query .= "WHERE PlayerName LIKE :searchTerm";
    }
    $stmt = $pdo->prepare($query);
    if (!empty($searchTerm)) {
        $searchTerm = "%{$searchTerm}%";
        $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    }
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

// Function to get the total record count for latest records with optional search
function getLatestRecordsRecordCount($searchTerm = '')
{
    $pdo = DatabaseConnector::getExternalDatabase();
    $query = "SELECT COUNT(*) as total FROM PlayerRecords ";
    if (!empty($searchTerm)) {
        // Adjust based on the fields you want to search against
        $query .= "WHERE PlayerName LIKE :searchTerm OR MapName LIKE :searchTerm";
    }
    $stmt = $pdo->prepare($query);
    if (!empty($searchTerm)) {
        $searchTerm = "%{$searchTerm}%";
        $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    }
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime('@' . $datetime);
    $ago->setTimezone(new DateTimeZone(date_default_timezone_get())); // Convert to current timezone if necessary
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full)
        $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function getTotalRecordCount()
{
    $pdo = DatabaseConnector::getExternalDatabase();
    $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM PlayerStats");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

// Initialize default values
$searchTerm = '';
$current_page = 1;
$mapName = null;
$bonusNumber = null;
$globalType = 'points'; // Default to showing global points stats
$pageFound = false;
$searchFound = false;
$statsTitle = "Stats"; // Default title

$errorFlag = false;
$errorMsg = '';

// Get the list of all maps from the database
$maps = fetchAllMaps();

// Determine action based on URL segments
if (isset($GLOBALS['url_loc'][2])) {

    $validGlobalTypes = ['points', 'latest-players', 'latest-records'];

    switch ($GLOBALS['url_loc'][2]) {
        case 'global':
            $globalType = $GLOBALS['url_loc'][3] ?? 'points';
            // Initialize search term and current page with defaults
            // Check if the global type is valid
            if (!in_array($globalType, $validGlobalTypes)) {
                // Global type does not exist, set an error flag and message
                $errorFlag = true;
                $errorMsg = "The global type '$globalType' is not valid.";
            } else {
                for ($i = 4; $i < count($GLOBALS['url_loc']); $i++) {
                    if ($GLOBALS['url_loc'][$i] === 'search' && isset($GLOBALS['url_loc'][$i + 1])) {
                        $searchTerm = $GLOBALS['url_loc'][$i + 1];
                        $searchFound = true;
                        $i++; // Skip the search term in the next iteration
                    } elseif ($GLOBALS['url_loc'][$i] === 'page' && isset($GLOBALS['url_loc'][$i + 1])) {
                        $current_page = (int) $GLOBALS['url_loc'][$i + 1];
                        $pageFound = true;
                        $i++; // Skip the page number in the next iteration
                    } elseif (empty($GLOBALS['url_loc'][$i]) && $i === count($GLOBALS['url_loc']) - 1) {
                        // If the last segment is empty due to a trailing slash, ignore it or perform a redirect
                        // To redirect without the trailing slash for SEO, build the current URL without the last segment
                        $urlWithoutTrailingSlash = implode('/', array_slice($GLOBALS['url_loc'], 0, -1));
                        $redirectUrl = "https://imperfectgamers.org" . $urlWithoutTrailingSlash;
                        header("Location: $redirectUrl", true, 301); // Permanent redirect
                        exit;
                    } else {
                        // If an unexpected segment is found
                        $errorFlag = true;
                        $errorMsg = "Invalid URL segment detected.";
                        $PAGE_TITLE = "Invalid URL - Stats";
                        $META_DESC = "The requested URL is invalid in the statistics section of Imperfect Gamers.";
                        $META_WORDS = "invalid url, error, Imperfect Gamers stats";
                        $statsTitle = "Invalid URL";
                        break; // Stop further processing
                    }
                }
            }
            break;

        case 'map':
            $mapName = $GLOBALS['url_loc'][3] ?? null;
            $searchFound = false;
            $bonusNumber = null;

            // Convert the list of maps to a simple array of map names for easier checking
            $mapNames = array_column($maps, 'MapName');
            // Check if the map name from the URL exists in the list of map names
            if ($mapName && !in_array($mapName, $mapNames)) {
                // Map does not exist, set an error flag and message
                $errorFlag = true;
                $errorMsg = "The map '$mapName' does not exist.";
                $PAGE_TITLE = "Map Not Found - Stats";
                $META_DESC = "The map '$mapName' does not exist in the statistics section of Imperfect Gamers.";
                $META_WORDS = "map not found, $mapName, Imperfect Gamers stats";
                $statsTitle = "Map Not Found";
            } else {
                // Loop through the URL segments starting from the map name
                for ($i = 3; $i < count($GLOBALS['url_loc']); $i++) {
                    if ($GLOBALS['url_loc'][$i] === 'bonus' && isset($GLOBALS['url_loc'][$i + 1])) {
                        $bonusNumber = (int) $GLOBALS['url_loc'][$i + 1];
                        $i++; // Skip the bonus number in the next iteration
                    } elseif ($GLOBALS['url_loc'][$i] === 'search' && isset($GLOBALS['url_loc'][$i + 1])) {
                        $searchTerm = $GLOBALS['url_loc'][$i + 1];
                        $searchFound = true;
                        $i++; // Skip the search term in the next iteration
                    } elseif ($GLOBALS['url_loc'][$i] === 'page' && isset($GLOBALS['url_loc'][$i + 1])) {
                        $current_page = (int) $GLOBALS['url_loc'][$i + 1];
                        $pageFound = true;
                        $i++; // Skip the page number in the next iteration
                    }
                }
            }
            break;
        default:
            // Invalid URL segment
            $errorFlag = true;
            $errorMsg = "Page does not exist on stats.";
            break;
    }
}

// Redirect if only 'stats' is present in the URL, accounting for a trailing slash
if (
    (count($GLOBALS['url_loc']) == 2 && $GLOBALS['url_loc'][1] == 'stats') ||
    (count($GLOBALS['url_loc']) == 3 && $GLOBALS['url_loc'][1] == 'stats' && $GLOBALS['url_loc'][2] == '')
) {
    header("Location: https://imperfectgamers.org/stats/global/points");
    exit;
}


foreach ($GLOBALS['url_loc'] as $index => $segment) {
    if ($segment === 'page') {
        $pageFound = true;
        // Ensure the page number is provided and is a positive integer
        if (!isset($GLOBALS['url_loc'][$index + 1]) || !filter_var($GLOBALS['url_loc'][$index + 1], FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]])) {
            $errorFlag = true;
            $errorMsg = "Invalid page number provided.";
            $PAGE_TITLE = "Invalid Page Number - Stats";
            $META_DESC = "An invalid page number was provided in the statistics section of Imperfect Gamers.";
            $META_WORDS = "invalid page number, error, statistics, Imperfect Gamers";
            $statsTitle = "Invalid Page Number";
            break;
        }
    }
}


if (!$errorFlag) {
    // Construct the map identifier for map-specific searches
    $mapIdentifier = $mapName ? $mapName . ($bonusNumber ? "_bonus{$bonusNumber}" : '') : null;

    $playersPerPage = 10; // Set how many players we want per page

// Initialize breadcrumbs
$breadcrumbs = [];

// Base URL for breadcrumb links
$baseBreadcrumbUrl = '/stats';

// Add 'Global' or 'Maps' breadcrumb based on the context
if (!$mapName) {
    // Global Stats section
    $breadcrumbs[] = ['title' => 'Global Stats', 'url' => "{$baseBreadcrumbUrl}/global/points"];

    // Add specific global type if applicable
    if ($globalType && $globalType !== 'points') {
        $globalTypeTitle = ucwords(str_replace('-', ' ', $globalType));
        $breadcrumbs[] = ['title' => $globalTypeTitle, 'url' => "{$baseBreadcrumbUrl}/global/{$globalType}"];
    }
} else {
    // Map section
    $breadcrumbs[] = ['title' => 'Maps', 'url' => null]; // Non-clickable 'Maps' breadcrumb
    $mapBreadcrumbTitle = ucfirst($mapName);
    $breadcrumbs[] = ['title' => $mapBreadcrumbTitle, 'url' => "{$baseBreadcrumbUrl}/map/{$mapName}"];

    // Add 'Bonus' breadcrumb if applicable
    if ($bonusNumber !== null) {
        $breadcrumbs[] = ['title' => "Bonus {$bonusNumber}", 'url' => "{$baseBreadcrumbUrl}/map/{$mapName}/bonus/{$bonusNumber}"];
    }
}

// If a search term is used, add the search breadcrumb
if ($searchTerm) {
    $searchBreadcrumbTitle = "Search Results for '{$searchTerm}'";
    $searchUrl = "{$baseBreadcrumbUrl}";

    if ($mapName) {
        $searchBreadcrumbTitle .= " in {$mapName} Map Stats";
        $searchUrl .= $bonusNumber !== null
            ? "/map/{$mapName}/bonus/{$bonusNumber}/search/{$searchTerm}"
            : "/map/{$mapName}/search/{$searchTerm}";
    } else {
        $searchBreadcrumbTitle .= " in {$globalType}";
        $searchUrl .= "/global/{$globalType}/search/{$searchTerm}";
    }
    $breadcrumbs[] = ['title' => $searchBreadcrumbTitle, 'url' => $searchUrl];
}

// If a page number is being viewed, append the 'Page' breadcrumb
if ($pageFound && $current_page > 1) {
    $pageBreadcrumbTitle = "Page {$current_page}";
    $pageUrl = "{$baseBreadcrumbUrl}";

    // Append the correct path before the page number
    if ($mapName) {
        $pageUrl .= "/map/{$mapName}";
        if ($bonusNumber !== null) {
            $pageUrl .= "/bonus/{$bonusNumber}";
        }
        if ($searchTerm) {
            $pageUrl .= "/search/{$searchTerm}";
        }
    } elseif ($globalType) {
        $pageUrl .= "/global/{$globalType}";
        if ($searchTerm) {
            $pageUrl .= "/search/{$searchTerm}";
        }
    }

    // Finally, append the page number
    $pageUrl .= "/page/{$current_page}";

    $breadcrumbs[] = ['title' => $pageBreadcrumbTitle, 'url' => $pageUrl];
}

    // Fetch data based on determined action
    if ($searchTerm && $mapIdentifier) {
        $mapTitlePart = $bonusNumber ? "{$mapName} Bonus {$bonusNumber}" : $mapName;
        $PAGE_TITLE = "Search Results for {$searchTerm} in {$mapTitlePart}";
        $META_DESC = "Discover search results for {$searchTerm} within the map {$mapTitlePart}. Explore player rankings and times.";
        $META_WORDS = "search, {$mapName}, {$searchTerm}, player rankings, surf stats, Imperfect Gamers";
        $statsTitle = "{$mapTitlePart} Map Stats";
        // Searching within a specific map (with optional bonus)
        $topPlayers = searchMapSpecificPlayers($mapIdentifier, $searchTerm, $current_page, $playersPerPage);
        $totalRecords = getSearchRecordCountForMap($mapIdentifier, $searchTerm);
    } elseif ($mapIdentifier) {
        // Set metadata for viewing stats for a specific map (with optional bonus)
        $mapTitlePart = $bonusNumber ? "{$mapName} Bonus {$bonusNumber}" : $mapName;
        $PAGE_TITLE = "{$mapTitlePart} Map Stats";
        $META_DESC = "View detailed statistics and leaderboard for the map {$mapTitlePart}. Check out the top player performances.";
        $META_WORDS = "{$mapName}, map stats, leaderboard, surf stats, Imperfect Gamers";
        $statsTitle = "{$mapTitlePart} Map Stats";

        // Viewing stats for a specific map (with optional bonus)
        $topPlayers = fetchMapSpecificRecords($mapIdentifier, $current_page, $playersPerPage);
        $totalRecords = getTotalRecordCountForMap($mapIdentifier);
    } else {
        // Viewing global stats or performing a global search
        switch ($globalType) {
            case 'points':
                $PAGE_TITLE = $searchTerm ? "Search Results for '{$searchTerm}' - Global Points Leaderboard" : "Global Points Leaderboard";
                $META_DESC = $searchTerm ? "Discover search results for '{$searchTerm}' across the global points leaderboard." : "View the global leaderboard showcasing top players across all maps in our community.";
                $META_WORDS = "global points, leaderboard, surf stats, Imperfect Gamers, top players";
                $statsTitle = $searchTerm ? "Search Results for '{$searchTerm}' - Global Points" : "Global Points Leaderboard";
                $topPlayers = searchPlayers($searchTerm, $current_page, $playersPerPage);
                $totalRecords = getSearchRecordCount($searchTerm);
                break;
            case 'latest-players':
                $PAGE_TITLE = $searchTerm ? "Search Results for '{$searchTerm}' - Latest Players" : "Latest Players";
                $META_DESC = $searchTerm ? "Find players recently active in the community with the term '{$searchTerm}'." : "Discover the most recent players who have joined or played in our community. Stay updated with the latest activity.";
                $META_WORDS = "latest players, recent activity, Imperfect Gamers, player search";
                $statsTitle = $searchTerm ? "Search Results for '{$searchTerm}' - Latest Players" : "Latest Players";
                $topPlayers = getLatestPlayers($current_page, $playersPerPage, $searchTerm);
                $totalRecords = getLatestPlayersRecordCount($searchTerm);
                break;
            case 'latest-records':
                $PAGE_TITLE = $searchTerm ? "Search Results for '{$searchTerm}' - Latest Records" : "Latest Records";
                $META_DESC = $searchTerm ? "Look at the newest records set by players related to '{$searchTerm}'." : "Explore the latest records set by players across various maps. Witness new achievements and top performances.";
                $META_WORDS = "latest records, new achievements, top performances, surf stats, Imperfect Gamers, record search";
                $statsTitle = $searchTerm ? "Search Results for '{$searchTerm}' - Latest Records" : "Latest Records";
                $topPlayers = getLatestRecords($current_page, $playersPerPage, $searchTerm);
                $totalRecords = getLatestRecordsRecordCount($searchTerm);
                break;
        }
    }

    $totalPages = ceil($totalRecords / $playersPerPage);
    $current_page = max(1, min($current_page, $totalPages));


    // Dynamically find the 'page' segment in the URL
    foreach ($GLOBALS['url_loc'] as $index => $segment) {
        if ($segment === 'page' && isset($GLOBALS['url_loc'][$index + 1]) && is_numeric($GLOBALS['url_loc'][$index + 1])) {
            $requestedPage = (int) $GLOBALS['url_loc'][$index + 1];
            // Check if the requested page is within the valid range
            if ($requestedPage > 0 && $requestedPage <= $totalPages) {
                $current_page = $requestedPage;
            } else {
                // Set error flag if the requested page is out of bounds
                $errorFlag = true;
                $errorMsg = "The page $requestedPage does not exist.";
                break; // No need to continue checking further segments
            }
        }
    }


    // Check if the current page is valid
    if ($current_page < 1 || ($current_page > $totalPages && $totalRecords > 0)) {
        $errorFlag = true;
        $errorMsg = "The page " . $current_page . " does not exist within the leaderboard.";
        $PAGE_TITLE = "Page Not Found";
        $META_DESC = "The requested page does not exist in the statistics section of Imperfect Gamers.";
        $META_WORDS = "page not found, error, Imperfect Gamers stats";
        $statsTitle = "Page Not Found";
    }

    // Check if there are records but not on the current page
    if ($totalRecords > 0 && empty($topPlayers) && !$errorFlag) {
        $errorFlag = true;
        $errorMsg = "No results found on page " . $current_page . ".";
        $PAGE_TITLE = "No Results - Page $current_page - Stats";
        $META_DESC = "No results found on page $current_page in the statistics section of Imperfect Gamers.";
        $META_WORDS = "no results, page $current_page, Imperfect Gamers stats";
        $statsTitle = "No Results Found";
    }

    // Check if a search term is used but no results are found
    if ($searchTerm && empty($topPlayers)) {
        $errorFlag = true;
        if ($totalRecords === 0) {
            $errorMsg = "No results found for \"" . htmlspecialchars($searchTerm) . "\".";
            $PAGE_TITLE = "No Search Results for '$searchTerm' - Stats";
            $META_DESC = "No search results found for '$searchTerm' in the statistics section of Imperfect Gamers.";
            $META_WORDS = "no search results, $searchTerm, Imperfect Gamers stats";
            $statsTitle = "No Search Results";
        } else {
            $errorMsg = "No results found for \"" . htmlspecialchars($searchTerm) . "\" on page " . $current_page . ".";
            $PAGE_TITLE = "No Search Results for '$searchTerm' - Stats";
            $META_DESC = "No search results found for '$searchTerm' in the statistics section of Imperfect Gamers.";
            $META_WORDS = "no search results, $searchTerm, Imperfect Gamers stats";
            $statsTitle = "No Search Results";
        }
    }

    if(!$errorFlag) {
        if ($current_page > 1) {
            // Append the page number to the PAGE_TITLE
            $PAGE_TITLE .= " - Page $current_page";
        
            // Optionally, append a note about the page number to the META_DESC
            $META_DESC .= " This is page $current_page of the results.";
        }
    }
}

// Escaping special HTML characters in titles and descriptions to prevent XSS
$PAGE_TITLE = htmlspecialchars($PAGE_TITLE);
$META_DESC = htmlspecialchars($META_DESC);