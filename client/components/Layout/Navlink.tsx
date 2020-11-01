import React from 'react';
import { ClassNameInterface } from 'interfaces';
import { useRouter } from 'next/router';
import { i18n, Link, useTranslation } from 'i18n';

interface NavlinkInterface extends ClassNameInterface {
  href: string;
  isTop?: boolean;
  onClick?: () => void;
}

function getNavlinkClass(isTop: boolean, isSelected: boolean): string {
  return `${ isTop ? 'text-gray-300' : 'text-indigo-500' }${ !isSelected ? ' opacity-50' : '' }`;
}

export const Navlink: React.FC<NavlinkInterface> = ({ children, className, href, onClick, isTop }) => {
  const { t } = useTranslation('navbar');
  const { pathname } = useRouter();
  const selected = '/' === pathname ? href === pathname : href.includes(pathname);
  return (
    <li onClick={(e: React.MouseEvent) => { e.preventDefault(); onClick?.(); }}>
      <Link href={href}>
        <a className={className || `sm:px-4 py-2 block hover:opacity-100 ${getNavlinkClass(!!isTop, selected)}`}>
          {t(children?.toString() || '')}
        </a>
      </Link>
    </li>
  );
};

interface LocaleNavlinkInterface extends NavlinkInterface {
  hasNext: boolean;
}

export const LocaleNavlink: React.FC<LocaleNavlinkInterface> = ({ children, className, hasNext, onClick, isTop }) => {
  const { t } = useTranslation('navbar');
  const selected = i18n.language === children;
  return (
    <li className="flex" onClick={(e: React.MouseEvent) => { e.preventDefault(); !selected && onClick?.(); }}>
      <span className={`${ className } py-2 block cursor-pointer hover:opacity-100 ${getNavlinkClass(!!isTop, selected)}`}>
        {t(children?.toString() || '')}
      </span>
      {
        hasNext ?
          <span className={`my-auto ${ isTop ? 'text-gray-300' : 'text-indigo-500' }`}> | </span> : null
      }
    </li>
  );
};
