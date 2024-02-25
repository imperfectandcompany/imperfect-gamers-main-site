<?php
/*
TODO: FIX GLITCH WHERE THE MAP IS SELECTED BUT IF GLOBAL IS CLICKED, IT STILL SHOWS POINTS AS SELECTED WITH IT AT THE SAME TIME
*/
?>
<section class="mx-auto text-white" x-data="mapSearch()">
    <div class="flex flex-col lg:flex-row">
        <!-- Left Sidebar -->
        <div class="lg:w-1/4 p-6 border-r border-red-600/50 border-b lg:border-b-0">
            <!-- Tab Buttons -->
            <div class="flex items-center mb-6">
                <div>
                    <a @click="tab = 'global'" class="text-2xl font-bold text-red-200 mr-3 select-none"
                        x-bind:class="{ 'transition opacity-20 hover:opacity-80 cursor-pointer': tab === 'maps' }">Global</a>
                </div>
                <div>
                    <a @click="tab = 'maps'" class="text-2xl font-bold text-red-200 mr-3 select-none"
                        x-bind:class="{ 'transition opacity-20 hover:opacity-80 cursor-pointer': tab === 'global' }">Maps</a>
                </div>
            </div>

            <!-- Search and Maps List -->
            <div class="transition-all" x-show="tab === 'maps'" x-transition:enter-start="opacity-0 transform scale-90">


                <div class="text-white">
                    <label class="flex flex-col relative group">
                        <input type="text" x-model="search" @focus="focused = true" @blur="focused = false"
                        placeholder=" "
                        class="border-2 border-black bg-black/20 pl-4 pr-10 py-2 text-white w-full rounded-md focus:outline-none transition"
                            placeholder=" ">
                        <span x-show="!search && !focused" x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="absolute text-md pointer-events-none transform left-4 top-2 transition-all duration-300 ease-in-out text-white/60"
                            :class="{'-translate-y-6 text-xs': focused || search, 'top-2': !focused && !search}">
                            Search maps...
                        </span>
                        <button type="button" x-show="search" @click="search = ''"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 focus:outline-none">
                            <!-- Custom icon, e.g., an 'X' or similar. You can replace the SVG with any icon you prefer -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </label>
                </div>


                <!-- Maps list -->
                <div class="flex flex-col overflow-y-auto sidebar-maps-list" style="max-height: 80vh;">
    <template x-for="map in sortedAndFilteredMaps" :key="map">
        <a :href="`/stats/map/${encodeURI(map)}`"
           :class="mapClass(map, currentMap)"
           x-html="highlight(map, search)">
        </a>
    </template>
