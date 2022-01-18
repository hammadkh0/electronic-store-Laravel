module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/**/*.blade.php",
  ],
  theme: {
    extend: {},
    
  },
  plugins: [
    require('tw-elements/dist/plugin'),
  ],
}
