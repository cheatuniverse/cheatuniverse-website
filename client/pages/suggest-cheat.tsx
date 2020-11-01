import React from 'react';
import Layout from 'components/Layout/Layout';
import { getCommonTranslations, useTranslation } from 'i18n';
import { SuggestCheatForm } from 'components/Form';
import { useLogged } from 'hooks';
import { NextPage } from 'next';
import { Versions } from 'actions';
import { SuggestCheatFormInterface } from 'components/Form/SuggestCheatForm';

interface SuggestCheatInterface {
  props: SuggestCheatFormInterface
}

const SuggestCheat: NextPage<SuggestCheatInterface> = ({ props: { versions } }) => {
  useLogged();
  const { t } = useTranslation('suggest-cheat');

  return (
    <Layout title={t('title')}>
      <div className="relative px-0 sm:px-8 lg:px-16 xl:px-32 2xl:px-64 pb-16">
        <div className="bg-white w-full md:w-1/2 mx-auto p-4 rounded-lg -mt-32">
          <SuggestCheatForm versions={versions} />
        </div>
      </div>
    </Layout>
  )
};

SuggestCheat.getInitialProps = async () => {
  try {
    const { data } = await new Versions().getMany();
    return {
      props: {
        versions: JSON.parse(JSON.stringify(data)),
        namespacesRequired: [...getCommonTranslations(), 'suggest-cheat', 'form']
      }
    }
  } catch (e) {}

  return {
    props: {
      versions: JSON.parse(JSON.stringify([])),
      namespacesRequired: [...getCommonTranslations(), 'suggest-cheat', 'form']
    }
  }
};

export default SuggestCheat;
