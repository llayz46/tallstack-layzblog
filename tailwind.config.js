/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                'background': '#0E1118'
            },
            fontFamily: {
                'sans': ['Inria Sans', 'sans-serif'],
                'serif': ['Lora', 'serif'],
            },
        },
    },
    plugins: [],
}
