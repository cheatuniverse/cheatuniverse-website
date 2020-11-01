import React, { createRef, useEffect, useState } from 'react';
import { useTranslation } from 'i18n';
import { SerializeItemInterface } from 'interfaces/SerializerInterface';
import { ErrorAlert, SuccessAlert } from 'components/Alert';
import { AxiosResponse } from 'axios';
import AbstractInput, { AbstractInputInterface } from 'components/Input/AbstractInput';
import { TFunction } from 'next-i18next';

interface AbstractFormInterface {
  alert?: { Error: () => JSX.Element; Success: () => JSX.Element; }
  fields: AbstractInputInterface[];
  onError?: () => void;
  onSubmit: (e: Record<string, string>) => Promise<AxiosResponse>;
  onSuccess?: (e: SerializeItemInterface) => void;
  button?: string;
}

export const formatFormToJson = (
  elements: HTMLFormElement
): Record<string, string> => {
  const formData: any = new FormData(elements);
  return Object.fromEntries(formData);
};

function getTranslation(translation: string, t: TFunction) {
  const translated = t(translation);
  return translated !== translation ? translated : '';
}

function fieldsModifier(fields: AbstractInputInterface[], t: TFunction): AbstractInputInterface[] {
  return fields.map(f => ({
    ...f,
    placeholder: getTranslation(`fields.${f.name}.placeholder`, t),
    label: getTranslation(`fields.${f.name}.label`, t),
  }));
}

const AbstractForm: React.FC<AbstractFormInterface> = ({ alert, button, fields, onSubmit }) => {
  const { t } = useTranslation('form');
  const formRef = createRef<HTMLFormElement>();

  const [isLoading, setLoading] = useState<boolean>(false);
  const [hasError, setError] = useState<boolean>(false);
  const [hasSuccess, setSuccess] = useState<boolean>(false);
  const [reset, setReset] = useState<HTMLFormElement>();

  useEffect(() => {
    formRef.current && setReset(formRef.current);
  }, [formRef]);

  return (
    <form ref={formRef} onSubmit={(e: any) => {
      e.preventDefault();
      e.stopPropagation();
      setLoading(true);
      setSuccess(false);
      setError(false);
      onSubmit(
        formatFormToJson(e.target as HTMLFormElement))
        .then(() => {
          reset?.reset();
          setSuccess(true);
        })
        .catch(() => setError(true))
        .finally(() => setLoading(false));
    }}>
      {
        alert ? (
          <div className="px-6">
            {
              alert.Error && hasError ? (
                <ErrorAlert>
                  <alert.Error />
                </ErrorAlert>
              ) : null
            }
            {
              alert.Success && hasSuccess ? (
                <SuccessAlert>
                  <alert.Success />
                </SuccessAlert>
              ) : null
            }
          </div>
        ) : null
      }
      <div className={`px-6 rounded text-black w-full${ isLoading ? ' opacity-50' : '' }`}>
        <div className="flex flex-wrap">
          {
            fieldsModifier(fields, t).map((f, key) =>  (
              <AbstractInput
                {...f}
                form={formRef}
                disabled={isLoading}
                key={key}
              />
            ))
          }
        </div>
        <div className="flex pt-2">
          <button
            disabled={isLoading}
            className={`flex mx-auto bg-white text-indigo-500 font-semibold py-2 px-4 border border-indigo-500 duration-200 transition-all rounded-full shadow-md ${ isLoading ? 'cursor-not-allowed' : 'hover:bg-indigo-500 hover:text-white' }`}
            type="submit">
            {
              isLoading ? (
                <svg className="animate-spin h-6 w-6 text-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24">
                  <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4" />
                  <path
                    className="opacity-75"
                    fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"/>
                </svg>
              ) :
                t(button || 'submit')
            }
          </button>
        </div>
      </div>
    </form>
  );
};

export const getServerSideProps = async () => {
  return { props: { namespacesRequired: ['form'] } }
};

export default AbstractForm;
