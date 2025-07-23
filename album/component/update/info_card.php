<div class="card p-6 mb-8 max-w-2xl">
    <div class="flex items-center">
        <!-- Display album information -->
        <div
            class="w-16 h-16 bg-gradient-to-br from-green-500 to-blue-500 rounded-full flex items-center justify-center mr-4">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M4 3a1 1 0 000 2h12a1 1 0 100-2H4zm0 4a1 1 0 000 2h12a1 1 0 100-2H4zm0 4a1 1 0 000 2h12a1 1 0 100-2H4z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <div>
            <h2 class="text-xl font-semibold text-white">Album ID: #<?= $album['AlbumId'] ?></h2>
            <p class="text-secondary">Currently: <?= htmlspecialchars($album['Title']) ?></p>
            <p class="text-sm text-gray-400">Tracks: <?= count($existingTracks) ?></p>
        </div>
    </div>
</div>