<div class="card p-8 max-w-2xl">
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-white mb-2">Confirm Deletion</h2>
        <p class="text-secondary">Are you sure you want to delete this album?</p>
    </div>

    <!-- Album Info -->
    <div class="bg-gray-800 rounded-lg p-4 mb-6">
        <p class="text-white font-medium">Album: <?= htmlspecialchars($album['Title']) ?></p>
        <p class="text-secondary text-sm">ID: #<?= $id ?></p>
    </div>

    <!-- Warning -->
    <div class="bg-red-900/20 border border-red-500/20 rounded-lg p-4 mb-6">
        <p class="text-red-300">
            <strong>Warning:</strong> All tracks in this album will also be deleted. This action
            cannot be undone.
        </p>
    </div>

    <!-- Actions -->
    <form method="POST" class="flex space-x-4" onsubmit="return confirmDelete()">
        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 font-medium rounded-lg">
            Delete Album
        </button>
        <a href="read_album.php" class="btn-secondary px-8 py-3 font-medium">
            Cancel
        </a>
    </form>
</div>