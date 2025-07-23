<div class="card p-6 mb-8">
    <h2 class="text-xl font-semibold text-white mb-4">Search & Filter</h2>

    <!-- Search form for albums -->
    <form method="get" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

            <!-- Search input -->
            <div>
                <label class="block text-sm font-medium text-secondary mb-2">Search Albums</label>
                <input name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search by title or artist..."
                    class="search-bar w-full px-4 py-2 text-white placeholder-gray-500" />
            </div>

            <!-- Sort and order options -->
            <div>
                <label class="block text-sm font-medium text-secondary mb-2">Sort By</label>
                <select name="sort" class="search-bar w-full px-4 py-2 text-white">
                    <option value="AlbumId" <?= $sort === 'AlbumId' ? 'selected' : '' ?>>Album ID</option>
                    <option value="Title" <?= $sort === 'Title' ? 'selected' : '' ?>>Title</option>
                    <option value="ArtistName" <?= $sort === 'ArtistName' ? 'selected' : '' ?>>Artist</option>
                </select>
            </div>

            <!-- Order options -->
            <div>
                <label class="block text-sm font-medium text-secondary mb-2">Order</label>
                <select name="order" class="search-bar w-full px-4 py-2 text-white">
                    <option value="ASC" <?= $order === 'ASC' ? 'selected' : '' ?>>Ascending</option>
                    <option value="DESC" <?= $order === 'DESC' ? 'selected' : '' ?>>Descending</option>
                </select>
            </div>

            <!-- Submit button -->
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
        </div>

        <!-- Display search term if applicable -->
        <?php if ($search): ?>
            <div class="flex items-center justify-between bg-blue-900/20 border border-blue-500/30 rounded-lg p-3">
                <span class="text-blue-300">Searching for: "<strong><?= htmlspecialchars($search) ?></strong>"</span>
                <a href="?" class="text-blue-400 hover:text-blue-300 text-sm">Clear Search</a>
            </div>
        <?php endif; ?>
    </form>
</div>