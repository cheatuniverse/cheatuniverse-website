import React, { useMemo } from 'react';
import { i18n } from 'i18n';
import { localeSubpaths } from 'constant';
import { LocaleNavlink } from 'components/Layout/Navlink';

interface LanguageItemInterface {
  hasNext: boolean;
  isTop: boolean;
  language: string;
}

const LanguageItem = ({ hasNext, isTop, language }: LanguageItemInterface): JSX.Element => (
  <>
    <LocaleNavlink className="px-1" hasNext={hasNext} href="" isTop={isTop} onClick={() => i18n.changeLanguage(language)}>
      { language }
    </LocaleNavlink>
  </>
);

export const Language: React.FC<{isTop: boolean}> = ({ isTop }) => {
  const languages = useMemo(() => {
    return Object.keys(localeSubpaths).map(i => i);
  }, [localeSubpaths]);
  return (
    <div className="flex pl-4">
      {
        languages.map((language, key) => (
          <LanguageItem isTop={isTop} hasNext={!!languages[key + 1]} language={language} key={key} />
        ))
      }
    </div>
  );
};
