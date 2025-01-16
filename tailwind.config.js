import daisyui from 'daisyui';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
    ],
    theme: {
        extend: {},
    },
    daisyui: {
        themes: ['light', 'dark', 'lofi', 'dim', 'nord', 'black']
    },
    plugins: [
        daisyui,
    ],
};
