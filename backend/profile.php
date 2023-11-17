<?php


function getUserTitles($steamId) {
    // Specify the database name for this particular query
    $dbName = 'igfastdl_surftimerg';
    $pdo = DatabaseConnector::getDatabase($dbName);
    $stmt = $pdo->prepare('SELECT title FROM ck_vipadmins WHERE steamid = :steamid');
    $stmt->execute([':steamid' => $steamId]);
    $userTitles = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch only the first row
    return $userTitles ? $userTitles['title'] : null; // Return just the 'title' column
}

// Function to parse and format user titles for display
function formatUserTitles($titleString) {
    if (is_null($titleString) || $titleString == 'vip') {
        return ['vip']; // For users with only 'vip' or no title
    }
    
    // Remove the leading index number and split the titles
    $titles = explode('`', substr($titleString, 1));
    return $titles;
}

function mapColorCodesToStyles($title) {
    // Define the color mappings
    $colors = [
        '{red}' => 'text-red-500',
        '{orange}' => 'text-orange-500',
        '{yellow}' => 'text-yellow-500',
        '{green}' => 'text-green-500',
        '{white}' => 'text-white',
        // Add more mappings as needed...
    ];

    // Replace the color codes with span elements and classes, ignoring case
    foreach ($colors as $code => $class) {
        $code = preg_quote($code, '/');
        $title = preg_replace("/$code/i", "<span class=\"$class\">", $title) . '</span>';
    }

    // Fix the spans by closing them before opening a new one
    $title = str_replace('</span><span class="', ' ', $title);

    // Remove any potential empty span tags
    $title = str_replace('<span class=""></span>', '', $title);

    return $title;
}

// Get the steamId
$steamId = $userProfile['steam_id']; 
$rawTitles = getUserTitles($steamId);
$userTitles = formatUserTitles($rawTitles);
$processedTitles = array_map('mapColorCodesToStyles', $userTitles);


?>