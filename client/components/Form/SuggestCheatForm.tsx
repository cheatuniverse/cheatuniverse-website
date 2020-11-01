import React from 'react';
import AbstractForm from './AbstractForm';
import { name, version, downloadLink } from 'components/Input/Fields';
import { Cheats } from 'actions';
import { Version } from 'serializers';

export interface SuggestCheatFormInterface {
  versions: Version[]
}

const SuggestCheatForm: React.FC<SuggestCheatFormInterface> = ({ versions }) => (
  <AbstractForm
    fields={[
      name({ className: 'px-2 w-full xl:w-2/3' }),
      version({ className: 'px-2 w-full xl:w-1/3', versions }),
      downloadLink({ className: 'px-2 w-full' }),
    ]}
    onSubmit={
      data => new Cheats()
        .create(data)
        .then()
    }
  />
);

export default SuggestCheatForm;
