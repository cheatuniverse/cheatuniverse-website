import { ClassNameInterface } from 'interfaces';
import { SELECT_INPUT } from 'components/Input/AbstractInput';
import { SuggestCheatFormInterface } from 'components/Form/SuggestCheatForm';

export const email = ({ className }: ClassNameInterface = {}) => ({
  className: `w-full ${ className || '' }`,
  name: 'email',
  type: 'email'
});

export const username = ({ className }: ClassNameInterface = {}) => ({
  className: `w-full ${ className || '' }`,
  name: 'username'
});

export const password = ({ className }: ClassNameInterface = {}) => ({
  className: `w-full ${ className || '' }`,
  name: 'password',
  type: 'password'
});

export const downloadLink = ({ className }: ClassNameInterface = {}) => ({
  className: `w-full ${ className || '' }`,
  name: 'downloadLink',
  pattern: 'https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b([-a-zA-Z0-9()@:%_\\+.~#?&//=]*)'
});

export const name = ({ className }: ClassNameInterface = {}) => ({
  className: `w-full ${ className || '' }`,
  name: 'name',
  placeholder: 'cheat name'
});

export const version = ({ className, versions }: ClassNameInterface&SuggestCheatFormInterface = { versions: [] }) => ({
  className: `w-full ${ className || '' }`,
  inputType: SELECT_INPUT,
  name: 'version',
  options: versions.map(i => ({ label: i.name, value: i['@id'] }))
});
