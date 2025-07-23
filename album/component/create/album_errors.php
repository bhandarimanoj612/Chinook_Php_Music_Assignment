<?php if (!empty($errors)): ?>
    <!-- Display error messages if there are any -->
    <div class="mb-8">
        <div class="bg-red-600 border border-red-500 rounded-lg p-4">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-white mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" />
                </svg>
                <h3 class="text-sm font-medium text-white">Please correct the following errors:</h3>
            </div>
            <!-- List of errors -->
            <ul class="mt-2 text-sm text-white">
                <?php foreach ($errors as $error): ?>
                    <li class="flex items-center">
                        <span class="mr-2">•</span>
                        <?= htmlspecialchars($error) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>