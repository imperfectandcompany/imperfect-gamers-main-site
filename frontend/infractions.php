<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

    .search-user-input label {
        color: white;
        margin-bottom: .5rem;
    }

    [x-cloak] {
        display: none !important;
    }

    .border-card {
        border: 1px solid #ff0000;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        background: rgba(0, 0, 0, 0.9);
    }

    .search-user-input input {
        width: 100%;
        background-color: rgba(255, 0, 0, 0.05);
        border: 1px solid #ff0000;
        color: white;
        padding: 10px;
        margin-bottom: 1rem;
        border-radius: 5px;
    }

    .search-user-input .dropdown {
        position: absolute;
        z-index: 50;
        width: 100%;
        background: rgba(0, 0, 0, 0.9);
        border: 1px solid #ff0000;
        border-top: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        color: white;
        top: 100%;
        left: 0;
        right: 0;
        overflow-y: auto;
        max-height: 200px;
    }



    .no-users-found {
        color: #ff0000;
        padding: 0.5rem;
        text-align: center;
    }

    .border-connect-dropdown {
        border-bottom: none;
        border-bottom-left-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }

    .input-wrapper {
        position: relative;
    }

    .dropdown-enter-active,
    .dropdown-leave-active {
        transition: opacity 0.5s;
    }

    .dropdown-option:focus,
    .dropdown-option:hover {
        outline: none;
        background-color: rgba(255, 69, 0, 0.2);
    }

    .dropdown-enter,
    .dropdown-leave-to {
        opacity: 0;
    }

    /* Styling for the navigation tabs */
    nav button {
        transition: background-color 0.3s ease;
    }

    /* Update to the navigation buttons for better visibility and interaction feedback */
    nav button:hover {
        background-color: rgba(255, 255, 255, 0.25);
        color: #FFF;
    }

    .icon-box {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 0.25rem;
    }

    nav button.active {
        background-color: rgba(255, 0, 0, 0.5);
        border: 1px solid red;
    }

    .skeleton {
        animation: skeleton-loading 1s linear infinite alternate;
    }

    @keyframes skeleton-loading {
        0% {
            background-color: hsl(200, 20%, 70%);
        }

        100% {
            background-color: hsl(200, 20%, 95%);
        }
    }

    .infraction-ban {
        color: #ef4444;
    }

    .infraction-mute {
        color: #facc15;
    }

    .infraction-gag {
        color: #22c55e;
    }

    .expired {
        text-decoration: line-through;
    }

    .pagination {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        list-style: none;
        padding: 0;
        gap: 0.5rem;
    }

    .pagination li {
        margin: 0;
    }

    .pagination li a {
        color: white;
        text-decoration: none;
        padding: 0.5rem 0.75rem;
        border: 1px solid #ffffff50;
        border-radius: 5px;
    }

    .pagination li a:hover,
    .pagination li a.active {
        background-color: #ffffff50;
    }




    .entries-dropdown {
            position: absolute;
            z-index: 50;
            background: rgba(0, 0, 0, 0.9);
            border: 1px solid #ff0000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            color: white;
            top: 100%;
            left: 0;
            overflow-y: auto;
            max-height: 200px;
            min-width: 150px; /* Adjust as needed to match button's width */
        }

.show-entries-container {
    display: flex;
    align-items: center;
    position: relative;
}


        .show-entries-button {
            background-color: rgba(255, 0, 0, 0.05);
            border: 1px solid #ff0000;
            color: white;
            padding: 10px;
            margin-bottom: 1rem;
            border-radius: 5px;
            transition: all 0.3s ease-in-out; /* Smooth transition for dropdown */
        }

        .show-entries-button:hover {
            background-color: rgba(255, 0, 0, 0.1); /* Slightly darker on hover */
        }

        .show-entries-button:focus {
            outline: none;
            border-color: #ff0000;
            box-shadow: 0 0 0 2px rgba(255, 0, 0, 0.5);
        }

        .show-entries-button .fa-chevron-down {
            transition: transform 0.3s ease-in-out; /* Smooth rotation for caret */
        }

        .show-entries-button.open .fa-chevron-down {
            transform: rotate(180deg); /* Rotate caret when dropdown is open */
        }

        .entries-dropdown-option:hover,
        .entries-dropdown-option.active {
            background-color: rgba(255, 69, 0, 0.2); /* Highlight for active/selected option */
        }

    /* Responsive styling for the navigation tabs */
    @media (max-width: 768px) {
        .tab-nav {
            overflow-x: auto;
            white-space: nowrap;
        }

        .tab-nav button {
            flex: 0 0 auto;
        }
    }
