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
            backgroundImage: {
                'app-pattern': "url('../images/noisy-texture.webp')",
            },
            animation: {
                'noisy': "noisy 6s steps(10) infinite",
            },
            keyframes: {
                noisy: {
                    '0%': { backgroundPosition: '0 0' },
                    '100%': { backgroundPosition: '100% 100%' },
                }
            },
        },
    },
    plugins: [],
}
