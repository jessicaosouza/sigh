/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],
  theme: {
    screens: {
    'xs': '360px',

    'sm': '640px',
      // => @media (min-width: 640px) { ... }

      'md': '768px',
      // => @media (min-width: 768px) { ... }

      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }

      'xl': '1280px',
      // => @media (min-width: 1280px) { ... }

      '2xl': '1536px',
      // => @media (min-width: 1536px) { ... }
    },
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      black: colors.black,
      white: colors.white,
      pink: colors.pink,
      red: colors.red,
      gray: colors.gray,
      emerald: colors.emerald,
      indigo: colors.indigo,
      yellow: colors.yellow,
      'anti-flash-white': '#F2F2F2',
      'stale-white': '#E0E0E0',
      'old-silver': '#828282',
      'new-york-pink': '#CC8488',
      'complementary-blue': '#84ACCC',
      'ruby': {
        900: '#A2416B',
        800: '#B56789',
        700: '#BE7A97',
        600: '#C78DA6',
        500: '#D1A0B5',
        400: '#DAB3C4',
        300: '#E3C6D3',
        200: '#ECD9E1',
        100: '#F6ECF0'
      }
    },
    extend: {},
  },
  plugins: [],
}
