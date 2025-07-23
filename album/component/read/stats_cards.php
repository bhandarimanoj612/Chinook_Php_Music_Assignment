<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <!-- Total Albums Card -->
    <div class="stats-card p-6">
        <div class="flex items-center justify-between">

            <!-- Total Albums -->
            <div>
                <p class="text-sm font-medium text-black opacity-80">Total Albums</p>
                <p class="text-2xl font-bold text-black"><?= $albumCount ?></p>
            </div>
            <svg class="w-8 h-8 text-black opacity-60" fill="currentColor" viewBox="0 0 20 20">
                <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
            </svg>
        </div>
    </div>

    <!-- Total Tracks Card -->
    <div class="card p-6">
        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm font-medium text-secondary">Current Page</p>
                <p class="text-2xl font-bold text-white"><?= $page ?> of <?= max(1, $totalPages) ?></p>
            </div>
            <svg class="w-8 h-8 text-secondary" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd" />
            </svg>
        </div>
    </div>

    <!-- Total Tracks Card -->
    <div class="card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-secondary">Showing</p>
                <p class="text-2xl font-bold text-white"><?= min($perPage, max(0, $totalRows - $offset)) ?></p>
            </div>
            <svg class="w-8 h-8 text-secondary" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>
</div>