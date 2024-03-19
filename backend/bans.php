<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imperfect Gamers - Infractions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </link>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
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
            /* red-500 */
        }

        .infraction-mute {
            color: #facc15;
            /* yellow-500 */
        }

        .infraction-gag {
            color: #22c55e;
            /* green-500 */
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
</head>

<body class="bg-black text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
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
        <main class="pt-16 max-w-screen-xl px-3 pb-12 mx-auto md:px-6">
            <div class="flex flex-col md:flex-row md:space-x-6">
                <!-- Left Column -->
                <div class="md:w-3/4">
                    <!-- Breadcrumb -->
                    <nav class="text-gray-400 mb-4" aria-label="Breadcrumb">
                        <ol class="list-none p-0 inline-flex">
                            <li class="flex items-center">
                                <a href="#" class="text-gray-500">Imperfect Gamers</a>
                                <span class="mx-2">></span>
                            </li>
                            <li class="flex items-center">
                                <a href="#" class="text-gray-400 hover:text-white" aria-current="page">Infractions</a>
                            </li>
                        </ol>
                    </nav>

                    <h1 class="text-3xl font-bold mb-4">Infractions</h1>
                    <p class="text-gray-400 mb-6">Review your bans, mutes, and other infractions within the Imperfect
                        Gamers
                        network.</p>

                    <!-- Tabs for navigation -->
                    <nav class="flex space-x-1 bg-black/30 p-2 rounded mb-6">
                        <button class="px-3 py-1 rounded text-white active select-none">Overview</button>
                        <button class="px-3 py-1 rounded text-white">Bans</button>
                        <button class="px-3 py-1 rounded text-white">Mutes</button>
                        <button class="px-3 py-1 rounded text-white">Gags</button>
                        <button class="px-3 py-1 rounded text-white">Appeal</button>
                    </nav>

                    <div class="flex space-x-4 mb-6">
                        <div class="w-full">
                            <label for="search" class="sr-only">Search Infractions</label>
                            <input type="text" id="search" placeholder="Search by SteamID or Name"
                                class="w-full bg-black/30 text-white rounded border border-gray-700 focus:border-red-500 px-4 py-2">
                        </div>
                    </div>


                    <!-- Show Entries Dropdown -->
                    <div class="mb-4">
                        <label for="show-entries" class="text-gray-400 mr-2">Show entries:</label>
                        <select id="show-entries"
                            class="bg-black/30 text-white border border-gray-700 rounded px-2 py-1 focus:border-red-500">
                            <option value="10" selected>10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>

                    <!-- Infractions Table -->
                    <div class="overflow-x-auto">
                        <div x-data>
                            <table class="w-full text-left">
                                <thead class="text-gray-500 bg-black/30">
                                    <tr>
                                        <th class="px-4 py-2">Player</th>
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
                                id="records-end"><span
                                    class="bg-slate-700 animate-pulse rounded px-2 py-0"></span></span> records out of
                            <span id="records-total"><span
                                    class="ml-1 bg-slate-700 animate-pulse rounded px-2 py-0"></span></span>
                        </div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination" id="pagination">
                                <!-- Pagination will be populated by the script -->
                            </ul>
                        </nav>
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
                                <li><span class="icon-box bg-red-500 mr-2"></span>BAN - Player is banned from the server
                                </li>
                                <li><span class="icon-box bg-yellow-500 mr-2"></span>MUTE - Player is muted in voice
                                    chat
                                </li>
                                <li><span class="icon-box bg-green-500 mr-2"></span>GAG - Player is gagged in text chat
                                </li>
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
        </main>

        <!-- Footer -->
        <footer class="py-6 text-center text-gray-500">
            <p>© 2024 Imperfect Gamers. All rights reserved.</p>
        </footer>
    </div>

    <script>
        // Fetch infractions from the API and populate the table
        function fetchInfractions(page = 1, perPage = 10) {

            const endpoint = page === 1
                ? `https://api.imperfectgamers.org/infractions/pp/${perPage}`
                : `https://api.imperfectgamers.org/infractions/p/${page}/pp/${perPage}`;
            fetch(endpoint)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        const tableBody = document.getElementById('infractions-table-body');
                        const pagination = document.getElementById('pagination');
                        // Clear the skeleton rows
                        tableBody.innerHTML = '';
                        pagination.innerHTML = '';

                        data.results.forEach(infraction => {
                            const tr = document.createElement('tr');
                            tr.classList.add('bg-black/50', 'border-b', 'border-gray-700');
                            tr.innerHTML = `
                                <td class="px-4 py-3 ${infraction.status === 'EXPIRED' ? 'expired' : ''}">${infraction.current_player_name}</td>
                                <td class="px-4 py-3 ${infraction.status === 'EXPIRED' ? 'expired' : ''}">${infraction.current_admin_name}</td>
                                <td class="px-4 py-3 ${infraction.status === 'EXPIRED' ? 'expired' : ''}">${infraction.reason}</td>
                                <td class="px-4 py-3">
                                    <span class="infraction-${infraction.type.toLowerCase()}">${infraction.type}</span>
                                </td>
                                <td class="px-4 py-3 ${infraction.status === 'EXPIRED' ? 'expired' : ''}">${infraction.status}</td>
                                <td class="px-4 py-3 ${infraction.status === 'EXPIRED' ? 'expired' : ''}">${infraction.ends}</td>
                            `;
                            const td = document.createElement('td');
                            td.classList.add('px-4', 'py-3');
                            const chartId = `chart-${infraction.id}`;
                            td.innerHTML = `<div id="${chartId}"></div>`;
                            tr.appendChild(td);

                            // Generate the chart
                            const endDate = new Date(infraction.ends);
                            const now = new Date();
                            const remainingTime = endDate - now;
                            const totalDuration = infraction.duration === 0 ? remainingTime : infraction.duration * 1000;
                            const percentage = (remainingTime / totalDuration) * 100;

                            const options = {
                                series: [percentage],
                                chart: {
                                    height: 35,
                                    type: 'radialBar',
                                    sparkline: {
                                        enabled: true
                                    }
                                },
                                plotOptions: {
                                    radialBar: {
                                        hollow: {
                                            size: '70%'
                                        },
                                        dataLabels: {
                                            show: false
                                        }
                                    }
                                },
                                colors: ['#facc15'],
                                labels: ['Remaining Time'],
                            };

                            tableBody.appendChild(tr);



                            // Add a new cell for the chart

                            new ApexCharts(document.querySelector(`#${chartId}`), options).render();



                        });

                        // Handle pagination
                        const totalPages = data.pagination.totalPages;
                        for (let i = 1; i <= totalPages; i++) {
                            const li = document.createElement('li');
                            li.innerHTML = `<a href="#" class="${page === i ? 'active' : ''}" onclick="fetchInfractions(${i}); return false;">${i}</a>`;
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
            fetchInfractions(1, perPage);
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