<div class="card p-8 max-w-2xl">
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-white mb-2">Confirm Deletion</h2>
        <p class="text-secondary">Are you sure you want to delete this artist?</p>
    </div>

    <!-- Artist Info -->
    <div class="bg-gray-800 rounded-lg p-4 mb-6">
        <p class="text-white font-medium">Artist: <?= htmlspecialchars($artist['Name']) ?></p>
        <p class="text-secondary text-sm">ID: #<?= $id ?></p>
    </div>

    <!-- Warning -->
    <div class="bg-red-900/20 border border-red-500/20 rounded-lg p-4 mb-6">
        <p class="text-red-300">
            <strong>Warning:</strong> This action cannot be undone and may delete associated albums
            and tracks.
        </p>
    </div>

    <!-- Actions -->
    <form method="POST" class="flex space-x-4" onsubmit="return confirmDelete()">
        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 font-medium rounded-lg">
            Delete Artist
        </button>
        <a href="read_artist.php" class="btn-secondary px-8 py-3 font-medium">
            Cancel
        </a>
    </form>
</div>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this artist? This action cannot be undone.");
    }
</script>