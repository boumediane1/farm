const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require("tailwindcss/lib/public/colors");
const {color} = require("tailwindcss/lib/util/dataTypes");

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
