/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                'background': '#0E1118',
                'primary': {
                    '50': '#fdf3f3',
                    '100': '#fbe6e5',
                    '200': '#f9d1cf',
                    '300': '#f4b0ad',
                    '400': '#eb827e',
                    '500': '#e05d59',
                    '600': '#cb3c37',
                    '700': '#aa302b',
                    '800': '#8d2b27',
                    '900': '#762926',
                    '950': '#3f1210',
                },

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
