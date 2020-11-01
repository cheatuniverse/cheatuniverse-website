import React, { useEffect, useMemo, useState } from 'react';
import Link from 'next/link';
import useAuth from 'context/AuthContext';
import { useTranslation } from 'i18n';
import { navbarRoutes, anonymousNavbarRoutes, authenticatedNavbarRoutes } from 'routes';
import { Navlink } from 'components/Layout/Navlink';
import { Users } from 'actions';
import { Language } from 'components/Language';

const Navbar: React.FC = () => {
  const { t } = useTranslation('navbar');
  const { isAuthenticated, setUser } = useAuth();
  const [isTop, setIsTop] = useState(true);
  const [isOpen, setIsOpen] = useState(false);
  const isOpenMemoized = useMemo(() => isTop && !isOpen, [isTop, isOpen]);
  const updateTop = (position: boolean) => position !== isTop && setIsTop(position);
  useEffect(() => {
    const handleScroll = () => {
      updateTop(window.scrollY < 50);
    };
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, [updateTop]);

  return (
    <div className='py-16'>
      <header
        className={`w-full transition-all duration-300 fixed top-0 left-0 z-50 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 ${ isOpenMemoized ? 'bg-transparent' : 'bg-white shadow-lg' } ${ isTop ? 'py-6 xl:py-8' : 'py-2' }`}
        id="navbar">
        <nav className="flex items-center justify-between flex items-center justify-between flex-wrap">
          <Link href='/' as='/'>
            <span className='flex'>
              <img src='/icon.png' className='w-16 h-16' />
              <span className={`text-xl lg:text-2xl font-bold my-auto pl-1 ${ isOpenMemoized ? 'text-gray-300' : 'text-indigo-500' }`}>
                CHEATUNIVERSE
              </span>
            </span>
          </Link>
          <div className="block lg:hidden">
            <button
              onClick={() => setIsOpen(!isOpen)}
              className={`flex items-center px-3 py-2 border rounded ${ isOpenMemoized ? 'text-gray-200 border-gray-300 hover:text-white hover:border-white' : 'text-indigo-500 border-indigo-500 hover:text-indigo-500 hover:border-indigo-700' }`}>
              <svg className="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
              </svg>
            </button>
          </div>

          <div className={`sm:flex w-full block lg:items-center lg:w-auto lg:overflow-auto lg:h-auto pt-4 lg:pt-0 ${ isOpen ? '' : 'overflow-hidden h-0' }`}>
            <ul className="flex flex-col lg:flex-row">
              {
                [
                  ...navbarRoutes,
                  ...(isAuthenticated ? [
                    ...authenticatedNavbarRoutes,
                    {
                      children: 'logout',
                      onClick: () => {
                        Users.logout();
                        setUser('');
                      },
                      href: '#',
                    }] : anonymousNavbarRoutes(isOpenMemoized))
                ]
                  .map(
                    ({ children, ...rest }, key) =>
                      <Navlink
                        key={key}
                        isTop={isOpenMemoized}
                        {...rest}
                      >
                        {t(children)}
                      </Navlink>
                  )
              }
              <Language isTop={isOpenMemoized} />
            </ul>
          </div>
        </nav>
      </header>
    </div>
  );
};

export default Navbar;
