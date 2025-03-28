import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/app.js",
                "resources/js/admin/app.js",
                "resources/js/nav.js",
                "resources/js/admin/theme-admin.js",
                "resources/css/app.css",
                "resources/css/admin.css",
                "resources/markdown/*.md",
            ],
            refresh: true,
        }),
        react(),
    ],
});
