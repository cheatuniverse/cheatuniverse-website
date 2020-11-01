import React, { useContext, useState } from 'react';
import { ClassNameInterface } from 'interfaces';
import { ADD_CHIP, SearchContext, REMOVE_CHIP } from 'context';
import { SearchChip } from 'components/Chip';
import AbstractInput from 'components/Input/AbstractInput';

const SearchInput: React.FC<ClassNameInterface> = ({ className }) => {
  const { chips, dispatch } = useContext(SearchContext);
  const [search, setSearch] = useState('');
  const addChip = (chip: string) => dispatch({
    payload: chip,
    type: ADD_CHIP
  });
  const removeChip = (index: number) => dispatch({
    payload: index,
    type: REMOVE_CHIP
  });
  const updateSearch = (search: string) => {
    const s = search.trimLeft();
    if (s.includes(' ')) {
      const st = s.split(' ');
      addChip(st[0]);
      setSearch(st[1] || '');
    } else {
      setSearch(s);
    }
  };

  return (
    <>
      <AbstractInput
        className={className}
        label="Search"
        name="search"
        placeholder="Search something..."
        onChange={({ target: { value } }) => updateSearch(value)}
        onKeyPress={e => 'Enter' === e.key && updateSearch(`${search} `)}
        value={search}
      />
      <div className="flex flex-wrap">
        {
          chips.map((chip, key) => <SearchChip key={key} removeChip={removeChip} value={key}>{ chip }</SearchChip>)
        }
      </div>
    </>
  );
};

export default SearchInput
