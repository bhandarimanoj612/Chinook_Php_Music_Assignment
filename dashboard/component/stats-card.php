<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Total Albums -->
    <div class="stats-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-black opacity-80">Total Albums</p>
                <p class="text-2xl font-bold text-black"><?= $albumCount ?></p>
            </div>
            <svg class="w-8 h-8 text-black opacity-60" fill="currentColor" viewBox="0 0 20 20">
                <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
            </svg>
        </div>
    </div>

    <!-- Total Artists -->
    <div class="card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-secondary">Artists</p>
                <p class="text-2xl font-bold text-white"><?= $artistCount ?></p>
            </div>
            <svg class="w-8 h-8 text-secondary" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>

    <!-- Total Tracks -->
    <div class="card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-secondary">Tracks</p>
                <p class="text-2xl font-bold text-white"><?= number_format($trackCount) ?></p>
            </div>
            <svg class="w-8 h-8 text-secondary" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z" />
            </svg>
        </div>
    </div>
</div>