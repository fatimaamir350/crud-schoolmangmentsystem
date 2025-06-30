document.addEventListener("DOMContentLoaded", () => {
  const dropdowns = document.querySelectorAll(".dropdown");

  dropdowns.forEach((dropdown) => {
    dropdown.querySelector(".dropdown-toggle").addEventListener("click", () => {
      dropdown.classList.toggle("open");
    });
  });
});
