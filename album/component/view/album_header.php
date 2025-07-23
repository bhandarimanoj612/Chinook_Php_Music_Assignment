<div class="card p-8 mb-8">
    <div class="flex items-center space-x-6">
        <!-- Album cover image -->
        <div
            class="w-32 h-32 bg-gradient-to-br from-blue-500 to-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
            </svg>
        </div>

        <!-- Album title and actions -->
        <div class="flex-1">
            <h1 class="text-4xl font-bold text-white mb-2"><?= htmlspecialchars($album['Title']) ?></h1>
            <p class="text-xl text-secondary mb-4">by <?= htmlspecialchars($album['ArtistName']) ?></p>
            <div class="flex items-center space-x-4 text-sm text-secondary">
                <span>Album ID: #<?= $album['AlbumId'] ?></span>
                <span>•</span>
                <span><?= $trackCount ?> tracks</span>
            </div>
        </div>

        <!-- Album actions -->
        <div class="flex space-x-3">
            <a href="update_album.php?id=<?= $album['AlbumId'] ?>" class="btn-primary text-black px-6 py-3 font-medium">
                <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg>
                Edit Album
            </a>
            <a href="delete_album.php?id=<?= $album['AlbumId'] ?>"
                class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-medium transition-colors"
                onclick="return confirm('Are you sure you want to delete this album? This will also delete all associated tracks.');">
                <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
                Delete Album
            </a>
        </div>
    </div>
</div>