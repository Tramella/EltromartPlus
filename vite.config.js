import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "tailwindcss"; // Import tailwindcss directly (not dynamically)

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    css: {
        postcss: {
            plugins: [
                tailwindcss({
                    theme: {
                        extend: {
                            fontFamily: {
                                sans: ["Figtree", "Arial", "sans-serif"],
                            },
                        },
                    },
                }),
            ],
        },
    },
});
