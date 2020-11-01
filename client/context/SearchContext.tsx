import React, { createContext, Dispatch, useReducer } from 'react';

export const ADD_CHIP = 'ADD_CHIP';
export const REMOVE_CHIP = 'REMOVE_CHIP';
export const SET_CHIPS = 'SET_CHIPS';

interface SearchContextInterface {
  chips: string[];
  dispatch: Dispatch<ActionInterface>;
}

interface ActionInterface {
  payload: number | string | string[];
  type: string;
}


const defaultContext = {
  chips: [],
  dispatch: () => null,
};

export const SearchContext = createContext<SearchContextInterface>(defaultContext);

const glossaryReducer = (state: SearchContextInterface = defaultContext, { payload, type }: ActionInterface) => {
  switch (type) {
    case ADD_CHIP: {
      return {
        ...state,
        chips: [...state.chips, payload as string],
      }
    }
    case REMOVE_CHIP: {
      const sp = state.chips;
      sp.splice(payload as number, 1);
      return {
        ...state,
        chips: [...sp],
      }
    }
    case SET_CHIPS: {
      return {
        ...state,
        chips: payload as string[],
      };
    }
    default:
      return state;
  }
};

export const SearchProvider: React.FC = ({ children}) => {
  const [state, dispatch] = useReducer(glossaryReducer, defaultContext);

  return (
    <SearchContext.Provider value={{ ...state, dispatch }}>
      { children }
    </SearchContext.Provider>
  )
};
