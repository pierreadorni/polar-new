/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        './vendor/filament/**/*.blade.php',

    ],
    theme: {
        extend: {
            colors: {
                primary: "#AC1010",
                secondary: "#4A4A4A",
                tertiary: "#F1F1F1",
                "primary-900": "#AC1010",
                "primary-800": "#AC1010",
                "primary-700": "#AC1010",
                "primary-600": "#AC1010",
                "primary-500": "#AC1010",
                "primary-400": "#AC1010",
                "primary-300": "#AC1010",
                "primary-200": "#AC1010",
                "primary-100": "#AC1010",
                danger: colors.rose,
            },
            fontFamily: {
                sans: ["Open Sans", "sans-serif"],
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
