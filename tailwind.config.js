import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import lineClamp from '@tailwindcss/line-clamp';


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],

            },

            colors: {
                myRed: "#fa532e", // ضع هنا كود اللون الذي تريده
                myRedd:"#d53e20"
            },

            container: {
                screens: {
                  xl: '73.125rem', // 1170px بدل 80rem
                },
              },
        },
    },

    plugins: [forms, lineClamp,],
};
