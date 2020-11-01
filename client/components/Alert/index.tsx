import React from 'react';
import { ClassNameInterface } from 'interfaces';

const AbstractAlert: React.FC<ClassNameInterface> = ({ children, className }) => (
  <div className={`border px-4 py-3 mb-4 rounded relative ${ className }`} role="alert">
    { children }
  </div>
);

export const ErrorAlert: React.FC = ({ children }) => (
  <AbstractAlert className="bg-red-100 border-red-400 text-red-700" children={children} />
);

export const SuccessAlert: React.FC = ({ children }) => (
  <AbstractAlert className="bg-green-100 border-green-400 text-green-700" children={children} />
);
