<!-- Pagination  -->
<?php if ($totalPages > 1): ?>
    <div class="px-6 py-4 border-t border-gray-700">
        <div class="flex items-center justify-between">
            <div class="text-sm text-secondary">
                Showing <?= $offset + 1 ?> to <?= min($offset + $limit, $totalTracks) ?> of
                <?= $totalTracks ?> tracks
            </div>
            <div class="flex space-x-2">
                <!-- Previous Button -->
                <?php if ($page > 1): ?>
                    <a href="<?= getPaginationUrl($page - 1, $search) ?>"
                        class="px-3 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-colors">
                        Previous
                    </a>
                <?php endif; ?>

                <!-- Page Numbers -->
                <?php
                $startPage = max(1, $page - 2);
                $endPage = min($totalPages, $page + 2);
                if ($startPage > 1): ?>
                    <a href="<?= getPaginationUrl(1, $search) ?>"
                        class="px-3 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-colors">1</a>
                    <?php if ($startPage > 2): ?>
                        <span class="px-3 py-2 text-secondary">...</span>
                    <?php endif; ?>
                <?php endif; ?>

                <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                    <a href="<?= getPaginationUrl($i, $search) ?>"
                        class="px-3 py-2 <?= $i === $page ? 'bg-blue-600 text-white' : 'bg-gray-700 hover:bg-gray-600 text-white' ?> rounded-lg transition-colors">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>

                <?php if ($endPage < $totalPages): ?>
                    <?php if ($endPage < $totalPages - 1): ?>
                        <span class="px-3 py-2 text-secondary">...</span>
                    <?php endif; ?>
                    <a href="<?= getPaginationUrl($totalPages, $search) ?>"
                        class="px-3 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-colors"><?= $totalPages ?></a>
                <?php endif; ?>

                <!-- Next Button -->
                <?php if ($page < $totalPages): ?>
                    <a href="<?= getPaginationUrl($page + 1, $search) ?>"
                        class="px-3 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-colors">
                        Next
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>