</style>























<div x-cloak x-data="{ showModal: false, modalTitle: '', modalContent: '' }" @keydown.window.escape="showModal = false"
    class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white/85">






































    <!-- Header -->
    <header class="flex justify-between items-center py-6">
        <div class="flex items-center space-x-4">
            <img src="https://placehold.co/150x50" alt="Imperfect Gamers Logo" class="h-10">
            <nav class="hidden md:flex space-x-4">
                <a href="#" class="text-gray-300 hover:text-white">Servers</a>
                <a href="#" class="text-gray-300 hover:text-white">Community</a>
                <a href="#" class="text-gray-300 hover:text-white">Store</a>
                <a href="#" class="text-gray-300 hover:text-white">Stats</a>
                <a href="#" class="text-gray-300 hover:text-white">Infractions</a>
                <a href="#" class="text-gray-300 hover:text-white">Support</a>
            </nav>
        </div>
        <div class="flex items-center space-x-4">
            <a href="#" class="text-gray-300 hover:text-white">
                <div class="icon-box">
                    <i class="fas fa-search"></i>
                </div>
            </a>
            <a href="#" class="text-gray-300 hover:text-white">
                <div class="icon-box">
                    <i class="fas fa-user"></i>
                </div>
            </a>
            <a href="#" class="text-gray-300 hover:text-white">Sign in</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-16 max-w-screen-xl px-3 pb-12 mx-auto md:px-6 z-20">
        <div class="flex flex-col md:flex-row md:space-x-6">
            <!-- Left Column -->
            <div class="md:w-3/4">
                <!-- Breadcrumb -->
                <nav class="text-gray-400 mb-4" aria-label="Breadcrumb">
                    <ol class="list-none p-0 inline-flex">
                        <li class="flex items-center">
                            <a href="https://imperfectgamers.org/" class="text-gray-500">Imperfect Gamers</a>
                            <span class="mx-2">></span>
                        </li>
                        <li class="flex items-center">
                            <a href="https://imperfectgamers.org/infractions" class="text-gray-400 hover:text-white"
                                aria-current="page">Infractions</a>
                        </li>
                    </ol>
                </nav>

                <h1 class="text-3xl font-bold mb-4">Infractions</h1>
                <p class="text-gray-400 mb-6">Review your bans, mutes, and other infractions within the Imperfect Gamers
                    network.</p>


                <div class="relative -mb-px h-px w-full bg-gradient-to-r from-transparent via-red-600 to-transparent">
                </div>
                <!-- Tabs for navigation -->
                <nav class="flex overflow-x-auto space-x-1 bg-black/30 p-2 rounded">
                    <button class="px-3 py-1 rounded text-white active select-none whitespace-nowrap">Overview</button>
                    <button class="px-3 py-1 rounded text-white whitespace-nowrap"
                        @click="showModal = true; modalTitle = 'Bans - Under Construction'; modalContent = 'Our ban review feature is hammering out some final details. Stay tuned for updates!'">Bans</button>
                    <button class="px-3 py-1 rounded text-white whitespace-nowrap"
                        @click="showModal = true; modalTitle = 'Mutes - On Mute for Now'; modalContent = 'We\'re fine-tuning the strings to ensure everything sounds right. Check back later!'">Mutes</button>
                    <button class="px-3 py-1 rounded text-white whitespace-nowrap"
                        @click="showModal = true; modalTitle = 'Gags - Sealed Lips for a Bit'; modalContent = 'This feature is zipped up tight as we\'re adding the finishing touches. We appreciate your patience!'">Gags</button>
                    <button class="px-3 py-1 rounded text-white whitespace-nowrap"
                        @click="showModal = true; modalTitle = 'Appeals - Need Help?'; modalContent = 'For now, head over to our <a href=\'https://imperfectgamers.org/discord/\' class=\'text-blue-400 hover:text-blue-600\'>Discord</a> or directly to the <a href=\'https://discord.com/channels/193909594270072832/641373370944061451\' class=\'text-blue-400 hover:text-blue-600\'>#ban-appeals</a> channel to sort out appeals. We\'re working on bringing this feature directly to you here, so stay tuned!'">Appeal</button>
                </nav>
                <div
                    class="relative -mb-px h-px w-full bg-gradient-to-r from-transparent via-red-600/20 to-transparent">
                </div>

                <div class="flex space-x-4 mt-6">
                    <div class="w-full">
                        <div x-data="searchUserApp()" class="search-user-input bg-black/50 p-1 rounded">
                            <!-- Input for reported user's name with search functionality -->
                            <div @click.away="handleClickAway($event)" class="relative mb-4">
                                <label for="searchedUsers" class="block text-sm font-medium text-white">Search by
                                    SteamID
                                    or
                                    Name</label>
                                <input type="text" id="searchedUsers" name="searchedUsers" x-model="searchQuery"
                                    @focus="handleFocus"
                                    class="mt-1 block w-full rounded-md bg-black/60 border-gray-700 text-white"
                                    :class="{'border-connect-dropdown': showDropdown}"
                                    placeholder="Search for a user..."
                                    @click="showModal = true; modalTitle = 'Feature Coming Soon'; modalContent = 'This feature is currently under development. Thank you for your patience.';"
                                    readonly>


                                <div x-show="showDropdown" class="dropdown" x-transition>
                                    <ul ref="dropdownMenu">
                                        <template x-for="user in filteredUsers" :key="user">
                                            <li @click="selectUser(user)" class="p-2 hover:bg-black/80 dropdown-option"
                                                x-text="user" x-bind:class="{ 'cursor-pointer': !disableCursorPointer }"
                                                tabindex="0"></li>
                                        </template>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Infractions Table -->
                <div class="border-t-[1px] border-[#323232] mt-1 pt-2 text-sm mb-3">
                    <div class="overflow-x-auto bg-[#242424]/60 rounded-md">
                        <table
                            class="w-full table-auto whitespace-nowrap bg-[#242424]/60 overflow-hidden overflow-x-auto m-0">
                            <thead>
                                <tr>
                                    <th class="text-left text-white px-4 py-2">User</th>
                                    <th class="text-left text-white px-4 py-2">Admin</th>
                                    <th class="text-left text-white px-4 py-2">Reason</th>
                                    <th class="text-left text-white px-4 py-2">Type</th>
                                    <th class="text-left text-white px-4 py-2">Status</th>
                                    <th class="text-left text-white px-4 py-2">Ends</th>
                                </tr>
                            </thead>
                            <tbody id="infractions-table-body">
                                <!-- Dynamic rows will be inserted here -->
                                <template x-for="i in 10" :key="i">
                                    <tr
                                        class="bg-opacity-45 hover:brightness-125 transition duration-300 cursor-pointer">
                                        <template x-for="j in 6" :key="j">
                                            <td class="text-left text-slate-200 px-4 py-2">
                                                <!-- Your dynamic cell content goes here -->
                                                <div class="h-4 bg-slate-700 animate-pulse rounded"></div>
                                            </td>
                                        </template>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Pagination -->
                <!-- Pagination and Record Count -->
                <div class="flex justify-between items-center mt-6">
                    <div class="text-gray-400">
                        Showing <span id="records-start"><span
                                class="bg-slate-700 animate-pulse rounded px-2 py-0"></span></span>-<span
                            id="records-end"><span class="bg-slate-700 animate-pulse rounded px-2 py-0"></span></span>
                        records out of <span id="records-total"><span
                                class="ml-1 bg-slate-700 animate-pulse rounded px-2 py-0"></span></span>
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination" id="pagination">
                            <!-- Pagination will be populated by the script -->
                        </ul>
                    </nav>
                </div>

                <div x-data="{ open: false, selected: 10 }" class="show-entries-container relative my-4">
                    <label for="show-entries-button" class="text-gray-400 mr-2">Show entries:</label>
                    <div class="relative flex flex-col">
                    <button @click="open = !open" id="show-entries-button"
                        class="show-entries-button focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                        <span x-text="selected"></span>
                        <i class="fas fa-chevron-down ml-2" :class="{ 'open': open }"></i>
                    </button>
                    <div x-show="open" @click.away="open = false" x-cloak class="entries-dropdown"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95" style="display: none;">
                        <ul>
                            <li class="px-4 py-1 entries-dropdown-option" :class="{ 'active': selected === 10 }"
                                @click="selected = 10; open = false; $dispatch('entries-changed', 10)">10</li>
                            <li class="px-4 py-1 entries-dropdown-option" :class="{ 'active': selected === 20 }"
                                @click="selected = 20; open = false; $dispatch('entries-changed', 20)">20</li>
                            <li class="px-4 py-1 entries-dropdown-option" :class="{ 'active': selected === 50 }"
                                @click="selected = 50; open = false; $dispatch('entries-changed', 50)">50</li>
                            <li class="px-4 py-1 entries-dropdown-option" :class="{ 'active': selected === 100 }"
                                @click="selected = 100; open = false; $dispatch('entries-changed', 100)">100</li>
                        </ul>
                    </div>
