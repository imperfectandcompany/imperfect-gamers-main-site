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
        if (is_null($titleString)) {
            return ['No tags found'];
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
            $title = preg_replace_callback(
                "/$code(.*?)(`|$)/i",
                function ($matches) use ($class) {
                    return "<span class=\"$class\">" . $matches[1] . "</span>";
                },
                $title
            );
        }

        return $title;
    }

    function steamid64_to_steamid($steamid64) {
        $accountID = bcsub($steamid64, '76561197960265728');
        $steamId1 = 'STEAM_1:'.bcmod($accountID, '2').':'.bcdiv($accountID, 2);
        $steamId0 = 'STEAM_0:'.bcmod($accountID, '2').':'.bcdiv($accountID, 2);
        return array($steamId0, $steamId1);
    }

    function getUserRole($steamId) {
        // Connect to the sourcebans database
        $pdo = DatabaseConnector::getDatabase("igfastdl_sourcebans");

        // Map possibilities bc it may be steam_0 or steam_1
            $accountID = bcsub($steamId, '76561197960265728');
            $steamId1 = 'STEAM_1:'.bcmod($accountID, '2').':'.bcdiv($accountID, 2);
            $steamId0 = 'STEAM_0:'.bcmod($accountID, '2').':'.bcdiv($accountID, 2);
            $steamIdArray =  array($steamId0, $steamId1);

            $stmt = $pdo->prepare('SELECT srv_group FROM sb_admins WHERE authid IN (?, ?)');
            $stmt->execute($steamIdArray);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['srv_group'] : 'Not found';
    }


    function getPermanentPackages($steamId) {
        // Connect to the igfastdl_donate database
        $pdo = DatabaseConnector::getDatabase('igfastdl_donate');

        // Prepare and execute the SQL query
        $stmt = $pdo->prepare("SELECT DISTINCT package, timestamp 
                            FROM actions 
                            WHERE uid = :uid AND active = 1 AND expiretime = '1000-01-01 00:00:00' 
                            AND package != 0 
                            ORDER BY timestamp DESC LIMIT 5");
        $stmt->execute([':uid' => $steamId]);
        $packages = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        // If no packages found, return a message
        if (!$packages) {
            return ['You have none!'];
        }

        // Fetch the titles of the permanent packages
        $permanentPackages = [];
        foreach ($packages as $pack) {
            $permStmt = $pdo->prepare("SELECT title FROM packages WHERE id = :id AND permanent = 1");
            $permStmt->execute([':id' => $pack['package']]);
            $packageData = $permStmt->fetch(PDO::FETCH_ASSOC);
            if ($packageData) {
                $permanentPackages[] = $packageData['title'];
            }
        }

        return $permanentPackages;
    }


    function getAdditionalUsernames($steamId64) {
        // Connect to the sourcebans database and retrieve usernames
        $pdoSourcebans = DatabaseConnector::getDatabase("igfastdl_sourcebans");

        // Map possibilities bc it may be steam_0 or steam_1
        $accountID = bcsub($steamId64, '76561197960265728');
        $steamId1 = 'STEAM_1:'.bcmod($accountID, '2').':'.bcdiv($accountID, 2);
        $steamId0 = 'STEAM_0:'.bcmod($accountID, '2').':'.bcdiv($accountID, 2);
        $steamIdArray =  array($steamId0, $steamId1);
        $stmtSourcebans = $pdoSourcebans->prepare('SELECT user FROM sb_admins WHERE authid IN (?, ?)');
        $stmtSourcebans->execute($steamIdArray);
        $sourcebansUsernames = $stmtSourcebans->fetchAll(PDO::FETCH_COLUMN);
    
        return $sourcebansUsernames;
    }

    function getAssociatedEmails($steamId64) {
        // Map possibilities bc it may be steam_0 or steam_1
        $accountID = bcsub($steamId64, '76561197960265728');
        $steamId1 = 'STEAM_1:'.bcmod($accountID, '2').':'.bcdiv($accountID, 2);
        $steamId0 = 'STEAM_0:'.bcmod($accountID, '2').':'.bcdiv($accountID, 2);
        $steamIdArray =  array($steamId0, $steamId1);        
        // Connect to the sourcebans database and retrieve emails
        $pdoSourcebans = DatabaseConnector::getDatabase("igfastdl_sourcebans");
        $stmtSourcebans = $pdoSourcebans->prepare('SELECT email FROM sb_admins WHERE authid IN (?, ?)');
        $stmtSourcebans->execute($steamIdArray);
        $sourcebansEmails = $stmtSourcebans->fetchAll(PDO::FETCH_COLUMN);
    
        // Retrieve emails from the donations database
        $pdoDonate = DatabaseConnector::getDatabase("igfastdl_donate");
        $stmtDonate = $pdoDonate->prepare('SELECT email, uid, buyer_uid FROM transactions WHERE uid = :uid OR buyer_uid = :buyer_uid');
        $stmtDonate->execute([':uid' => $steamId64, ':buyer_uid' => $steamId64]);
        $donateTransactions = $stmtDonate->fetchAll(PDO::FETCH_ASSOC);

        // Process the transactions to associate emails correctly
        foreach ($donateTransactions as $transaction) {
            if (!empty($transaction['buyer_uid']) && $transaction['buyer_uid'] != $steamId64) {
                // This email belongs to the buyer
                $uniqueEmails[$transaction['buyer_uid']] = $transaction['email'];
            } else {
                // This email belongs to the recipient of the package
                $uniqueEmails[$transaction['uid']] = $transaction['email'];
            }
        }

        // Merge and remove duplicates
        $allEmails = array_unique(array_merge($sourcebansEmails, array_values($uniqueEmails)));

        return $allEmails;

    }

    // Get the steamId 64
    $steamId = $userProfile['steam_id']; 
    $mainUsername = $userProfile['username'];
    $additionalUsernames = getAdditionalUsernames($userProfile['steam_id_64']);
    $associatedEmails = getAssociatedEmails($userProfile['steam_id_64']);
    
    // Get the user titles
    $rawTitles = getUserTitles($steamId);
    $userTitles = formatUserTitles($rawTitles);

    $processedTitles = array_map('mapColorCodesToStyles', $userTitles);

    // Get the user role
    $userRole = getUserRole($userProfile['steam_id_64']);
    if ($userRole === '') {
        $userRole = "None listed";
    }

    // Get the user's permanent packages
    $permanentPackages = getPermanentPackages($userProfile['steam_id_64']);


    ?>