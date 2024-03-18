<style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
        }

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
            justify-content: center;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination li a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #ffffff50;
            border-radius: 5px;
        }

        .pagination li a:hover,
        .pagination li a.active {
            background-color: #ffffff50;
        }
    </style>


<div x-cloak x-data="{ showModal: false, modalTitle: '', modalContent: '' }"
@keydown.window.escape="showModal = false"
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
                            <a href="https://imperfectgamers.org/infractions" class="text-gray-400 hover:text-white" aria-current="page">Infractions</a>
                        </li>
                    </ol>
                </nav>

                <h1 class="text-3xl font-bold mb-4">Infractions</h1>
                <p class="text-gray-400 mb-6">Review your bans, mutes, and other infractions within the Imperfect Gamers
                    network.</p>


                <div class="relative -mb-px h-px w-full bg-gradient-to-r from-transparent via-red-600 to-transparent">
                </div>
                <!-- Tabs for navigation -->
                <nav class="flex space-x-1 bg-black/30 p-2 rounded">
    <button class="px-3 py-1 rounded text-white active select-none">Overview</button>
    
    <button class="px-3 py-1 rounded text-white" @click="showModal = true; modalTitle = 'Bans - Under Construction'; modalContent = 'Our ban review feature is hammering out some final details. Stay tuned for updates!'">Bans</button>
    
    <button class="px-3 py-1 rounded text-white" @click="showModal = true; modalTitle = 'Mutes - On Mute for Now'; modalContent = 'We\'re fine-tuning the strings to ensure everything sounds right. Check back later!'">Mutes</button>
    
    <button class="px-3 py-1 rounded text-white" @click="showModal = true; modalTitle = 'Gags - Sealed Lips for a Bit'; modalContent = 'This feature is zipped up tight as we\'re adding the finishing touches. We appreciate your patience!'">Gags</button>
    
    <button class="px-3 py-1 rounded text-white" @click="showModal = true; modalTitle = 'Appeals - Need Help?'; modalContent = 'For now, head over to our <a href=\'https://imperfectgamers.org/discord/\' class=\'text-blue-400 hover:text-blue-600\'>Discord</a> or directly to the <a href=\'https://discord.com/channels/193909594270072832/641373370944061451\' class=\'text-blue-400 hover:text-blue-600\'>#ban-appeals</a> channel to sort out appeals. We\'re working on bringing this feature directly to you here, so stay tuned!'">Appeal</button>
</nav>

                <div
                    class="relative -mb-px h-px w-full bg-gradient-to-r from-transparent via-red-600/20 to-transparent">
                </div>

                <div class="flex space-x-4 mt-6">
                    <div class="w-full">
                        <div x-data="searchUserApp()" class="search-user-input bg-black/50 p-4 rounded">
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
                <div class="overflow-x-auto text-red-500!">
                    <div x-data>
                        <table class="w-full text-left">
                            <thead class="text-white bg-black/10">
                                <tr>
                                    <th class="px-4 py-2">user</th>
                                    <th class="px-4 py-2">Admin</th>
                                    <th class="px-4 py-2">Reason</th>
                                    <th class="px-4 py-2">Type</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Ends</th>
                                </tr>
                            </thead>
                            <tbody id="infractions-table-body">
                                <template x-for="i in 10" :key="i">
                                    <tr class="bg-black border-b border-gray-700">
                                        <template x-for="j in 6" :key="j">
                                            <td class="px-4 py-3">
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

                <!-- Show Entries Dropdown -->
                <div class="my-4">
                    <label for="show-entries" class="text-gray-400 mr-2">Show entries:</label>
                    <select id="show-entries"
                        class="bg-black/30 text-white border border-gray-700 rounded px-2 py-1 focus:border-red-500">
                        <option value="10" selected>10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
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
            <div @click.away="showModal = false" class="bg-black/50 border-card rounded-lg shadow-lg p-5 w-full max-w-md mx-4 md:mx-0">
                <h2 x-text="modalTitle" class="text-xl font-bold"></h2>
                <p x-text="modalContent" class="mt-4"></p>
                <div class="mt-5 flex justify-end">
                <button @click="showModal = false" class="transition-all px-2 py-1 text-sm bg-gray-500 border-card text-white rounded hover:bg-red-800 sm:px-4 sm:py-2 sm:text-base">
