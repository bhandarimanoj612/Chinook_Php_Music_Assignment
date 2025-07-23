<div class="card p-6 mb-8">
    <h2 class="text-xl font-semibold text-white mb-4">Search & Filter</h2>
    <form method="get" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Search Input -->
            <div>
                <label class="block text-sm font-medium text-secondary mb-2">Search</label>
                <input name="search" value="<?= ViewHelper::escape($search) ?>" placeholder="Track, Album, Composer..."
                    class="search-bar w-full px-4 py-2 text-white placeholder-gray-500" />
            </div>

            <!-- Sort By Dropdown -->
            <div>
                <label class="block text-sm font-medium text-secondary mb-2">Sort By</label>
                <select name="sort" class="search-bar w-full px-4 py-2 text-white">
                    <option value="TrackId" <?= ViewHelper::isCurrentSort('TrackId', $sort) ?>>
                        Track ID
                    </option>
                    <option value="Name" <?= ViewHelper::isCurrentSort('Name', $sort) ?>>
                        Track Name
                    </option>
                    <option value="AlbumTitle" <?= ViewHelper::isCurrentSort('AlbumTitle', $sort) ?>>
                        Album
                    </option>
                    <option value="Composer" <?= ViewHelper::isCurrentSort('Composer', $sort) ?>>
                        Composer
                    </option>
                </select>
            </div>

            <!-- Order Dropdown -->
            <div>
                <label class="block text-sm font-medium text-secondary mb-2">Order</label>
                <select name="order" class="search-bar w-full px-4 py-2 text-white">
                    <option value="ASC" <?= $order === 'ASC' ? 'selected' : '' ?>>A → Z</option>
                    <option value="DESC" <?= $order === 'DESC' ? 'selected' : '' ?>>Z → A</option>
                </select>
            </div>

            <!-- Search Button -->
            <div class="flex items-end">
                <button type="submit" class="btn-primary text-black px-6 py-2 font-medium w-full">
                    Search
                </button>
            </div>
        </div>
    </form>
</div>