<div class="mb-8">
    <h2 class="text-xl font-semibold text-white mb-4">Quick Actions</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Manage Albums -->
        <div class="card p-6 hover:shadow-xl transition-all duration-300">
            <div class="flex items-start justify-between mb-4">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-blue-600 to-green-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-white mb-2">Manage Albums</h3>
            <p class="text-secondary text-sm mb-4">View, add, edit, and delete albums in your catalog</p>
            <div class="flex space-x-2">
                <a href="album/read_album.php" class="btn-primary text-black px-4 py-2 text-sm font-medium">View
                    Albums</a>
                <a href="album/create_album.php" class="btn-secondary px-4 py-2 text-sm font-medium">Add New</a>
            </div>
        </div>

        <!-- Manage Artists -->
        <div class="card p-6 hover:shadow-xl transition-all duration-300">
            <div class="flex items-start justify-between mb-4">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-blue-700 to-green-700 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-white mb-2">Manage Artists</h3>
            <p class="text-secondary text-sm mb-4">Browse and manage artist information and profiles</p>
            <div class="flex space-x-2">
                <a href="artist/read_artist.php" class="btn-primary text-black px-4 py-2 text-sm font-medium">View
                    Artists</a>
                <a href="artist/create_artist.php" class="btn-secondary px-4 py-2 text-sm font-medium">Add New</a>
            </div>
        </div>

        <!-- View Tracks -->
        <div class="card p-6 hover:shadow-xl transition-all duration-300">
            <div class="flex items-start justify-between mb-4">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-500 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-white mb-2">View Tracks</h3>
            <p class="text-secondary text-sm mb-4">Browse, search, and organize individual tracks</p>
            <div class="flex space-x-2">
                <a href="track/track.php" class="btn-primary text-black px-4 py-2 text-sm font-medium">View Tracks</a>
            </div>
        </div>

    </div>
</div>