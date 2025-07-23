// Function to close the "artist created" success message
function closeCreatedMessage() {
  const msg = document.getElementById("success-created-message");

  if (msg) {
    // Hide the success message element
    msg.style.display = "none";

    // Remove the "created" query parameter from the URL
    const url = new URL(window.location);
    url.searchParams.delete("created");

    // Update the browser history without reloading the page
    window.history.replaceState({}, document.title, url.pathname + url.search);
  }
}

// Function to close the generic success message (e.g., for deletion)
function closeSuccessMessage() {
  const msg = document.getElementById("success-message");

  if (msg) {
    // Hide the success message element
    msg.style.display = "none";

    // Remove the "deleted" query parameter from the URL
    const url = new URL(window.location);
    url.searchParams.delete("deleted");

    // Update the browser history without reloading the page
    window.history.replaceState({}, document.title, url.pathname + url.search);
  }
}

// When the DOM content is fully loaded...
document.addEventListener("DOMContentLoaded", function () {
  // Handle auto-dismiss of "artist created" message after 5 seconds
  const createdMessage = document.getElementById("success-created-message");
  if (createdMessage) {
    setTimeout(() => {
      // Fade out the message (using opacity)
      createdMessage.style.opacity = "0";

      // Remove the element after the fade-out effect
      setTimeout(() => closeCreatedMessage(), 300);
    }, 5000);
  }

  // Handle auto-dismiss of general success message after 5 seconds
  const successMessage = document.getElementById("success-message");
  if (successMessage) {
    setTimeout(() => {
      // Fade out the message (using opacity)
      successMessage.style.opacity = "0";

      // Remove the element after the fade-out effect
      setTimeout(() => closeSuccessMessage(), 300);
    }, 5000);
  }
});
