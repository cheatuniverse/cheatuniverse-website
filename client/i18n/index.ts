import NextI18Next, { TFunction as NextTFunction } from 'next-i18next';
import { localeSubpaths } from 'constant';
const path = require('path');

export type Translatable = { t: NextTFunction }

export const getCommonTranslations = () => ['common', 'navbar'];

const NextI18NextInstance = new NextI18Next({
  defaultLanguage: 'fr',
  otherLanguages: ['en'],
  localeSubpaths,
  strictMode: false,
  shallowRender: true,
  ns: [...getCommonTranslations(), 'cheats', 'form', 'glossary', 'home', 'login', 'register', 'suggest-cheat'],
  localePath: path.resolve('./public/static/locales'),
});

export default NextI18NextInstance;

export const { appWithTranslation, i18n, Link, Router, useTranslation, withTranslation } = NextI18NextInstance;
