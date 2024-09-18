import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

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
        },
    },

    safelist: [
        'border-blue-300',
        'bg-blue-100',
        'bg-blue-500/15',
        'text-blue-500',
        'border-green-300',
        'bg-green-100',
        'bg-green-500/15',
        'text-green-500',
        'border-orange-300',
        'bg-orange-100',
        'bg-orange-500/15',
        'text-orange-500',
        'border-red-300',
        'bg-red-100',
        'bg-red-500/15',
        'text-red-500',
    ],

    plugins: [forms],
};
