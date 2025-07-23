<div class="card overflow-hidden">

    <div class="p-6 border-b border-gray-700">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-white">Album Tracks</h2>
                <p class="text-secondary mt-2">
                    <?php if (!empty($search)): ?>
                        Showing <?= $totalTracks ?> results for "<?= htmlspecialchars($search) ?>"
                    <?php else: ?>
                        All tracks from this album
                    <?php endif; ?>
                </p>
            </div>
            <!-- Search Form -->
            <div class="flex-shrink-0">
                <form method="GET" class="flex gap-2">
                    <input type="hidden" name="id" value="<?= $albumId ?>">
                    <input type="text" name="search" value="<?= htmlspecialchars($search) ?>"
                        placeholder="Search tracks..."
                        class="px-4 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <?php if (!empty($search)): ?>
                        <a href="?id=<?= $albumId ?>"
                            class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors">
                            Clear
                        </a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <!-- Track table  -->
    <?php if ($tracksResult->num_rows > 0): ?>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-800">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                            #</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                            Track Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                            Composer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                            Duration</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                            Size</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                            Genre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                            Media Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                            Price</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    <?php
                    $trackNumber = $offset + 1;
                    while ($track = $tracksResult->fetch_assoc()):
                        ?>
                        <tr class="hover:bg-gray-800 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary">
                                <?= $trackNumber++ ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="text-sm font-medium text-white">
                                        <?= htmlspecialchars($track['TrackName']) ?>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary">
                                <?= htmlspecialchars($track['Composer'] ?: 'Unknown') ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary">
                                <?= formatDuration($track['Milliseconds']) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary">
                                <?= formatFileSize($track['Bytes']) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary">
                                <?= htmlspecialchars($track['Genre'] ?: 'Unknown') ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary">
                                <?= htmlspecialchars($track['MediaType'] ?: 'Unknown') ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white font-medium">
                                <?php
                                $price = is_numeric($track['UnitPrice']) ? number_format((float) $track['UnitPrice'], 2) : 'N/A';
                                ?>
                                $<?= $price ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>


        <?php include 'pagination.php'; ?>


    <?php else: ?>
        <div class="p-12 text-center">
            <svg class="w-16 h-16 text-secondary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
            </svg>
            <?php if (!empty($search)): ?>
                <p class="text-secondary text-lg">No tracks found for "<?= htmlspecialchars($search) ?>"</p>
                <p class="text-secondary text-sm mt-2">Try adjusting your search terms</p>
                <a href="?id=<?= $albumId ?>" class="text-blue-400 hover:text-blue-300 mt-4 inline-block">
                    View all tracks
                </a>
            <?php else: ?>
                <p class="text-secondary text-lg">No tracks found</p>
                <p class="text-secondary text-sm mt-2">This album doesn't have any tracks yet</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>