const withCss = require('@zeit/next-css');
const withLess = require('@zeit/next-less');
const withSass = require('@zeit/next-sass');
const { nextI18NextRewrites } = require('next-i18next/rewrites');

module.exports = {
  ...withLess(withCss(withSass({
    webpack(config, options) {
      config.module.rules.push({
        test: /\.(png|jpg|gif|svg|eot|ttf|woff|woff2)$/,
        use: {
          loader: 'url-loader',
          options: {
            limit: 100000
          }
        }
      });
      return config
    }
  }))),
  rewrites: async () => nextI18NextRewrites({
    en: 'en',
    fr: 'fr',
  }),
  serverRuntimeConfig: {
    API_URL: 'http://api'
  },
  publicRuntimeConfig: {
    API_URL: process.env.DOMAIN
  },
};
