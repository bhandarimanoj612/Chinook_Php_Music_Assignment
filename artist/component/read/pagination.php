<?php if ($totalPages > 1): ?>
    <!-- Pagination controls for navigating through artist pages -->
    <div class="flex flex-col sm:flex-row items-center justify-between mt-6 space-y-4 sm:space-y-0">
        <p class="text-sm text-secondary">
            Showing <span class="font-medium"><?= $offset + 1 ?></span> to
            <span class="font-medium"><?= min($offset + $perPage, $total) ?></span> of
            <span class="font-medium"><?= $total ?></span> results
        </p>

        <!-- Pagination links -->
        <nav class="flex items-center space-x-1">

            <!-- If not on the first page, show the previous page link -->
            <?php if ($page > 1): ?>
                <a href="?<?= buildQuery(['page' => $page - 1]) ?>"
                    class="px-3 py-2 text-sm rounded-md bg-gray-800 text-secondary hover:bg-gray-700 transition">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            <?php endif; ?>

            <!-- Display page numbers with active page highlighted -->
            <?php for ($i = max(1, $page - 2); $i <= min($totalPages, $page + 2); $i++): ?>
                <a href="?<?= buildQuery(['page' => $i]) ?>"
                    class="px-3 py-2 text-sm rounded-md <?= $i == $page ? 'bg-spotify-green text-black font-semibold' : 'bg-gray-800 text-secondary hover:bg-gray-700' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>

            <!-- If not on the last page, show the next page link -->
            <?php if ($page < $totalPages): ?>

                <!--  if ($page < $totalPages): -->
                <a href="?<?= buildQuery(['page' => $page + 1]) ?>"
                    class="px-3 py-2 text-sm rounded-md bg-gray-800 text-secondary hover:bg-gray-700 transition">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            <?php endif; ?>
        </nav>
    </div>
<?php endif; ?>