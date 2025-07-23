<div class="card p-6 mb-8">
    <!-- This section provides a search and filter form for the artist management page -->
    <!-- It allows users to search for artists by name or ID and sort the results -->
    <h2 class="text-xl font-semibold text-white mb-4">Search & Filter</h2>

    <!-- Form for searching and filtering artists -->
    <form method="get" class="grid grid-cols-1 md:grid-cols-5 gap-4">
        <div>
            <label class="block text-sm font-medium text-secondary mb-2">Search</label>
            <!-- Input field for searching artists -->
            <input name="search" value="<?= htmlspecialchars($search) ?>"
                class="search-bar w-full px-4 py-2 text-white placeholder-gray-500" placeholder="Search...">
        </div>
        <!-- Dropdown for selecting the field to search by -->
        <div>
            <label class="block text-sm font-medium text-secondary mb-2">Sort By</label>
            <select name="search_by" class="search-bar w-full px-4 py-2 text-white">
                <option value="Name" <?= $searchBy === 'Name' ? 'selected' : '' ?>>Name</option>
                <option value="ArtistId" <?= $searchBy === 'ArtistId' ? 'selected' : '' ?>>Artist ID</option>
            </select>
        </div>
        <!-- Dropdown for selecting the order of results -->
        <div>
            <label class="block text-sm font-medium text-secondary mb-2">Order</label>
            <select name="order" class="search-bar w-full px-4 py-2 text-white">
                <option value="ASC" <?= $order === 'ASC' ? 'selected' : '' ?>>Ascending</option>
                <option value="DESC" <?= $order === 'DESC' ? 'selected' : '' ?>>Descending</option>
            </select>
        </div>
        <!-- Submit button to perform the search -->
        <div class="flex items-end">
            <button type="submit" class="btn-primary text-black px-6 py-2 font-medium w-full">
                <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd" />
                </svg>
                Search
            </button>
        </div>
    </form>
</div>