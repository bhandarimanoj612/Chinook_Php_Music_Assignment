<div class="card overflow-hidden mb-8">
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-800">
                <tr>
                    <!-- Track ID Column -->
                    <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase">
                        <a href="<?= ViewHelper::buildUrl(compact('search', 'sort', 'order'), [
                            'sort' => 'TrackId',
                            'order' => ViewHelper::getNextOrder('TrackId', $sort, $order)
                        ]) ?>" class="hover:text-white">
                            ID <?= ViewHelper::getSortArrow('TrackId', $sort, $order) ?>
                        </a>
                    </th>

                    <!-- Track Name Column -->
                    <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase">
                        <a href="<?= ViewHelper::buildUrl(compact('search', 'sort', 'order'), [
                            'sort' => 'Name',
                            'order' => ViewHelper::getNextOrder('Name', $sort, $order)
                        ]) ?>" class="hover:text-white">
                            Track Name <?= ViewHelper::getSortArrow('Name', $sort, $order) ?>
                        </a>
                    </th>

                    <!-- Album Column -->
                    <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase">
                        <a href="<?= ViewHelper::buildUrl(compact('search', 'sort', 'order'), [
                            'sort' => 'AlbumTitle',
                            'order' => ViewHelper::getNextOrder('AlbumTitle', $sort, $order)
                        ]) ?>" class="hover:text-white">
                            Album <?= ViewHelper::getSortArrow('AlbumTitle', $sort, $order) ?>
                        </a>
                    </th>

                    <!-- Composer Column -->
                    <th class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase">
                        <a href="<?= ViewHelper::buildUrl(compact('search', 'sort', 'order'), [
                            'sort' => 'Composer',
                            'order' => ViewHelper::getNextOrder('Composer', $sort, $order)
                        ]) ?>" class="hover:text-white">
                            Composer <?= ViewHelper::getSortArrow('Composer', $sort, $order) ?>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                <?php if ($tracks->num_rows > 0): ?>
                    <?php while ($track = $tracks->fetch_assoc()): ?>
                        <tr class="hover:bg-gray-800 transition-colors duration-200">
                            <!-- Track ID -->
                            <td class="px-6 py-4 text-sm text-secondary">
                                #<?= $track['TrackId'] ?>
                            </td>

                            <!-- Track Name with Icon -->
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-green-500 to-blue-500 rounded-full flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-white">
                                        <?= ViewHelper::escape($track['Name']) ?>
                                    </span>
                                </div>
                            </td>

                            <!-- Album Title -->
                            <td class="px-6 py-4 text-sm text-white">
                                <?= ViewHelper::escape($track['AlbumTitle'], 'Unknown Album') ?>
                            </td>

                            <!-- Composer -->
                            <td class="px-6 py-4 text-sm text-secondary">
                                <?= ViewHelper::escape($track['Composer'], 'N/A') ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <!-- No Results Row -->
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-secondary mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2z" />
                                </svg>
                                <p class="text-secondary text-lg">No tracks found</p>
                                <p class="text-secondary text-sm mt-2">Try adjusting your search</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>