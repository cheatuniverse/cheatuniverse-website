import React, { useMemo } from 'react';
import { ClassNameInterface } from 'interfaces';

interface ChipInterface {
  deletable?: boolean
  removeChip?: (v: number) => void
  value: number;
}

const AbstractChip: React.FC<ChipInterface & ClassNameInterface> = ({ children, className, removeChip, value }) => (
  <div
    className={`flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full border ${ className }`}>
    <div className="text-xs font-normal leading-none max-w-full flex-initial">{children}</div>
    {
      removeChip ? (
        <div className="flex flex-auto flex-row-reverse">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"
                 className="feather feather-x cursor-pointer hover:text-indigo-400 rounded-full w-4 h-4 ml-2"
                 onClick={() => removeChip(value)}
            >
              <line x1="18" y1="6" x2="6" y2="18" />
              <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
          </div>
        </div>
      ) : null
    }
  </div>
);

export const CheatChip: React.FC<ChipInterface> = props => <AbstractChip {...{...props, className: 'text-gray-700 bg-gray-100 border-gray-700'}} />;

export const SearchChip: React.FC<ChipInterface> = props => <AbstractChip {...{...props, className: 'text-indigo-100 bg-indigo-700 border-indigo-700'}} />;

export const LoadingChip: React.FC = () => useMemo(() => <AbstractChip {...{value: 0, className: 'bg-gray-300 w-1/3 h-5 skeleton-box'}} />, []);