</div>
                </div>


            </div>

            <!-- Right Column -->
            <div class="md:w-1/4 space-y-6">
                <!-- Infraction Types -->
                <div>
                    <h2 class="text-xl font-bold mb-2 flex items-center">
                        <div class="icon-box mr-2 bg-red-500">
                            <i class="fas fa-gavel text-white"></i>
                        </div>
                        Infraction Types
                    </h2>
                    <div class="bg-black/30 p-4 rounded">
                        <ul class="space-y-2">
                            <li><span class="icon-box bg-red-500 mr-2"></span>BAN - user is banned from the server
                            </li>
                            <li><span class="icon-box bg-yellow-500 mr-2"></span>MUTE - user is muted in voice chat
                            </li>
                            <li><span class="icon-box bg-green-500 mr-2"></span>GAG - user is gagged in text chat</li>
                        </ul>
                    </div>
                </div>
                <!-- Infraction Count -->
                <div>
                    <h2 class="text-xl font-bold mb-2 flex items-center">
                        <div class="icon-box mr-2">
                            <i class="fas fa-gavel"></i>
                        </div>
                        Infraction Count
                    </h2>
                    <div class="bg-black/30 p-4 rounded">
                        <div class="flex justify-between items-center mb-2">
                            <span>Total</span>
                            <span id="total-count">
                                <div class="h-2 bg-slate-700 animate-pulse rounded px-3 py-2"></div>
                            </span>
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            <span>Active</span>
                            <span id="active-count">
                                <div class="h-2 bg-slate-700 animate-pulse rounded px-3 py-2"></div>
                            </span>
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            <span>Expired</span>
                            <span id="expired-count">
                                <div class="h-2 bg-slate-700 animate-pulse rounded px-3 py-2"></div>
                            </span>
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            <span>Bans</span>
                            <span id="bans-total">
                                <div class="h-2 bg-slate-700 animate-pulse rounded px-3 py-2"></div>
                            </span>
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            <span>Mutes</span>
                            <span id="mutes-total">
                                <div class="h-2 bg-slate-700 animate-pulse rounded px-3 py-2"></div>
                            </span>
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            <span>Gags</span>
                            <span id="gags-total">
                                <div class="h-2 bg-slate-700 animate-pulse rounded px-3 py-2"></div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed text-white/95 inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex justify-center items-center">
            <div @click.away="showModal = false"
                class="bg-black/50 border-card rounded-lg shadow-lg p-5 w-full max-w-md mx-4 md:mx-0">
                <h2 x-text="modalTitle" class="text-xl font-bold"></h2>
                <p x-text="modalContent" x-html="modalContent" class="mt-4"></p>
                <div class="mt-5 flex justify-end">
                    <button @click="showModal = false"
                        class="transition-all px-2 py-1 text-sm bg-gray-500 border-card text-white rounded hover:bg-red-800 sm:px-4 sm:py-2 sm:text-base">
                        Close</button>
                </div>
            </div>
        </div>

    </main>
