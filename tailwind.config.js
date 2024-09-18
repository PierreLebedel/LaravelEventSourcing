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
        'border-indigo-300',
        'bg-indigo-100',
        'bg-indigo-500/15',
        'text-indigo-500',
        'border-green-300',
        'bg-green-100',
        'bg-green-500/15',
        'text-green-500',
        'border-emerald-300',
        'bg-emerald-100',
        'bg-emerald-500/15',
        'text-emerald-500',
        'border-amber-300',
        'bg-amber-100',
        'bg-amber-500/15',
        'text-amber-500',
        'border-rose-300',
        'bg-rose-100',
        'bg-rose-500/15',
        'text-rose-500',
    ],

    plugins: [forms],
};
