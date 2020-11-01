import React from 'react';
import Layout from '../components/Layout';
import OSCard from 'components/Card/OSCard';
import { FeatureCard } from 'components/Card';
import { faFistRaised, faGhost, faSyringe, faCubes } from '@fortawesome/free-solid-svg-icons';
import { H2 } from 'components/Typography';
import { getCommonTranslations, useTranslation } from 'i18n';
import { Platforms } from 'actions';

interface HomeInterface {
  platforms: {
    img: string;
    link: string;
    system: string;
  }[]
}

const Home = ({ platforms }: HomeInterface): JSX.Element => {
  const { t } = useTranslation('home');
  return (
    <Layout title={t('title')}>
      <div className="relative px-4 sm:px-8 lg:px-16 xl:px-24 2xl:px-32 pb-16 text-center">
        <div className="flex flex-col md:flex-row items-start justify-center -mt-32 xl:-mt-48 px-10">
          {
            platforms.map((item, key) => (
              <OSCard key={key} {...item} />
            ))
          }
        </div>
        <section className="pt-32">
          <H2 className="text-blue-700 text-5xl md:text-5xl lg:text-6xl">
            Supported features
          </H2>
          <div className="px-4 sm:px-8 lg:px-16 xl:px-48 text-center flex flex-wrap pt-8">
            {
              [
                {
                  children: 'Hacked Clients',
                  className: 'text-red-600',
                  icon: faFistRaised,
                },
                {
                  children: 'Ghost clients',
                  className: 'text-orange-500',
                  icon: faGhost,
                },
                {
                  children: 'Injected clients',
                  className: 'text-blue-400',
                  icon: faSyringe,
                },
                {
                  children: 'Custom launchers',
                  className: 'text-green-600',
                  icon: faCubes,
                }
              ].map((item, key) => (
                <FeatureCard key={key} {...item} />
              ))
            }
          </div>
        </section>
      </div>
    </Layout>
  );
};

Home.getInitialProps = async () => {
  const { data } = await new Platforms().getHomePlatforms();
  return { props: { platforms: JSON.parse(JSON.stringify(data)), namespacesRequired: [...getCommonTranslations(), 'home'] } }
};

export default Home;
