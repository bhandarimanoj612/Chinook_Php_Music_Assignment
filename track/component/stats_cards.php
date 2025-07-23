<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Total Tracks Card -->
    <div class="stats-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-black opacity-80">Total Tracks</p>
                <p class="text-2xl font-bold text-black"><?= $total ?></p>
            </div>
            <svg class="w-8 h-8 text-black opacity-60" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z" />
            </svg>
        </div>
    </div>

    <!-- Current Page Card -->
    <div class="card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-secondary">Current Page</p>
                <p class="text-2xl font-bold text-white"><?= $page ?> of <?= $totalPages ?></p>
            </div>
            <svg class="w-8 h-8 text-secondary" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd" />
            </svg>
        </div>
    </div>

    <!-- Showing Card -->
    <div class="card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-secondary">Showing</p>
                <p class="text-2xl font-bold text-white">
                    <?= min($perPage, max(0, $total - $offset)) ?>
                </p>
            </div>
            <svg class="w-8 h-8 text-secondary" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>
</div>