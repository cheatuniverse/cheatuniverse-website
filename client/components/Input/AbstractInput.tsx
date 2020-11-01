import React, { ChangeEvent, KeyboardEvent, RefObject } from 'react';
import { ClassNameInterface } from 'interfaces';
import { SelectInput } from 'components/Input/SelectInput';

export const SELECT_INPUT = 'SELECT_INPUT';

interface OptionInterface {
  label: string;
  value: string;
}

interface InputGuesserInterface {
  disabled?: boolean;
  name: string;
  onChange?: (v: ChangeEvent<HTMLInputElement|HTMLSelectElement>) => void;
  onKeyPress?: (v: KeyboardEvent<HTMLInputElement>) => void;
  options?: OptionInterface[];
  placeholder?: string;
  type?: string;
  inputType?: string;
  value?: string;
  values?: { id: string, value: string }[];
}

export interface AbstractInputInterface extends InputGuesserInterface {
  label?: string;
}

export interface FormInterface extends AbstractInputInterface {
  form?: RefObject<HTMLFormElement>;
}

const InputGuesser: React.FC<FormInterface> = ({ form, inputType, onKeyPress, ...rest }) => {
  switch (inputType) {
    case SELECT_INPUT: {
      return <SelectInput {...{...rest, form}} />;
    }
    default: {
      return (
        <input
          id={rest.name}
          required
          onKeyPress={onKeyPress}
          className={`bg-gray-200 appearance-none border-2 text-xl border-gray-200 rounded w-full py-2 px-4 text-gray-800 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500 mb-1${ rest.disabled ? ' cursor-not-allowed' : '' }`}
          {...rest}
        />
      )
    }
  }
};

const AbstractInput: React.FC<FormInterface & ClassNameInterface> = ({ className, label, name, ...rest }) => (
  <div className={`${ className ? `${ className } `  : '' } mb-4`}>
    {
      label ? (
        <label className="block text-gray-500 text-xl font-bold mb-1 md:mb-0 px-4" htmlFor={name}>
          { label }
        </label>
      ) : null
    }
    <InputGuesser {...rest} name={name} />
  </div>
);

export default AbstractInput;
