/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./vendor/laravel/pulse/**/*.blade.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Lexend Deca', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
