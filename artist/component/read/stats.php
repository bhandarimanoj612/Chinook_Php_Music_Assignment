<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- This section displays statistics about the artists -->
    <div class="stats-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-black opacity-80">Total Artists</p>
                <p class="text-2xl font-bold text-black"><?= $total ?></p>
            </div>
            <svg class="w-8 h-8 text-black opacity-60" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>
    <!-- This section displays the current page and total pages -->
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
    <!-- This section displays the number of artists shown on the current page -->
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