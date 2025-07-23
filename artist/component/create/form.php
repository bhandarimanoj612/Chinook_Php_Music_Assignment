<div class="card p-8 max-w-2xl">
    <!-- This section contains the form for creating a new artist -->
    <!-- It includes fields for artist name and buttons to submit or cancel the action -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-white mb-2">Artist Information</h2>
        <p class="text-secondary">Enter the details for the new artist</p>
    </div>
    <!-- Form for creating a new artist -->
    <!-- The form submits data via POST method to the same page -->
    <form method="POST" class="space-y-6">
        <div>
            <label for="name" class="block text-sm font-medium text-secondary mb-2">
                Artist Name <span class="text-red-400">*</span>
            </label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                placeholder="Enter artist name..."
                class="search-bar w-full px-4 py-3 text-white placeholder-gray-500 text-lg" required autofocus />
            <p class="mt-2 text-sm text-secondary">This will be the display name for the artist</p>
        </div>
        <!-- Submit and Cancel buttons -->
        <!-- The submit button will create the artist and redirect to the read artist page -->
        <div class="flex items-center space-x-4 pt-4">
            <button type="submit" class="btn-primary text-black px-8 py-3 font-medium">


                <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Create Artist
            </button>
            <a href="read_artist.php" class="btn-secondary text-white px-6 py-3 font-medium">
                Cancel
            </a>
        </div>
    </form>
</div>