</div>
            </div>

            <!-- Global Options List -->
            <div class="flex flex-col space-y-1 overflow-y-auto sidebar-maps-list" x-show="tab === 'global'"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:enter="transition ease-out duration-300" style="max-height: 80vh; display: none;"
                x-transition x-cloak>
                <a href="/stats/global/points"
                    class="py-2 transition px-4 text-gray-300 hover:text-white hoverable <?= (!isset($GLOBALS['url_loc'][3]) || $GLOBALS['url_loc'][3] == 'points') ? 'text-red-600 bg-black/50 hover:opacity-20' : 'opacity-75' ?>">
                    Points
                </a>
                <a href="/stats/global/latest-players"
                    class="py-2 transition px-4 text-gray-300 hover:text-white hoverable <?= (isset($GLOBALS['url_loc'][3]) && $GLOBALS['url_loc'][3] == 'latest-players') ? 'text-red-600 bg-black/50 hover:opacity-20' : 'opacity-75' ?>">
                    Latest Players
                </a>
                <a href="/stats/global/latest-records"
                    class="py-2 transition px-4 text-gray-300 hover:text-white hoverable <?= (isset($GLOBALS['url_loc'][3]) && $GLOBALS['url_loc'][3] == 'latest-records') ? 'text-red-600 bg-black/50 hover:opacity-20' : 'opacity-75' ?>">
                    Latest Records
                </a>
            </div>
        </div>
        <!-- Main Content -->
        <div class="lg:w-3/4 p-6 overflow-hidden">
            <div class="flex justify-between items-baseline">
                <div class="w-full">
                    <?php if (!$errorFlag): ?>
                        <!-- Breadcrumbs -->
                        <nav aria-label="breadcrumb">
                            <ol class="flex flex-wrap gap-2 mb-4">
                                <?php foreach ($breadcrumbs as $index => $breadcrumb): ?>
                                    <li class="flex items-center">
                                        <?php if ($breadcrumb['url']): ?>
                                            <a href="<?= htmlspecialchars($breadcrumb['url']) ?>"
                                                class="text-sm font-medium text-gray-500 hover:text-gray-900 transition-colors">
                                                <?= htmlspecialchars($breadcrumb['title']) ?>
                                            </a>
                                        <?php else: ?>
                                            <!-- If 'url' is null, display as non-clickable text -->
                                            <span class="text-sm font-medium text-gray-700 select-none">
                                                <?= htmlspecialchars($breadcrumb['title']) ?>
                                            </span>
                                        <?php endif; ?>

                                        <?php if ($index < count($breadcrumbs) - 1): ?>
                                            <!-- Separator for breadcrumb items -->
                                            <svg class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ol>
                        </nav>
                    <?php endif; ?>

                    <!-- Title -->
                    <h1 class="font-bold text-lg md:text-xl lg:text-2xl mb-4">
                        <?php echo $statsTitle; ?>
                    </h1>
                </div>

                <div class="w-full">
                    <!-- Search Form -->
                    <div class="flex justify-end w-full lg:w-auto">
                        <form onsubmit="performSearch(event)" class="relative">
                            <input type="text" id="searchInput" placeholder="Search by name..." value=""
                                class="search-input rounded-full pl-4 pr-8 py-1 focus:outline-none focus:bg-black/50">
                            <button type="submit"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            // Check if a map is selected and if bonuses are available for it.
            if (isset($mapName) && !empty($bonuses = fetchMapBonuses($mapName))) {
                // Remove the base map name from the bonus map names
                $bonuses = array_map(function ($bonus) use ($mapName) {
                    return str_replace($mapName . '_bonus', '', $bonus['MapName']);
                }, $bonuses);
                ?>
                <div class="bonus-selection mb-2">
                    <!-- Display a button to go back to the main map -->
                    <a href="/stats/map/<?= urlencode($mapName) ?>"
                        class="bonus-button <?= !isset($bonusNumber) ? 'bg-red-600/50 text-white cursor-pointer font-semibold hover:bg-black hover:text-white hover:ring hover:ring-red-600/50 hover:bg-black/20 transition duration-300 inline-flex items-center justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2"' : 'bg-black/20 cursor-pointer text-white font-semibold hover:bg-red-600/50 hover:text-white hover:ring hover:ring-red-600 transition duration-300 inline-flex items-center justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2' ?>">Main</a>
                    <?php foreach ($bonuses as $bonusNum): ?>
                        <a href="/stats/map/<?= urlencode($mapName) ?>/bonus/<?= $bonusNum ?>"
                            class="bonus-button <?= (isset($bonusNumber) && $bonusNumber == $bonusNum) ? 'bg-red-600/50 text-white cursor-pointer font-semibold hover:bg-black hover:text-white hover:ring hover:ring-red-600/50 hover:bg-black/20 transition duration-300 inline-flex items-center justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2' : 'bg-black/20 cursor-pointer text-white font-semibold hover:bg-red-600/50 hover:text-white hover:ring hover:ring-red-600 transition duration-300 inline-flex items-center justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2' ?>">Bonus
                            <?= $bonusNum ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                <?php
            }
            ?>
            <div class="relative -mb-px h-px w-full bg-gradient-to-r from-transparent via-red-300 to-transparent"></div>
            <div class="bg-black/50 shadow rounded-lg p-6 text-white flex flex-col">
                <div class="grid grid-cols-3 gap-4 mb-4 px-4 py-2 border-b-2 border-red-600">
                    <div class="text-sm font-semibold text-gray-200">
                        <?php
                        if (isset($mapName)) {
                            echo 'RANK';
                        } elseif (isset($globalType)) {
                            switch ($globalType) {
                                case 'points':
                                    echo 'RANK';
                                    break;
                                case 'latest-players':
                                    echo 'RANK';
                                    break;
                                case 'latest-records':
                                    echo 'RUN TIME';
                                    break;
                                // Add additional cases for other global types if needed
                            }
                        } else {
                            // Default to POINTS if nothing is set
                            echo 'RANK';
                        }
                        ?>
                    </div>
                    <div class="text-sm font-semibold text-gray-200">NAME</div>
                    <div class="text-sm font-semibold text-gray-200">
                        <?php
                        if (isset($mapName)) {
                            echo 'TIME';
                        } elseif (isset($globalType)) {
                            switch ($globalType) {
                                case 'points':
                                    echo 'POINTS';
                                    break;
                                case 'latest-players':
                                    echo 'LAST SEEN';
                                    break;
                                case 'latest-records':
                                    echo 'LAST RECORD';
                                    break;
                            }
                        } else {
                            // Default to POINTS if nothing is set
                            echo 'POINTS';
                        }
                        ?>
                    </div>

                </div>
                <?php
                // Check if a 'page' query parameter is set and is numeric, otherwise default to the current page
                $pageParam = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : $current_page;

                if (!$errorFlag) {
                    // Code to render records and other operations
                    if (!empty($topPlayers)) {
                        // Display player data
                        foreach ($topPlayers as $index => $player) {
                            $userID = getUserIDBySteamID64($player['SteamID']);
                            $rank = ($current_page - 1) * $playersPerPage + ($index + 1);

                            // Get global rank only when a search is performed
                            // Update the ternary operation to include getPlayerLastJoinedRank
                            $globalRank = ($searchTerm && isset($player['GlobalPoints'])) ? getPlayerRank($player['PlayerName']) :
                                (($searchTerm && $mapName) ? getPlayerMapRank($player['PlayerName'], $mapName) :
                                    (($searchTerm && isset($_GET['global']) && $_GET['global'] == 'latest-players') ? getPlayerLastJoinedRank($player['PlayerName']) : $rank));


                            if ($mapName) {
                                // Display formatted time for map-specific records
                                $timeDisplay = htmlspecialchars($player['FormattedTime'] ?? 'N/A');
                            } else {
                                if (isset($player['GlobalPoints'])) {
                                    // Display global points for global leaderboard
                                    $timeDisplay = htmlspecialchars($player['GlobalPoints']) . ' pts';
                                } elseif (isset($player['LastConnected'])) {
                                    // Format the timestamp to a human-readable format
                                    $timeDisplay = time_elapsed_string(htmlspecialchars($player['LastConnected']));

                                } elseif (isset($player['UnixStamp'])) {
                                    // Format the Unix timestamp to a human-readable format
                                    $timeDisplay = $player['MapName'] . ' ' . time_elapsed_string(htmlspecialchars($player['UnixStamp']));
                                }
                            }

                            // Define the classes for color coding the top player
                            $bgColorClass = $globalRank === 1 && !isset($player['UnixStamp']) && !isset($player['LastConnected']) ? 'bg-yellow-100' : '';
                            $rankColorClass = $globalRank === 1 && !isset($player['UnixStamp']) && !isset($player['LastConnected']) ? 'text-yellow-600' : 'text-gray-400';
                            $nameColorClass = $globalRank === 1 && !isset($player['UnixStamp']) && !isset($player['LastConnected']) ? 'text-gray-800' : 'text-gray-400';
                            $pointsColorClass = $globalRank === 1 && !isset($player['UnixStamp']) && !isset($player['LastConnected']) ? 'text-gray-800' : 'text-gray-400';

                            echo '<div class="grid grid-cols-3 gap-4 mb-4 px-4 py-2 ' . $bgColorClass . ' rounded-lg">';

                            // Define how to display the rank or time based on the context
                            $displayValue = '';
                            if (isset($_GET['global']) && $_GET['global'] == 'latest-records') {
                                // For latest-records, display the formatted time
                                $displayValue = htmlspecialchars($player['FormattedTime'] ?? 'N/A');
                            } else {
                                // In other cases, display the rank
                                $displayValue = $globalRank;
                            }

                            // Then use $displayValue where you previously used $globalRank for output
                            echo '<div class="text-sm font-semibold ' . $rankColorClass . '">' . $displayValue . '</div>';


                            if ($userID) {
                                echo '<div class="text-sm font-semibold ' . $nameColorClass . '"><a href="https://imperfectgamers.org/profile/' . htmlspecialchars($userID) . '" target="_blank">' . htmlspecialchars($player['PlayerName']) . ' <i class="fas fa-external-link-alt" style="font-size:0.75em;"></i></a></div>';
                            } else {
                                echo '<div class="text-sm font-semibold ' . $nameColorClass . '">' . htmlspecialchars($player['PlayerName']) . '</div>';
                            }
                            echo '<div class="text-sm font-semibold ' . $pointsColorClass . '">' . $timeDisplay . '</div>';
                            echo '</div>';
                        }
                    }
                } else {
                    // Since we have an error, we don't render records
                    // Output the error message or handle it as needed
                    echo '<div class="text-center py-6">';
                    echo '<p class="text-lg text-gray-400">' . htmlspecialchars($errorMsg) . '</p>';
                    // TODO: Setup dynamic backlinking echo '<a href="/stats/global/points" class="mt-4 inline-block bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 transition-colors">Return to Leaderboard</a>';
                    echo '</div>';
                }
                ?>
            </div>

            <div>
                <?php
                if (!$errorFlag && isset($totalPages) && isset($totalRecords)) {
                    $window = 2;
                    echo '<div class="flex flex-col justify-between md:flex-row md:justify-between md:flex-row-reverse items-center mt-4">';
                    echo '<div class="flex flex-wrap items-center space-x-1 mb-4">';

                    // Base URL construction using global types or map names
                    $baseURLSegments = ['/stats'];
                    if ($mapName) {
                        $baseURLSegments[] = 'map';
                        $baseURLSegments[] = urlencode($mapName);
                        if ($bonusNumber !== null) {
                            $baseURLSegments[] = 'bonus';
                            $baseURLSegments[] = $bonusNumber;
                        }
                    } elseif ($globalType) {
                        $baseURLSegments[] = 'global';
                        $baseURLSegments[] = urlencode($globalType);
                    }

                    if ($searchTerm) {
                        $baseURLSegments[] = 'search';
                        $baseURLSegments[] = urlencode($searchTerm);
                    }

                    // Construct the base URL from segments
                    $baseURL = implode('/', $baseURLSegments);
                    $baseURL .= '/page/';

                    // Link to the first page
                    if ($current_page > 1 + $window) {
                        echo '<a href="' . $baseURL . '1" class="rounded-full px-3 py-1 text-white bg-[#6b0202] hover:bg-red-700 transition-colors duration-200">1</a>';
                        if ($current_page > 2 + $window) {
                            echo '<span class="px-3 py-1">...</span>';
                        }
                    }

                    // Loop through pages for the windowed pagination
                    for ($i = max($current_page - $window, 1); $i <= min($current_page + $window, $totalPages); $i++) {
                        $activeClass = $current_page == $i ? 'bg-red-600' : 'bg-[#6b0202]';
                        echo '<a href="' . $baseURL . $i . '" class="rounded-full px-3 py-1 text-white hover:bg-red-700 transition-colors duration-200 ' . $activeClass . '">' . $i . '</a>';
                    }

                    // Link to the last page
                    if ($current_page < $totalPages - $window) {
                        if ($current_page < $totalPages - $window - 1) {
                            echo '<span class="px-3 py-1">...</span>';
                        }
                        echo '<a href="' . $baseURL . $totalPages . '" class="rounded-full px-3 py-1 text-white bg-[#6b0202] hover:bg-red-700 transition-colors duration-200">' . $totalPages . '</a>';
                    }

                    // Closing div tags
                    echo '</div>';
                    echo '<div class="mb-4 md:mb-0"><span class="text-sm text-gray-400">Total records: ' . htmlspecialchars($totalRecords) . '</span></div>';
                    echo '</div>';
                }
                ?>
            </div>


        </div>
        <script>
            function performSearch(e) {
                e.preventDefault(); // Prevent the form from submitting in the traditional way
                const searchInput = document.getElementById('searchInput').value.trim();
                if (searchInput) {
                    // Construct the search URL based on the current path and the search term
                    const basePath = window.location.pathname.split('/search')[0]; // Ensures we remove any existing search term from the URL
                    const basePathRefined = basePath.split('/page')[0]; // Ensures we remove any existing page from the URL
                    const searchURL = `${basePathRefined}/search/${encodeURIComponent(searchInput)}`;
                    window.location.href = searchURL; // Redirect to the constructed search URL
                }
            }
        </script>
