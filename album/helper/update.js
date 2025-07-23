// This file handles the dynamic addition and deletion of track items in an album creation form
document.addEventListener("DOMContentLoaded", function () {
  updateDeleteButtons();
});

// Update delete buttons visibility based on the number of track items
// This function is used to show or hide delete buttons based on the number of tracks
function updateDeleteButtons() {
  const trackItems = document.querySelectorAll(".track-item");
  trackItems.forEach((item, index) => {
    const deleteBtn = item.querySelector(".delete-track-btn");
    if (trackItems.length > 1) {
      deleteBtn.style.display = "block";
    } else {
      deleteBtn.style.display = "none";
    }
  });
}

// Create a new track item element
// This function is used to create a new track item with the delete button functionality
function createTrackItem() {
  const trackItem = document.createElement("div");
  trackItem.className = "flex items-center gap-2 mb-2 track-item";

  trackItem.innerHTML = `
        <input type="text" name="tracks[]" placeholder="Track Title"
               class="search-bar flex-1 px-4 py-3 text-white placeholder-gray-500 text-lg" />
        <input type="hidden" name="track_ids[]" value="" />
        <button type="button" class="delete-track-btn bg-red-600 hover:bg-red-700 text-white px-3 py-3 rounded-md transition-colors duration-200" 
                title="Delete track">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </button>
    `;

  // Add delete functionality to the new button
  const deleteBtn = trackItem.querySelector(".delete-track-btn");
  deleteBtn.addEventListener("click", function () {
    trackItem.remove();
    updateDeleteButtons();
  });

  return trackItem;
}

// Add a new track item when the "Add Track" button is clicked
// This function is used to add a new track item to the track list
document.addEventListener("DOMContentLoaded", function () {
  // Focus on the title input when the page loads
  const addTrackBtn = document.getElementById("addTrackBtn");
  if (addTrackBtn) {
    addTrackBtn.addEventListener("click", function () {
      const trackList = document.getElementById("track-list");
      const newTrackItem = createTrackItem();
      trackList.appendChild(newTrackItem);
      updateDeleteButtons();

      // Focus on the new input
      newTrackItem.querySelector('input[name="tracks[]"]').focus();
    });
  }
});

// Add delete functionality to existing delete buttons
document.addEventListener("click", function (e) {
  if (e.target.closest(".delete-track-btn")) {
    const trackItem = e.target.closest(".track-item");
    trackItem.remove();
    updateDeleteButtons();
  }
});
