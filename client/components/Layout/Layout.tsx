import React from 'react';
import Navbar from './Navbar';
import { H1 } from 'components/Typography';
import { Footer } from 'components/Layout/Footer';

interface LayoutInterface {
  title: string;
}

const Layout: React.FC<LayoutInterface> = ({ children, title }) => {
  return (
    <>
      <div className="header">
        <Navbar/>
        <H1 className="text-center pt-16 pb-48 md:pb-64 text-gray-200">
          {title}
        </H1>
      </div>
      { children }
      <Footer />
    </>
  );
};

export default Layout;
