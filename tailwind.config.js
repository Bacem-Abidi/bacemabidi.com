import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                custom: ["MyCustomFont", "CustomFont", "Consolas", "Courier New", "monospace"], // Add your font here
            },
            colors: {
                background: '#0f111a',
                // background: '#13171f',
                secondaryBackground: '#293040',
                thirdBackground: '#3e444f',
                text: '#ffffff',
                pink: '#ff227b',
                teal: '#1fc5c5',
                cyan: '#3dffdb',
                pinkTransparent: 'rgba(255, 0, 179, 0.901)',
                tealTransparent: 'rgba(21, 238, 253, 0.2)',
                gray: 'rgb(173, 181, 189)',
            },
        },
    },
    plugins: [],
};
