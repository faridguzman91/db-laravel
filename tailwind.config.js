import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from "tailwindcss/colors"

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        fontFamily: {
            primary: "PT Mono",
            body: "PT Mono"
        },
        container: {
            padding: {
                DEFAULT: "1rem",
                lg: "3rem"
            },
        },
        extend: {
            colors: {
                "light-primary": "#FAF1E6",
                "light-secondary": "#FDF4F6",
                "light-tail-100": "#A9DED2",
                "light-tail-500": "#54bab9",
                "dark-primary": "#050402",
                "dark-secondary": "#1c1d24",
                "dark-navy-100": "#07567d",
                "dark-navy-500": "#292d42",
                accent: {
                    DEFAULT: "#AC6B34",
                    hover: "#925a2b"
                },
                paragraph: "#ac6b34",
                blue: colors.blue,
                indigo: colors.indigo,
                green: colors.green,
                red: colors.red

            }

        }
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
