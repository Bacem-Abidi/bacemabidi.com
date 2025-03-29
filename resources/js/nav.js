if (document.getElementById("navBg")) {
    document.addEventListener("scroll", () => {
        const navBg = document.getElementById("navBg");
        const drop = document.getElementById("dropdown");
        const scrollPosition = window.scrollY;

        if (scrollPosition > 50) {
            navBg.classList.remove(
                "h-full",
                "w-full",
                "rounded-full",
                "bg-secondaryBackground"
            );
            navBg.classList.add(
                "h-14",
                "w-screen",
                "rounded-none",
                "bg-background",
                "bg-opacity-60"
            );
            drop.classList.remove("bg-secondaryBackground");
            drop.classList.add("bg-background", "bg-opacity-60");
        } else {
            navBg.classList.remove(
                "h-14",
                "w-screen",
                "rounded-none",
                "bg-background",
                "bg-opacity-60"
            );
            navBg.classList.add(
                "h-full",
                "w-full",
                "rounded-full",
                "bg-secondaryBackground"
            );
            drop.classList.remove("bg-background", "bg-opacity-60");
            drop.classList.add("bg-secondaryBackground");
        }
    });
}
