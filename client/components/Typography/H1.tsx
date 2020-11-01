import React from 'react';
import { ClassNameInterface } from 'interfaces';

export const H1: React.FC<ClassNameInterface> = ({ className, children }) => (
  <h1 className={`font-extrabold text-4xl md:text-5xl lg:text-6xl ${ className || '' }`}>
    {children}
  </h1>
);
