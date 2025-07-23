<div class="card p-8">
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-white mb-2">Update Album Information</h2>
        <p class="text-secondary">Change the title, artist, and manage tracks</p>
    </div>

    <form method="POST" class="space-y-6">
        <!-- Title Input -->
        <div>
            <label for="title" class="block text-sm font-medium text-secondary mb-2">
                Album Title <span class="text-red-400">*</span>
            </label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($title) ?>"
                placeholder="Enter album title..."
                class="search-bar w-full px-4 py-3 text-white placeholder-gray-500 text-lg" required autofocus />
        </div>

        <!-- Artist Dropdown -->
        <div>
            <label for="artistId" class="block text-sm font-medium text-secondary mb-2">
                Artist <span class="text-red-400">*</span>
            </label>
            <select name="artistId" id="artistId"
                class="search-bar w-full px-4 py-3 text-white bg-gray-800 text-lg rounded-lg" required>
                <?php foreach ($artists as $artist): ?>
                    <option value="<?= $artist['ArtistId'] ?>" <?= $artist['ArtistId'] == $artistId ? 'selected' : '' ?>>
                        <?= htmlspecialchars($artist['Name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Tracks Section -->
        <div id="tracks-section">
            <label class="block text-sm font-medium text-secondary mb-2 mt-6">
                Album Tracks
            </label>
            <div id="track-list">
                <?php if (empty($existingTracks)): ?>
                    <!-- Default empty track input if no existing tracks -->
                    <div class="flex items-center gap-2 mb-2 track-item">
                        <input type="text" name="tracks[]" placeholder="Track Title"
                            class="search-bar flex-1 px-4 py-3 text-white placeholder-gray-500 text-lg" />
                        <input type="hidden" name="track_ids[]" value="" />
                        <button type="button"
                            class="delete-track-btn bg-red-600 hover:bg-red-700 text-white px-3 py-3 rounded-md transition-colors duration-200"
                            style="display: none;" title="Delete track">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                <?php else: ?>
                    <!-- Existing tracks -->
                    <?php foreach ($existingTracks as $track): ?>
                        <div class="flex items-center gap-2 mb-2 track-item">
                            <input type="text" name="tracks[]" value="<?= htmlspecialchars($track['Name']) ?>"
                                placeholder="Track Title"
                                class="search-bar flex-1 px-4 py-3 text-white placeholder-gray-500 text-lg" />
                            <input type="hidden" name="track_ids[]" value="<?= $track['TrackId'] ?>" />
                            <button type="button"
                                class="delete-track-btn bg-red-600 hover:bg-red-700 text-white px-3 py-3 rounded-md transition-colors duration-200"
                                title="Delete track">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <button type="button" id="addTrackBtn" class="btn-secondary mt-2 text-white px-4 py-2 text-sm">
                + Add Another Track
            </button>
            <p class="mt-1 text-sm text-gray-400">Add, edit, or remove tracks for this album</p>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center space-x-4 pt-4">
            <button type="submit" class="btn-primary text-black px-8 py-3 font-medium">
                <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg>
                Update Album & Tracks
            </button>
            <a href="read_album.php" class="btn-secondary text-white px-6 py-3 font-medium">
                Cancel
            </a>
        </div>
    </form>
</div>