<script>
    function mapSearch() {
        return {
            tab: '<?= (isset($GLOBALS['url_loc'][2]) && $GLOBALS['url_loc'][2] === 'map') ? 'maps' : 'global' ?>',
            currentMap: '<?= $GLOBALS['url_loc'][3] ?? '' ?>', // This should be the map name from the URL
            search: '',
            focused: false,
            maps: <?php echo json_encode(array_column($maps, 'MapName')); ?>,
            get sortedAndFilteredMaps() {
                const searchLower = this.search.toLowerCase();
                return this.maps.sort((a, b) => {
                    const aIncludes = a.toLowerCase().includes(searchLower);
                    const bIncludes = b.toLowerCase().includes(searchLower);
                    if (aIncludes && !bIncludes) return -1;
                    if (!aIncludes && bIncludes) return 1;
                    return a.localeCompare(b);
                });
            },
            mapClass(map, currentMap) {
                const isActive = map === currentMap;
                const isMatched = map.toLowerCase().includes(this.search.toLowerCase());
                return {
                    'block py-2 px-4 transition-all transform cursor-pointer': true,
                    'bg-black/50 text-red-600 hover:opacity-20': isActive,
                    'opacity-75': !isActive,
                    'font-bold': this.search !== '' && isMatched,
                    'opacity-25': this.search !== '' && !isMatched,
                };
            },
            highlight(map, search) {
                if (!search) return map;
                const re = new RegExp(search, 'gi');
                return map.replace(re, match => `<span class="bg-yellow-400/50">${match}</span>`);
            },
        };
    }
</script>

    </div>
</section>