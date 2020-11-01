import React, { useRef, useEffect, RefObject, useCallback, useState } from 'react';
import { useTranslation } from 'i18n';
import { FormInterface } from 'components/Input/AbstractInput';

export const SelectInput: React.FC<FormInterface> = ({ form, onKeyPress, options, ...rest }) => {
  const selectRef = useRef<HTMLSelectElement>();
  const [selected, setSelected] = useState(false);
  const updateValue = useCallback((v: boolean) => {
    setSelected(v);
  }, []);
  useEffect(() => {
    const cb = () => updateValue(true);
    selectRef.current?.addEventListener('change', cb);
    return () => selectRef.current?.removeEventListener('change', cb);
  }, [selectRef, updateValue]);
  useEffect(() => {
    const cb = () => updateValue(false);
    form?.current?.addEventListener('reset', cb);
    return () => form?.current?.removeEventListener('reset', cb);
  }, [form]);
  const { t } = useTranslation('form');
  return (
    <div className="relative">
      <select
        {...rest}
        defaultValue=""
        id={rest.name}
        ref={selectRef as RefObject<HTMLSelectElement>}
        required
        className={`bg-gray-200 appearance-none border-2 text-xl border-gray-200 rounded w-full py-2 px-4 ${ selected ? 'text-gray-800' : 'text-gray-500' } leading-tight focus:outline-none focus:bg-white focus:border-indigo-500 mb-1${ rest.disabled ? ' cursor-not-allowed' : '' }`}>
        <option value="" disabled>Version</option>
        {
          (options || []).map((option, index) => (
            <option value={option.value} key={index}>
              {t(option.label)}
            </option>
          ))
        }
      </select>
      <div className={`absolute inset-y-0 right-0 flex items-center px-2 ${ selected ? 'text-gray-800' : 'text-gray-500' } `}>
        <svg className="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
        </svg>
      </div>
    </div>
  );
};
