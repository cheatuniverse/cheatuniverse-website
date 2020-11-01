import React, { useContext, useMemo, useState } from 'react';
import Layout from 'components/Layout/Layout';
import InfiniteScroll from 'react-infinite-scroller';
import { getCommonTranslations, useTranslation } from 'i18n';
import CheatCard from 'components/Card/CheatCard';
import SearchInput from 'components/Input/SearchInput';
import { SearchContext, SearchProvider } from 'context';
import { Cheats as CheatAction } from 'actions';
import { CheatInterface } from 'interfaces';
import { Loader } from 'components/Loader';
import { NextPage } from 'next';

interface CheatsInterface {
  cheats: CheatInterface[];
  hasNext: boolean;
}

const CheatGrid: React.FC<{ cheats: CheatInterface[] }> = ({ cheats }) => useMemo(() => (
  <>
    {
      cheats.map((item, key) => (
        <div key={key} className="w-full sm:w-1/2 md:w-1/2 xl:w-1/3 p-4">
          <CheatCard {...item} />
        </div>
      ))
    }
  </>
), [cheats]);

const CheatsLayout: React.FC<CheatsInterface> = ({ cheats, hasNext }) => {
  const { chips } = useContext(SearchContext);
  const [cheatsState, setCheatsState] = useState<CheatInterface[]>(cheats);
  const [hasMore, setHasMore] = useState<boolean>(hasNext);

  const memoizedCheatList = useMemo(() => cheatsState.filter(
    c => !chips.length || chips.some(
      cs => c.name.toLowerCase().includes(cs.toLowerCase())
        || c.chips.map(x => x.toLowerCase()).some(cch => cch.includes(cs.toLowerCase()))
    )
  ), [cheatsState, chips]);
  return (
    <>
      <div className="mb-4 px-4">
        <SearchInput />
      </div>
      <InfiniteScroll
        className="flex flex-wrap"
        pageStart={1}
        loadMore={(page: any): void => {
          new CheatAction({ pagination: { page } }).getMany().then(({ data, hasNext }) => {
            setHasMore(hasNext);
            setCheatsState([...cheatsState, ...(data as CheatInterface[])])
          });
        }}
        hasMore={hasMore}
        loader={<Loader />}
      >
        <CheatGrid cheats={memoizedCheatList} />
      </InfiniteScroll>
    </>
  )
};

const Cheats: NextPage = props => {
  const { t } = useTranslation('cheats');

  return (
    <Layout title={t('title')}>
      <div className="relative px-0 sm:px-8 lg:px-16 xl:px-32 2xl:px-64 pb-16">
        <div className="bg-white w-full p-4 rounded-lg -mt-32">
          <SearchProvider>
            <CheatsLayout {...{...props} as CheatsInterface}/>
          </SearchProvider>
        </div>
      </div>
    </Layout>
  )
};

Cheats.getInitialProps = async () => {
  try {
    const { data, hasNext } = await new CheatAction().getMany();
    return { props: { cheats: JSON.parse(JSON.stringify(data)), hasNext, namespacesRequired: [...getCommonTranslations(), 'cheats'] } }
  } catch (e) {}
  return { props: { cheats: JSON.parse(JSON.stringify([])), hasNext: false, namespacesRequired: [...getCommonTranslations(), 'cheats'] } }
};

export default Cheats;
