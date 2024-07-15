document.addEventListener("DOMContentLoaded", (event) => {
  const switchMode = document.getElementById("switch-mode");
  const body = document.body;

  // Check for saved mode in localStorage
  const currentMode = localStorage.getItem("mode");
  if (currentMode === "dark") {
    body.classList.add("dark-mode");
    switchMode.checked = true;
  } else {
    body.classList.add("light-mode");
    switchMode.checked = false;
  }

  switchMode.addEventListener("change", () => {
    if (switchMode.checked) {
      body.classList.remove("light-mode");
      body.classList.add("dark-mode");
      localStorage.setItem("mode", "dark");
    } else {
      body.classList.remove("dark-mode");
      body.classList.add("light-mode");
      localStorage.setItem("mode", "light");
    }
  });
});
