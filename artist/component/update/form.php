<div class="card p-8 max-w-2xl">
    <!-- Form Validation -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-white mb-2">Update Artist Information</h2>
        <p class="text-secondary">Make changes to the artist details</p>
    </div>

    <form method="POST" class="space-y-6">
        <div>
            <label for="name" class="block text-sm font-medium text-secondary mb-2">
                Artist Name <span class="text-red-400">*</span>
            </label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($artist['Name']) ?>"
                placeholder="Enter artist name..."
                class="search-bar w-full px-4 py-3 text-white placeholder-gray-500 text-lg" required autofocus />
            <p class="mt-2 text-sm text-secondary">This will be the display name for the artist</p>
        </div>

        <div class="flex items-center space-x-4 pt-4">
            <button type="submit" class="btn-primary text-black px-8 py-3 font-medium">
                <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg>
                Update Artist
            </button>
            <a href="read_artist.php" class="btn-secondary text-white px-6 py-3 font-medium">
                Cancel
            </a>
        </div>
    </form>
</div>