// Admin Theme Switcher (dark/light)
const moonAdmin = document.querySelector(".moon-admin");
const sunAdmin = document.querySelector(".sun-admin");

const adminUserTheme = localStorage.getItem("theme");
const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;

const toggleIcon = () => {
    moonAdmin.classList.toggle("display-none");
    sunAdmin.classList.toggle("display-none");
};

const ThemeCheck = () => {
    if (adminUserTheme == "dark" || (!adminUserTheme && systemTheme)) {
        document.documentElement.classList.toggle("dark");
        moonAdmin.classList.add("display-none");
        return;
    }
    sunAdmin.classList.add("display-none");
};

const ThemeSwitch = () => {
    if (document.documentElement.classList.contains("dark")) {
        document.documentElement.classList.remove("dark");
        localStorage.setItem("theme", "light");
        toggleIcon();
        return;
    }
    document.documentElement.classList.add("dark");
    localStorage.setItem("theme", "dark");
    toggleIcon();
};

sunAdmin.addEventListener("click", () => {
    ThemeSwitch();
});

moonAdmin.addEventListener("click", () => {
    ThemeSwitch();
});

ThemeCheck();
