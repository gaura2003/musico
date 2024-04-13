function toggleSidebar() {
  var sidebar = document.getElementById("sidebar");
  var main = document.getElementById("main");

  if (sidebar.classList.contains("active")) {
    sidebar.classList.remove("active");
    main.style.marginLeft = "0";
  } else {
    sidebar.classList.add("active");
    main.style.marginLeft = "250px"; // Adjust according to sidebar width
  }
}
