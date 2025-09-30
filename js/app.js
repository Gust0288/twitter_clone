const burger = document.querySelector(".burger");
const nav = document.querySelector("nav");

burger.addEventListener("click", () => {
  // toggle nav
  nav.classList.toggle("active");

  // toggle icon
  burger.classList.toggle("open");
});

// Heart toggle functionality
function toggleHeart(heartElement) {
  const heartIcon = heartElement.querySelector("i");
  const countText = heartElement.textContent.trim();
  const currentCount = parseInt(countText.split(" ").pop()) || 0;

  if (heartIcon.classList.contains("fa-regular")) {
    // Change to filled heart
    heartIcon.classList.remove("fa-regular");
    heartIcon.classList.add("fa-solid");
    heartElement.classList.add("liked");
    heartElement.innerHTML = `<i class="fa-solid fa-heart"></i> ${
      currentCount + 1
    }`;
  } else {
    // Change to regular heart
    heartIcon.classList.remove("fa-solid");
    heartIcon.classList.add("fa-regular");
    heartElement.classList.remove("liked");
    heartElement.innerHTML = `<i class="fa-regular fa-heart"></i> ${
      currentCount - 1
    }`;
  }
}

// Initialize heart buttons when page loads
document.addEventListener("DOMContentLoaded", function () {
  const heartButtons = document.querySelectorAll(".heart-btn");

  heartButtons.forEach((button) => {
    button.style.cursor = "pointer";
    button.addEventListener("click", function () {
      toggleHeart(this);
    });
  });
});
