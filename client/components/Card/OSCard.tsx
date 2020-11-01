import React from 'react';
import { DownloadButton } from 'components/Button';
import { useTranslation } from '../../i18n';

interface OSCardInterface {
  img: string;
  link: string;
  system: string;
}

const OSCard = ({ img, link, system }: OSCardInterface): JSX.Element => {
  const { t } = useTranslation('home');

  return (
    <div className="py-4 mx-auto md:mx-4 xl:mx-4 w-full md:w-1/3 md:mb-0 mb-6 flex flex-col justify-center items-center max-w-sm bg-white rounded-lg shadow-lg border border-gray-200">
      <div className="h-32 xl:h-64 w-full rounded-lg bg-contain bg-center bg-no-repeat mb-8" style={{backgroundImage: `url(${img})`}} />
      <div className="w-5/6">
        <a href={link} rel="noopener noreferrer" target="_blank">
          <DownloadButton>
            { t('download', { system }) }
          </DownloadButton>
        </a>
      </div>
    </div>
  )
};

OSCard.getInitialProps = async () => ({ namespacesRequired: ['home'] });

export default OSCard;
