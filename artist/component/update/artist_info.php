<div class="card p-6 mb-8 max-w-2xl">
    <!-- Artist Info -->
    <div class="flex items-center">
        <div
            class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center mr-4">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
        </div>
        <div>
            <h2 class="text-xl font-semibold text-white">Artist ID: #<?= $artist['ArtistId'] ?></h2>
            <p class="text-secondary">Currently: <?= htmlspecialchars($artist['Name']) ?></p>
        </div>
    </div>
</div>