Close</button>
                </div>
            </div>
        </div>

    </main>

    <!-- Footer -->
    <footer class="py-6 text-center text-gray-500">
        <p>© 2024 Imperfect Gamers. All rights reserved.</p>
    </footer>
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
                                <td class="px-4 py-3 ${infraction.status === 'EXPIRED' ? 'expired' : 'r'}">${infraction.current_user_name}</td>
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

                    // Update show entries options based on total records
                    const showEntriesOptions = document.getElementById('show-entries').options;
                    for (let option of showEntriesOptions) {
                        option.disabled = data.pagination.totalRecords < option.value;
                    }

                }
            })
            .catch(error => {
                console.error('Error fetching infractions:', error);
                const tableBody = document.getElementById('infractions-table-body');
                // Clear the skeleton rows and show error message
                tableBody.innerHTML = `<tr class="bg-black/50 border-b border-gray-700"><td colspan="6" class="px-4 py-3">Failed to load data. Please try again later.</td></tr>`;
            });
    }

    // Handle show entries change
    document.getElementById('show-entries').addEventListener('change', function () {
        const perPage = this.value;
        // Calculate the new total pages based on the total records and perPage
        const newTotalPages = Math.ceil(parseInt(document.getElementById('records-total').textContent) / perPage);
        // If the current page is greater than the new total pages, set it to the last page
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
    function searchuserApp() {
        return {
            showDropdown: false,
            searchQuery: '',
            filteredUsers: [],
            disableCursorPointer: true,
            searchCache: new Map(), // Cache to store previous search results
            debounceTimeout: null, // To store the debounce timeout

            searchusersDebounced() {
                clearTimeout(this.debounceTimeout);
                this.debounceTimeout = setTimeout(() => this.searchusers(), 300); // Debounce for 300ms
            },

            async searchusers() {
                // Assuming this.searchQuery is your search input
                if (!this.searchQuery.trim()) {
                    this.showPrompt(); // Show a prompt like "Start typing to search..."
                    return;
                }

                const query = this.searchQuery.toLowerCase();

                // Use cached result if available to avoid unnecessary API calls
                if (this.searchCache.has(query)) {
                    this.filteredUsers = this.searchCache.get(query);
                    this.showDropdown = true;
                    return;
                }

                try {
                    const response = await fetch(`https://api.imperfectgamers.org/infractions/search/${encodeURIComponent(query)}`);
                    const data = await response.json();
                    if (data.status === 'success' && data.results.data.length > 0) {
                        this.processResults(data.results.data, query);
                    } else {
                        this.noResultsFound();
                    }
                } catch (error) {
                    console.error('Fetch error:', error);
                    this.noResultsFound();
                }
            }

        
    processResults(data, query) {
                let names = new Map();

                data.forEach(item => {
                    const userName = item.current_user_name?.toLowerCase();
                    const adminName = item.current_admin_name?.toLowerCase();

                    // Check if the query matches the user name or admin name
                    if (userName && userName.includes(query)) {
                        names.set(item.current_user_name, true);
                    } else if (adminName && adminName.includes(query)) {
                        names.set(item.current_admin_name, true);
                    }
                });

                this.filteredUsers = Array.from(names.keys()).map(name => ({ name }));
                this.searchCache.set(query, this.filteredUsers);
                this.disableCursorPointer = false;
                this.showDropdown = true;
            }


        processResults(data, query) {
                let names = new Map();

                data.forEach(item => {
                    const userName = item.current_user_name?.toLowerCase();
                    const adminName = item.current_admin_name?.toLowerCase();

                    // Check if the query matches the user name or admin name
                    if (userName && userName.includes(query)) {
                        names.set(item.current_user_name, true);
                    } else if (adminName && adminName.includes(query)) {
                        names.set(item.current_admin_name, true);
                    }
                });

                this.filteredUsers = Array.from(names.keys()).map(name => ({ name }));
                this.searchCache.set(query, this.filteredUsers);
                this.disableCursorPointer = false;
                this.showDropdown = true;
            },

            noResultsFound() {
                this.filteredUsers = [{ message: 'No results found.' }];
                this.searchCache.set(this.searchQuery.toLowerCase(), this.filteredUsers);
                this.disableCursorPointer = true;
                this.showDropdown = true;
            },

            showPrompt() {
                this.filteredUsers = [{ message: 'Start typing to search...' }];
                this.showDropdown = true;
            },

            selectUser(user) {
                if (!user.message) {
                    this.searchQuery = user.name;
                    this.showDropdown = false;
                }
            },

            handleFocus() {
                this.searchusersDebounced();
            },

            closeDropdown() {
                this.showDropdown = false;
            },

            resetDropdown() {
                if (this.searchQuery === '') {
                    this.filteredUsers = [];
                    // Optionally, clear the cache when input is cleared if you prefer not to use old searches
                    this.showDropdown = false;
                }
            }
        };
    }
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
            tabPressed: false, // Add this new property

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
                // Initialize the breadcrumb when the component is created
                countE = $refs.countEvidence.value.length;
                countR = $refs.countReason.value.length;
            },
            destroy() {
                window.removeEventListener('keydown', this.handleKeyDown);
            },
            toggleEvidenceField() {
                if (this.showEvidenceField) {
                    this.evidence = ''; // Clear the evidence when hiding the field
                }
                this.showEvidenceField = !this.showEvidenceField;
            },
            isFormReady() {
                const searchedUserValid = this.searchedUser.trim() !== '';
                const reasonValid = this.reason.trim() !== '' && this.reason.trim().length <= 36;
                const evidenceValid = !this.showEvidenceField || (this.evidence.trim().length <= 280 && this.evidence.trim() !== '');

                return searchedUserValid && reasonValid && evidenceValid;
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