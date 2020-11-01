const purgecss = require('@fullhuman/postcss-purgecss')({
  content: [
    './public/**/*.html',
    './pages/*.{ts,tsx}',
    './components/**/*.{ts,tsx}'
  ],

  // Include any special characters you're using in this regular expression
  defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
});

module.exports = {
  plugins: [
    require('tailwindcss'),
    require('postcss-preset-env'),
  ],
};
