<?php
?>

<div class="card p-8">
    <div class="max-w-2xl mx-auto">
        <!-- Variables required: $title, $artistId, $artists, $errors, $trackTitles -->
        <form method="post" class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-medium text-secondary mb-2">
                    Album Title *
                </label>
                <input type="text" id="title" name="title" value="<?= htmlspecialchars($title) ?>"
                    placeholder="Enter album title..."
                    class="search-bar w-full px-4 py-3 text-white placeholder-gray-500 text-lg" required />
                <p class="mt-1 text-sm text-gray-400">Enter the full name of the album</p>
            </div>

            <!-- Artist selection -->
            <div>
                <label for="artistId" class="block text-sm font-medium text-secondary mb-2">
                    Artist *
                </label>
                <select id="artistId" name="artistId" class="search-bar w-full px-4 py-3 text-white text-lg">
                    <option value="">-- Select an Artist --</option>
                    <?php foreach ($artists as $artist): ?>
                        <option value="<?= $artist['ArtistId'] ?>" <?= $artist['ArtistId'] == $artistId ? 'selected' : '' ?>>
                            <?= htmlspecialchars($artist['Name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <p class="mt-1 text-sm text-gray-400">Choose the artist for this album</p>
            </div>
            <!-- New artist input -->
            <div>
                <label for="newArtist" class="block text-sm font-medium text-secondary mb-2">
                    Or Add New Artist
                </label>
                <input type="text" id="newArtist" name="newArtist" placeholder="Enter new artist name..."
                    class="search-bar w-full px-4 py-3 text-white placeholder-gray-500 text-lg" />
                <p class="mt-1 text-sm text-gray-400">Leave blank to use selected artist above</p>
            </div>

            <!-- Display errors if any -->
            <div id="tracks-section">
                <label class="block text-sm font-medium text-secondary mb-2 mt-6">
                    Tracks
                </label>
                <div id="track-list">
                    <div class="flex items-center gap-2 mb-2 track-item">
                        <input type="text" name="tracks[]" placeholder="Track Title"
                            class="search-bar flex-1 px-4 py-3 text-white placeholder-gray-500 text-lg" />
                        <button type="button"
                            class="delete-track-btn bg-red-600 hover:bg-red-700 text-white px-3 py-3 rounded-md transition-colors duration-200"
                            style="display: none;" title="Delete track">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414L7.586 12l-3.293 3.293a1 1 0 101.414 1.414L9 13.414l3.293 3.293a1 1 0 001.414-1.414L10.414 12l3.293-3.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Button to add more tracks -->
                <button type="button" id="addTrackBtn" class="btn-secondary mt-2 text-white px-4 py-2 text-sm">
                    + Add Another Track
                </button>
                <p class="mt-1 text-sm text-gray-400">Add tracks for this album (optional)</p>
            </div>

            <!-- Display errors if any -->
            <div class="flex items-center justify-between pt-6 border-t border-gray-700">
                <div class="text-sm text-gray-400">
                    Fields marked with * are required
                </div>
                <div class="flex space-x-4">
                    <a href="read_album.php" class="btn-secondary text-white px-6 py-3 font-medium">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary text-black px-6 py-3 font-medium">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        Create Album
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>