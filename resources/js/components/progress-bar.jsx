import ReactDOM from "react-dom/client";

import { useEffect, useState } from "react";

const ReadingProgressBar = ({ targetSelector }) => {
    const [readingProgress, setReadingProgress] = useState(0);

    useEffect(() => {
        const calculateScrollProgress = () => {
            const articleElement = document.querySelector(targetSelector);
            if (!articleElement) return;

            const scrollTop = window.scrollY;
            const windowHeight = window.innerHeight;
            const rect = articleElement.getBoundingClientRect();

            // Get accurate article position relative to document
            const articleTop = rect.top + scrollTop;
            const articleHeight = rect.height;
            const articleBottom = articleTop + articleHeight;

            // Calculate progress boundaries
            const progressStart = articleTop;
            const progressEnd = articleBottom - windowHeight;

            if (progressEnd <= progressStart) {
                // Article is shorter than viewport
                setReadingProgress(100);
                return;
            }

            let progress;
            if (scrollTop <= progressStart) {
                progress = 0;
            } else if (scrollTop >= progressEnd) {
                progress = 100;
            } else {
                progress =
                    ((scrollTop - progressStart) /
                        (progressEnd - progressStart)) *
                    100;
            }

            setReadingProgress(progress);
        };

        const updateLinks = () => {
            const headings = Array.from(
                document.querySelectorAll(
                    "article h1, article h2, article h3, article h4, article h5, article h6"
                )
            );
            const links = document.querySelectorAll("aside a");

            // Use a scroll offset to decide when a heading becomes "active"
            const scrollPosition = window.scrollY + window.innerHeight * 0.2;
            let currentId = "";

            // Loop through headings in reverse order so that the first heading meeting the condition is our current section
            for (let i = headings.length - 1; i >= 0; i--) {
                const heading = headings[i];
                if (heading.offsetTop <= scrollPosition) {
                    currentId = heading.id;
                    break;
                }
            }

            links.forEach((link) => {
                const href = link.getAttribute("href").substring(1);
                // Highlight the link if its href matches the current heading id
                link.classList.toggle("text-teal-400", href === currentId);
                link.classList.toggle("text-zinc-400", href !== currentId);
            });
        };

        const throttledScroll = () => {
            requestAnimationFrame(calculateScrollProgress);
            requestAnimationFrame(updateLinks);
        };

        window.addEventListener("scroll", throttledScroll);
        window.addEventListener("resize", throttledScroll);
        calculateScrollProgress();
        updateLinks();

        return () => {
            window.removeEventListener("scroll", throttledScroll);
            window.removeEventListener("resize", throttledScroll);
        };
    }, [targetSelector]);

    return (
        <div className="fixed top-0 left-0 w-full h-2 bg-gray-300 z-50">
            <span
                className="pointer-events-none fixed end-0 start-0 top-0 z-30 w-0 overflow-clip rounded-full transition-[width] duration-300 ease-out"
                style={{ width: `${readingProgress}%`, height: 2 }}
            >
                <span className="absolute block h-full w-screen bg-teal"></span>
            </span>
        </div>
    );
};

export default ReadingProgressBar;

if (document.getElementById("progress-bar")) {
    const root = ReactDOM.createRoot(document.getElementById("progress-bar"));

    root.render(<ReadingProgressBar targetSelector=".prose" />);
}
