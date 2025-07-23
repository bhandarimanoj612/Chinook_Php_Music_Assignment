<?php
// Define the current page for active states
$currentPage = basename($_SERVER['PHP_SELF']);
$currentDir = basename(dirname($_SERVER['PHP_SELF']));

// Helper function to determine active class
function isActive($page, $dir = '')
{
    global $currentPage, $currentDir;
    if ($dir) {
        return ($currentDir === $dir) ? 'active' : '';
    }
    return ($currentPage === $page) ? 'active' : '';
}

// Helper function to get the correct path based on current location
function getPath($path)
{
    global $currentDir;
    // If we're in a subdirectory, add ../ to go back to root
    if (in_array($currentDir, ['album', 'artist', 'track'])) {
        return '../' . $path;
    }
    return $path;
}
?>

<!--  Sidebar -->
<div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
    <div class="flex-1 flex flex-col min-h-0 sidebar">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">

            <!-- Sidebar Header -->
            <div class="flex items-center flex-shrink-0 px-6 mb-8">
                <div class="flex items-center">
                    <div class="w-8 h-8 text-white bg-[#1DB954] rounded-full flex items-center justify-center mr-3">
                        <span class="text-black font-bold text-lg">♪</span>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white">Chinook</h1>
                        <p class="text-sm text-secondary">Music Manager</p>
                    </div>
                </div>
            </div>
            <!-- Navigation Links -->
            <nav class="mt-5 flex-1 px-2 space-y-1">
                <!-- Dashboard -->
                <a href="<?= getPath('index.php') ?>"
                    class="sidebar-item <?= isActive('index.php') ?> group flex items-center px-3 py-2 text-sm font-medium text-white rounded-md">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    Dashboard
                </a>
                <!-- Albums -->
                <a href="<?= getPath('album/read_album.php') ?>"
                    class="sidebar-item <?= isActive('', 'album') ?> group flex items-center px-3 py-2 text-sm font-medium text-secondary rounded-md hover:text-white">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
                    </svg>
                    Albums
                </a>
                <!-- Artists -->
                <a href="<?= getPath('artist/read_artist.php') ?>"
                    class="sidebar-item <?= isActive('', 'artist') ?> group flex items-center px-3 py-2 text-sm font-medium text-secondary rounded-md hover:text-white">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                    Artists
                </a>
                <!-- Tracks -->
                <a href="<?= getPath('track/track.php') ?>"
                    class="sidebar-item <?= isActive('', 'track') ?> group flex items-center px-3 py-2 text-sm font-medium text-secondary rounded-md hover:text-white">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z" />
                    </svg>
                    Tracks
                </a>
            </nav>
        </div>
        <!-- Footer -->
        <div class="flex-shrink-0 flex border-t border-gray-800 p-4">
            <!-- User Details -->
            <div class="flex items-center">
                <div class="w-8 h-8 bg-gradient-to-br bg-gray-400 rounded-full flex items-center justify-center mr-3">
                    <span class="text-green-800 font-bold text-sm">👤</span>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-white">Manoj Bhandari</p>
                    <p class="text-xs text-secondary">Artist</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  for making the inside compatment work well -->
<div class="md:pl-64 flex flex-col flex-1">