</div>

<script>

    let currentPage = 1; // Maintain the current page state
    let currentPerPage = 10; // Maintain the current page state

    // Fetch infractions from the API and populate the table
    function fetchInfractions(page = currentPage, perPage = currentPerPage) {
        currentPage = page; // Update the current page
        currentPerPage = perPage; // Update the current page

        const endpoint = page === 1
            ? `https://api.imperfectgamers.org/infractions/pp/${perPage}`
            : `https://api.imperfectgamers.org/infractions/p/${page}/pp/${perPage}`;
        fetch(endpoint)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {

                    // Handle pagination
                    const totalPages = data.pagination.totalPages;

                    // If the current page is greater than the new total pages, set it to the last page
                    if (page > totalPages) {
                        page = totalPages;
                    }

                    const tableBody = document.getElementById('infractions-table-body');
                    const pagination = document.getElementById('pagination');



                    // Clear the skeleton rows
                    tableBody.innerHTML = '';
                    pagination.innerHTML = '';

                    data.results.forEach(infraction => {
                        const tr = document.createElement('tr');
                        tr.classList.add('bg-black/50', 'border-b', '!text-gray-100', 'border-gray-700');
                        tr.innerHTML = `
                                <td class="px-4 py-3 ${infraction.status === 'EXPIRED' ? 'expired' : 'r'}">${infraction.current_player_name}</td>
                                <td class="px-4 py-3 ${infraction.status === 'EXPIRED' ? 'expired' : ''}">${infraction.current_admin_name}</td>
                                <td class="px-4 py-3 ${infraction.status === 'EXPIRED' ? 'expired' : ''}">${infraction.reason}</td>
                                <td class="px-4 py-3">
                                    <span class="infraction-${infraction.type.toLowerCase()}">${infraction.type}</span>
                                </td>
                                <td class="px-4 py-3 ${infraction.status === 'EXPIRED' ? 'expired' : ''}">${infraction.status}</td>
                                <td class="px-4 py-3 ${infraction.status === 'EXPIRED' ? 'expired' : ''}">${infraction.ends}</td>
                            `;
                        tableBody.appendChild(tr);
                    });


                    for (let i = 1; i <= totalPages; i++) {
                        const li = document.createElement('li');
                        li.innerHTML = `<a href="#" class="${page === i ? 'active' : ''}" onclick="fetchInfractions(${i}, ${perPage}); return false;">${i}</a>`;
                        pagination.appendChild(li);
                    }

                    // Update record count
                    const recordsStart = document.getElementById('records-start');
                    const recordsEnd = document.getElementById('records-end');
                    const recordsTotal = document.getElementById('records-total');
                    recordsStart.textContent = (page - 1) * data.pagination.perPage + 1;
                    recordsEnd.textContent = Math.min(page * data.pagination.perPage, data.pagination.totalItems);
                    recordsTotal.textContent = data.pagination.totalItems;
                }
            })
            .catch(error => {
                console.error('Error fetching infractions:', error);
                const tableBody = document.getElementById('infractions-table-body');
                // Clear the skeleton rows and show error message
                tableBody.innerHTML = `<tr class="bg-black/50 border-b border-gray-700"><td colspan="6" class="px-4 py-3">Failed to load data. Please try again later.</td></tr>`;
            });
    }

    // Listen for custom 'entries-changed' event from the Alpine.js dropdown
    document.addEventListener('entries-changed', function (event) {
        const perPage = event.detail;
        const newTotalPages = Math.ceil(parseInt(document.getElementById('records-total').textContent) / perPage);
        if (currentPage > newTotalPages) {
            currentPage = newTotalPages;
        }
        fetchInfractions(currentPage, perPage);
    });



    // Fetch infraction counts and update the infraction count card
    function fetchInfractionCounts() {
        fetch('https://api.imperfectgamers.org/infractions/count')
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    document.getElementById('total-count').textContent = data.count.total;
                    document.getElementById('active-count').textContent = data.count.active;
                    document.getElementById('expired-count').textContent = data.count.expired;
                }
            })
            .catch(error => {
                console.error('Error fetching total infraction counts:', error);
            });

        const types = ['bans', 'mutes', 'gags'];
        types.forEach(type => {
            fetch(`https://api.imperfectgamers.org/infractions/count/${type}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        document.getElementById(`${type}-total`).textContent = `${data.count.total} (Active: ${data.count.active}, Expired: ${data.count.expired})`;
                    }
                })
                .catch(error => {
                    console.error(`Error fetching ${type} counts:`, error);
                });
        });
    }


    // Initial fetch
    fetchInfractions();
    fetchInfractionCounts();
</script>
<script>
    function searchUserApp() {
        return {
            showDropdown: false,
            searchQuery: '',
            filteredUsers: [],
            allUsers: ['User 1', 'User 2', 'User 3', 'User 4'],
            searchedUser: '',
            disableCursorPointer: true,
            tabPressed: false,

            init() {
                this.handleKeyDown = (event) => {
                    if (event.key === "Tab") {
                        this.tabPressed = true; // Set the flag when Tab is pressed
                    } else {
                        this.tabPressed = false; // Reset the flag for other keys
                    }
                    switch (event.key) {
                        case 'Escape':
                            if (this.searchQuery.trim() === '' && this.searchedUser.trim() !== '') {
                                this.searchedUser = '';
                            }
                            this.closeDropdown();
                            break;
                    }
                };
                window.addEventListener('keydown', this.handleKeyDown);
            },
            destroy() {
                window.removeEventListener('keydown', this.handleKeyDown);
            },
            filteredUsers() {
                if (!this.searchQuery) {
                    this.disableCursorPointer = true; // Disable the cursor pointer
                    // Prompt the user to start typing when the input is empty and focused
                    this.filteredUsers = ['Start typing to search...']; // New prompt for the user
                    this.showDropdown = true; // Keep the dropdown open to show the prompt
                    return;
                }
                this.filteredUsers = this.allUsers.filter(user =>
                    user.toLowerCase().includes(this.searchQuery.toLowerCase())
                );
                if (this.filteredUsers.length === 0) {
                    this.disableCursorPointer = true; // Disable the cursor pointer

                    this.filteredUsers.push('No users found.'); // Handling no results
                    this.showDropdown = true; // Keep the dropdown open to show the prompt

                    return;
                }
                this.disableCursorPointer = false; // enable the cursor pointer
                this.showDropdown = true;
            },
            selectUser(user) {
                if (user !== 'No users found.' && user !== 'Start typing to search...') {
                    this.searchedUser = user;
                    this.searchQuery = user; // Show selected user in input
                    this.showDropdown = false;
                }
            },
            handleFocus() {
                // Show prompt when input gains focus but is empty
                if (!this.searchQuery) {
                    this.filteredUsers = ['Start typing to search...'];
                    this.showDropdown = true;
                } else {
                    this.filteredUsers(); // Refilter users based on current search query
                }
            },
            handleClickAway(event) {
                // Check if the click is inside the dropdown, if not, close the dropdown
                if (!this.$el.contains(event.target)) {
                    this.closeDropdown();
                }
            },
            nonselectedDropHandler() {
                if (this.searchQuery.trim() === '' && this.searchedUser.trim() !== '') {
                    this.searchedUser = '';
                }
                if (this.disableCursorPointer) {
                    this.closeDropdown();
                }
            },
            closeDropdown() {
                // Close the dropdown if Tab was not the last key pressed
                if (this.searchedUser.trim() === '') {
                    this.searchQuery = '';
                } else if (this.searchQuery.trim() !== this.searchedUser.trim() || this.searchQuery.trim() !== '') {
                    this.searchQuery = this.searchedUser;
                }
                this.showDropdown = false;
            }
        };
    }
</script>