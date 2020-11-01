import React from 'react';
import { ClassNameInterface } from 'interfaces';

export const H2: React.FC<ClassNameInterface> = ({ className, children }) => (
  <h2 className={`${ className ? `${className} ` : '' }text-2xl md:text-3xl lg:text-4xl`}>
    {children}
  </h2>
);
