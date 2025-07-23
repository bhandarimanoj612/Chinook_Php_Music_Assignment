<!-- This file displays success messages for artist creation and deletion actions. -->
<?php if (isset($_GET['created']) && !empty($_GET['created'])): ?>
    <!-- Success message for artist creation -->
    <div id="success-created-message" class="mb-6 bg-green-900/20 border border-green-500/30 rounded-lg p-4">

        <!-- This section displays a success message when an artist is created -->
        <div class="flex items-center">

            <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 
         7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <p class="text-green-300">
                <strong>Success!</strong> Artist "<?= htmlspecialchars($_GET['created']) ?>" was created
                successfully.
            </p>
            <!-- Button to close the success message -->
            <button onclick="closeCreatedMessage()" class="ml-auto text-green-400 hover:text-green-300">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 
             111.414 1.414L11.414 10l4.293 4.293a1 1 0 
             01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 
             01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 
             010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
<?php endif; ?>

<!-- This section displays a success message when an artist is deleted -->
<?php if (isset($_GET['deleted']) && !empty($_GET['deleted'])): ?>
    <!-- Success message for artist deletion -->
    <div id="success-message" class="mb-6 bg-green-900/20 border border-green-500/30 rounded-lg p-4">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            <p class="text-green-300">
                <strong>Success!</strong> Artist "<?= htmlspecialchars($_GET['deleted']) ?>" has been
                deleted successfully.
            </p>
            <!-- Button to close the success message -->
            <button onclick="closeSuccessMessage()" class="ml-auto text-green-400 hover:text-green-300">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l-4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
<?php endif; ?>