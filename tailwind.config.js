import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    daisyui: {
        themes: [
            {
                light: {
                    "primary": "#008bff",
                    "secondary": "#009252",
                    "accent": "#fefefe",
                    "neutral": "#1e1c31",
                    "base-100": "#fff7df",
                    "info": "#008ce6",
                    "success": "#0cff9c",
                    "warning": "#805f00",
                    "error": "#ff5e92",
                },
                dark: {
                    "primary": "#a400ff",
                    "secondary": "#00dd00",
                    "accent": "#000000",
                    "neutral": "#06050c",
                    "base-100": "#2e2d33",
                    "info": "#00a0ff",
                    "success": "#00c593",
                    "warning": "#ff9a00",
                    "error": "#ff9aa6",
                },
            },
        ],
    },

    plugins: [forms, require("daisyui")],
};
