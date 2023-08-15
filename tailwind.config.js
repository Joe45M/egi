/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        '!./node_modules',
        '!./.git',
        './**/*.{html,js,php}'
    ],
    theme: {
        extend: {
            fontFamily: {
                'display': ['Kanit'],
            },
            colors: {
                'brand': {
                    DEFAULT: '#FF6900',
                    50: '#FFD5B8',
                    100: '#FFC9A3',
                    200: '#FFB17A',
                    300: '#FF9952',
                    400: '#FF8129',
                    500: '#FF6900',
                    600: '#C75200',
                    700: '#8F3B00',
                    800: '#572400',
                    900: '#1F0D00'
                },
                'nd': {
                    DEFAULT: '#6900FF',
                    50: '#D5B8FF',
                    100: '#C9A3FF',
                    200: '#B17AFF',
                    300: '#9952FF',
                    400: '#8129FF',
                    500: '#6900FF',
                    600: '#5200C7',
                    700: '#3B008F',
                    800: '#240057',
                    900: '#0D001F'
                },
            }
        },
    },
    plugins: [],
}
