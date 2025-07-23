// Handles album create form dynamic UI (artist/track logic)
document.addEventListener("DOMContentLoaded", function () {
  const artistSelect = document.getElementById("artistId");
  const newArtistInput = document.getElementById("newArtist");

  // Toggle the visibility and state of artist fields based on user input
  function toggleFields() {
    if (newArtistInput.value.trim() !== "") {
      artistSelect.disabled = true;
      artistSelect.classList.add("opacity-50");
    } else {
      artistSelect.disabled = false;
      artistSelect.classList.remove("opacity-50");
    }

    if (artistSelect.value !== "") {
      newArtistInput.disabled = true;
      newArtistInput.classList.add("opacity-50");
    } else {
      newArtistInput.disabled = false;
      newArtistInput.classList.remove("opacity-50");
    }
  }

  // Add event listeners to toggle fields based on input
  // This function is used to enable or disable fields based on user input
  newArtistInput.addEventListener("input", toggleFields);
  artistSelect.addEventListener("change", toggleFields);

  toggleFields(); // Initial check

  document.getElementById("title").focus();
  updateDeleteButtons();

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
            <button type="button" class="delete-track-btn bg-red-600 hover:bg-red-700 text-white px-3 py-3 rounded-md transition-colors duration-200"
                title="Delete track">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414L7.586 12l-3.293 3.293a1 1 0 101.414 1.414L9 13.414l3.293 3.293a1 1 0 001.414-1.414L10.414 12l3.293-3.293z" clip-rule="evenodd"/>
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

  document.getElementById("addTrackBtn").addEventListener("click", function () {
    const trackList = document.getElementById("track-list");
    const newTrackItem = createTrackItem();
    trackList.appendChild(newTrackItem);
    updateDeleteButtons();

    // Focus on the new input
    newTrackItem.querySelector("input").focus();
  });

  // Add delete functionality to existing delete buttons
  document.addEventListener("click", function (e) {
    if (e.target.closest(".delete-track-btn")) {
      const trackItem = e.target.closest(".track-item");
      trackItem.remove();
      updateDeleteButtons();
    }
  });
});
