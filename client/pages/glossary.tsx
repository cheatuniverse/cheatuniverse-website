import React from 'react';
import Layout from 'components/Layout/Layout';
import { SearchInput } from 'components/Input';
import { GlossaryTable } from 'components/Table';
import { getCommonTranslations, useTranslation } from 'i18n';
import { SearchProvider } from 'context';
import { NextPage } from 'next';

const Glossary: NextPage = (): JSX.Element => {
  const { t } = useTranslation('glossary');
  return (
    <Layout title={t('title')}>
      <div className="relative px-0 sm:px-8 lg:px-16 xl:px-32 2xl:px-64 pb-16">
        <div className="bg-white w-full p-4 rounded-lg -mt-32">
          <SearchProvider>
            <div className="mb-4">
              <SearchInput />
            </div>
            <GlossaryTable />
          </SearchProvider>
        </div>
      </div>
    </Layout>
  )
};

Glossary.getInitialProps = async () => ({ props: { namespacesRequired: [...getCommonTranslations(), 'glossary'] } });

export default Glossary;
