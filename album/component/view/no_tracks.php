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