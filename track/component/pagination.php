<?php if ($totalPages > 1): ?>
    <div class="flex items-center justify-between mt-6">
        <!-- Results Summary -->
        <p class="text-sm text-secondary">
            Showing <?= $offset + 1 ?> to <?= min($offset + $perPage, $total) ?> of <?= $total ?> tracks
        </p>

        <!-- Pagination Navigation -->
        <nav class="flex space-x-1">
            <!-- Previous Page -->
            <?php if ($page > 1): ?>
                <a href="<?= ViewHelper::buildUrl(compact('search', 'sort', 'order'), ['page' => $page - 1]) ?>"
                    class="px-3 py-2 text-sm rounded bg-gray-800 text-secondary hover:bg-gray-700">
                    ←
                </a>
            <?php endif; ?>

            <!-- Page Numbers -->
            <?php
            $startPage = max(1, $page - 2);
            $endPage = min($totalPages, $page + 2);

            for ($i = $startPage; $i <= $endPage; $i++):
                ?>
                <a href="<?= ViewHelper::buildUrl(compact('search', 'sort', 'order'), ['page' => $i]) ?>" class="px-3 py-2 text-sm rounded <?= $i == $page
                           ? 'bg-green-600 text-white'
                           : 'bg-gray-800 text-secondary hover:bg-gray-700' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>

            <!-- Next Page -->
            <?php if ($page < $totalPages): ?>
                <a href="<?= ViewHelper::buildUrl(compact('search', 'sort', 'order'), ['page' => $page + 1]) ?>"
                    class="px-3 py-2 text-sm rounded bg-gray-800 text-secondary hover:bg-gray-700">
                    →
                </a>
            <?php endif; ?>
        </nav>
    </div>
<?php endif; ?>