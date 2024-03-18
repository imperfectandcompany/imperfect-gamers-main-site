<style>
    /* Custom admin panel styles to match your site's theme */
    .admin-panel {
        background-color: #121212;
        /* Dark theme background */
        color: white;
        /* Text color */
    }

    .tabs button {
        background-color: transparent;
        color: #fff;
        padding: 0.5rem 1rem;
        border: none;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
        outline: none;
    }

    .tabs button:hover,
    .tabs button:focus {
        background-color: #252525;
        /* Darker shade for hover/focus */
    }

    .active-tab {
        border-bottom-color: red;
        /* Red underline for active tab */
    }

    .tab-content {
        background-color: #1a1a1a;
        /* Dark background for content area */
        border-radius: 0.5rem;
        padding: 1rem;
        margin-top: 0.5rem;
        border: 1px solid #343434;
        /* Border color to match the theme */
    }

    /* Responsive tab layout */
    @media (max-width: 768px) {
        .tabs {
            justify-content: space-around;
            /* Evenly space out tabs */
        }

        .tabs button {
            flex-grow: 1;
            /* Full width tabs on smaller screens */
            text-align: center;
        }
    }


    .section {
        background-color: #1a1a1a;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        border: 1px dashed #343434;
    }

    .section h3 {
        color: #fff;
        margin-bottom: 15px;
    }

    .input-group label {
        display: block;
        color: #fff;
        margin-bottom: 5px;
    }

    .input-group input,
    .input-group textarea,
    .input-group button {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 4px;
        border: 1px solid #343434;
        background-color: #252525;
        color: white;
    }

    .input-group button {
        background-color: #007bff;
        border-color: #007bff;
        cursor: pointer;
    }

    .input-group button:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    /* Table styles */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid #343434;
    }

    th,
    td {
        text-align: left;
        padding: 12px;
    }

    th {
        background-color: #252525;
    }

    td {
        background-color: #1a1a1a;
    }

    tr:nth-child(even) {
        background-color: #2a2a2a;
    }

    /* Buttons in the table */
    .edit-btn,
    .delete-btn {
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .edit-btn {
        background-color: #ffc107;
    }

    .edit-btn:hover {
        background-color: #e0a800;
    }

    .delete-btn {
        background-color: #dc3545;
    }

    .delete-btn:hover {
        background-color: #c82333;
    }

    .input-group {
        display: flex;
        gap: 10px;
        /* Adjust the space between input and button */
        margin-bottom: 20px;
    }

    .input-group input[type="text"],
    .input-group button {
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #343434;
        background-color: #252525;
        color: white;
    }

    /* Search button specific styles */
    .input-group button[type="button"] {
        background-color: #007bff;
        /* Blue background for search */
        color: white;
    }

    .input-group button[type="button"]:hover {
        background-color: #0056b3;
        /* Darker blue on hover */
    }

    /* General form input and textarea styles */
    .input-group input,
    .input-group textarea {
        background-color: #252525;
        color: white;
        border: 1px solid #343434;
    }

    /* Save note button styles */
    .input-group button[type="submit"] {
        background-color: #28a745;
        /* Green background for save */
        color: white;
    }

    .input-group button[type="submit"]:hover {
        background-color: #218838;
        /* Darker green on hover */
    }


    /* Additional styles for ban history button */
    button[onclick="viewBanHistory()"] {
        background-color: #17a2b8;
        /* Teal background for 'View' */
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[onclick="viewBanHistory()"]:hover {
        background-color: #1395a0;
        /* Darker teal on hover */
    }

    /* Styles for verified icon */
    .verified-icon {
        color: #28a745;
        /* Green color for verified icon */
        margin-right: 5px;
        /* Space after the icon if needed */
    }

    /* Styles for status indicators */
    .status-active {
        color: #28a745;
        /* Green color for active status */
        font-weight: bold;
    }

    .status-inactive {
        color: #dc3545;
        /* Red color for inactive status */
        font-weight: bold;
    }

    /* Styling for search bar input */
    #user-search {
        flex-grow: 1;
        /* Allows the search input to fill the space */
        margin-right: 10px;
        /* Spacing between input and search button */
    }

    /* Styling for buttons inside the table cells */
    td button {
        margin-right: 5px;
        /* Spacing between buttons if there are more than one */
        width: auto;
        /* Overrides the 100% width for buttons in input-group */
    }

    .view-btn {
        background-color: #6c757d;
        /* Grey background for 'View' */
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }


    th,
    td {
        text-align: center;
        vertical-align: middle;
    }

    .view-btn:hover {
        background-color: #5a6268;
        /* Darker grey on hover */
    }

    /* Styling for the input fields and textareas in forms */
    input[type="text"],
    textarea {
        background-color: #252525;
        /* Dark grey background */
        color: white;
        /* White text color */
        border: 1px solid #343434;
        /* Border color */
        padding: 10px;
        /* Padding inside the fields */
        margin-bottom: 10px;
        /* Spacing between fields */
    }

    /* Styling for labels above input fields and textareas */
    .input-group label {
        display: block;
        /* Ensures the label takes its own line */
        margin-bottom: 5px;
        /* Space between label and input field */
    }

    /* Hover and active styles for input fields and textareas */
    input[type="text"]:hover,
    input[type="text"]:focus,
    textarea:hover,
    textarea:focus {
        border-color: #505050;
        /* Lightens the border on hover/focus */
    }

    /* Responsive design adjustments */
    @media (max-width: 768px) {
        .input-group {
            flex-direction: column;
            /* Stack the label, input, and button on small screens */
        }

        .input-group button {
            width: 100%;
            /* Full width for buttons on small screens */
        }
    }

    .sort-icon {
        cursor: pointer;
    }

    /* Adjusted CSS for table headers for clickable sorting */
    th.sortable {
        cursor: pointer;
        position: relative;
        padding-right: 30px;
        /* Make room for the sort icon */
    }

    th.sortable:after {
        content: '⇅';
        /* Default sort icon */
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 12px;
        color: #ccc;
    }

    .sort-icon,
    .view-icon,
    .info-icon {
        cursor: pointer;
    }

    /* Adjusted CSS for table headers for clickable sorting */
    th.sortable:after {
        content: '⇅';
        /* Default sort icon */
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 12px;
        color: #ccc;
    }
</style>

<div x-data="{ tab: 'dashboard', subTab: null, sortColumn: null, sortOrder: 'asc' }" class="admin-panel">
    <!-- Tab Buttons -->
    <div class="tabs flex space-x-2 mb-4">
        <button @click="tab = 'dashboard'" :class="{ 'active-tab': tab === 'dashboard' }">Dashboard</button>
        <?php if (PermissionUtil::hasPermission($userPermissions, PermissionUtil::PERMISSION_MOD)): ?>
            <button @click="tab = 'users'" :class="{'active-tab': tab === 'users'}">Users</button>
        <?php endif; ?>
        <?php if (PermissionUtil::hasPermission($userPermissions, PermissionUtil::PERMISSION_MOD)): ?>
            <button @click="tab = 'bans'" :class="{'active-tab': tab === 'bans'}">Bans</button>
        <?php endif; ?>
        <?php if (PermissionUtil::hasPermission($userPermissions, PermissionUtil::PERMISSION_ADMIN)): ?>
            <button @click="tab = 'vips'" :class="{'active-tab': tab === 'vips'}">VIPs</button>
        <?php endif; ?>
        <?php if (PermissionUtil::hasPermission($userPermissions, PermissionUtil::PERMISSION_ROOT)): ?>
            <button @click="tab = 'settings'" :class="{'active-tab': tab === 'settings'}">Settings</button>
        <?php endif; ?>
    </div>

    <!-- Dashboard Tab Content -->
    <div x-show="tab === 'dashboard'" class="tab-content">
        <div class="border-4 border-dashed border-gray-800 rounded-lg h-96">
            <p>Welcome to the admin dashboard. Here you can view the system overview.</p>
        </div>
    </div>

    <!-- Users Tab Content -->
    <div x-show="tab === 'users'" class="tab-content">
        <!-- User Management Section -->
        <div class="section">
            <h3 class="text-lg font-bold mb-4">User Management</h3>

            <!-- Search bar for user lookup -->
            <div class="input-group mb-4">
                <input type="text" id="user-search" placeholder="Search users...">
                <button type="button" onclick="searchUser()">Search</button>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full rounded-lg text-center">
                    <thead>
                        <tr class="text-center">
                            <th class="py-3 px-4 uppercase font-semibold text-sm sortable" @click="sort('username')">
                                Username</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm sortable" @click="sort('steamID64')">
                                SteamID64</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm sortable"
                                @click="sort('verificationLevels')">Verification Levels</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Ban History</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm sortable" @click="sort('role')">Role
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 dark:text-gray-500">
                        <!-- User with complete profile and Steam integrated -->
                        <tr>
                            <td class="py-3 px-4">JaneDoe456</td>
                            <td class="py-3 px-4">76561198012345678</td>
                            <td class="py-3 px-4">
                                <span class="verified-icon">✔ Website Onboarding</span>,
                                <span class="verified-icon">✔ Email Verified</span>,
                                <span class="verified-icon">✔ Steam Integrated</span>
                            </td>
                            <td class="py-3 px-4"><button class="view-btn">View Ban History</button></td>
                            <td class="py-3 px-4">Admin, Moderator</td>
                        </tr>
                        <!-- User with email registered but username not set -->
                        <tr>
                            <td class="py-3 px-4">[Username Not Set]</td>
                            <td class="py-3 px-4">[Steam Not Integrated]</td>
                            <td class="py-3 px-4">
                                <span class="verified-icon">✔ Email Verified</span>
                            </td>
                            <td class="py-3 px-4">N/A</td>
                            <td class="py-3 px-4">[Roles Not Available]</td>
                        </tr>
                        <!-- User without Steam integration -->
                        <tr>
                            <td class="py-3 px-4">JohnSmith789</td>
                            <td class="py-3 px-4">[Steam Not Integrated]</td>
                            <td class="py-3 px-4">
                                <span class="verified-icon">✔ Website Onboarding</span>,
                                <span class="verified-icon">✔ Email Verified</span>
                            </td>
                            <td class="py-3 px-4">N/A</td>
                            <td class="py-3 px-4">[Roles Not Available]</td>
                        </tr>
                        <!-- Additional rows for other scenarios -->
                    </tbody>
                </table>
            </div>


        <!-- Steam ID Notes Section -->
        <div class="section mt-4">
            <h3 class="text-lg font-bold mb-4">Steam ID Notes</h3>
            <!-- Form for adding/editing Steam ID notes -->
            <form>
                <div class="input-group">
                    <label for="steam-id">Steam ID:</label>
                    <input type="text" id="steam-id" name="steam-id" placeholder="Enter Steam ID">
                </div>
                <div class="input-group">
                    <label for="note">Note:</label>
                    <textarea id="note" name="note" rows="3" placeholder="Enter note"></textarea>
                </div>
                <div class="input-group">
                    <button type="submit">Save Note</button>
                </div>
            </form>
        </div>





        </div>
    </div>

    <!-- Bans Tab Content -->
    <div x-show="tab === 'bans'" class="tab-content" x-transition:enter="fade-in-up" x-transition:leave="fade-out-down">
        <h3 class="text-red-600">Ban Management</h3>

        <!-- Submenu for Bans Management -->
        <div class="flex justify-between space-x-4 mb-4">
            <button @click="subTab = 'overview'" :class="{'active': subTab === 'overview'}">Overview</button>
            <button @click="subTab = 'current-bans'" :class="{'active': subTab === 'current-bans'}">Current
                Bans</button>
            <button @click="subTab = 'current-mutes'" :class="{'active': subTab === 'current-mutes'}">Current
                Mutes</button>
            <button @click="subTab = 'archived'" :class="{'active': subTab === 'archived'}">Archived</button>
        </div>

        <!-- Users Tab Content -->
        <div x-show="tab === 'users'" class="tab-content">
            <!-- Content for the Users tab -->
        </div>

        <!-- Bans Tab Content -->
        <div x-show="tab === 'bans'" class="tab-content" x-transition:enter="fade-in-up"
            x-transition:leave="fade-out-down">
            <!-- Content for the Bans tab -->
        </div>

        <!-- VIPs Tab Content -->
        <div x-show="tab === 'vips'" class="tab-content">
            <!-- Content for the VIPs tab -->
        </div>

        <!-- Settings Tab Content -->
        <div x-show="tab === 'settings'" class="tab-content">
            <!-- Content for the Settings tab -->
        </div>
    </div>