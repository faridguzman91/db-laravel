/** @type {import('tailwindcss').Config} */
export default {
    purge: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
    content: [
        "./index.html",
        "./src/**/*.{js,ts,jsx,tsx,vue}",
    ],
    theme: {
        fontFamily: {
            'sans': [
                '"PT Mono", sans-serif',
            ],
        },
        'display': ['PT Mono'],
        'body': ['PT Mono'],
        extend: {},
    },
    plugins: [
        require("daisyui"),
        require("@tailwindcss/typography")
    ],
    daisyui: {
        themes: [
            {
                mytheme: {
                    "primary": "#7700ff",
                    "secondary": "#006dff",
                    "accent": "#007cff",
                    "neutral": "#20231e",
                    "base-100": "#122f26",
                    "info": "#00b4db",
                    "success": "#00b32f",
                    "warning": "#ca3900",
                    "error": "#ff8e9e",
                },
            },
        ],
    },
}

