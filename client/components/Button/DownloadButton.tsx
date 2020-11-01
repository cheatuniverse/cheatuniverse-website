import React from 'react';

export const DownloadButton: React.FC = ({ children }) => (
  <button className="font-bold text-xl md:text-xl lg:text-2xl xl:text-3xl text-blue-800 hover:text-white py-2 px-4 sm:px-8 md:px-2 lg:px-6 border border-blue-800 hover:bg-blue-800 bg-white transition-all duration-300 rounded">
    {children}
  </button>
);
