function toggleTheme() {
    document.body.classList.toggle("dark");
    var btn = document.querySelector(".theme-toggle");
    if (document.body.classList.contains("dark")) {
        btn.textContent = "Light";
        localStorage.setItem("theme", "dark");
    } else {
        btn.textContent = "Dark";
        localStorage.setItem("theme", "light");
    }
}

window.onload = function () {
    var savedTheme = localStorage.getItem("theme");
    var btn = document.querySelector(".theme-toggle");
    if (savedTheme === "dark") {
        document.body.classList.add("dark");
        btn.textContent = "Light";
    }
};

function toggleMenu() {
    var navLinks = document.getElementById("navLinks");
    navLinks.classList.toggle("active");
}

function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;

    if (name === "" || email === "" || message === "") {
        alert("Please fill in all fields before sending.");
        return false;
    }

    return true;
}
