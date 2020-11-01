import React from 'react';
import { ClassNameInterface } from 'interfaces';

export const AbstractHead: React.FC = ({ children }) => (
  <thead className="text-gray-600 text-xs font-semibold border-gray tracking-wider text-left px-5 py-3 bg-gray-100 hover:cursor-pointer uppercase border-b-2 border-gray-200">
    { children }
  </thead>
);
export const AbstractBody: React.FC = ({ children }) => (
  <tbody>
    { children }
  </tbody>
);

export const AbstractHeadRow: React.FC = ({ children }) => (
  <tr className="border-b border-gray">
    { children }
  </tr>
);
export const AbstractBodyRow: React.FC = ({ children }) => (
  <tr className="hover:bg-gray-100 hover:cursor-pointer text-left">
    { children }
  </tr>
);

export const AbstractTH: React.FC<ClassNameInterface> = ({ children, className }) => (
  <th scope="col" className={`text-gray-dark border-gray border-b-2 border-t-2 border-gray-200 p-3 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider ${ className }`}>
    { children }
  </th>
);

export const AbstractTD: React.FC<ClassNameInterface> = ({ children, className }) => (
  <th scope="col" className={`py-4 px-6 border-b border-gray-200 text-gray-900 text-sm ${ className }`}>
    { children }
  </th>
);

export const AbstractTable: React.FC = ({ children }) => (
  <div className="border-gray-200 w-full rounded bg-white overflow-x-auto">
    <table className="w-full leading-normal">
      { children }
    </table>
  </div>
);
