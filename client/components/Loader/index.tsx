import React, { useMemo } from 'react';
import { faDownload } from '@fortawesome/free-solid-svg-icons';
import { faYoutube } from '@fortawesome/free-brands-svg-icons';
import { Icon } from 'components/Icon';
import { LoadingChip } from 'components/Chip';

export const Loader: React.FC = () => useMemo(() => (
  <>
    {
      Array.from(Array(4)).map((_, key) => (
        <div className="w-full sm:w-1/2 md:w-1/2 xl:w-1/3 p-4" key={key}>
          <div key={key} className={`bg-white rounded-lg shadow hover:shadow-xl transition-all duration-200 overflow-hidden${ key > 1 ? ' hidden md:block' : '' }`}>
            <div className="divide-y divide-gray-400">
              <div className="py-2">
                <span className="px-4 py-2 text-center text-gray-800 font-bold text-lg inline-block w-full show">
                  <span className="bg-gray-300 skeleton-box h-5 w-1/3 block mx-auto"/>
                </span>
                <div className="px-4 py-2 inline-block w-full">
                  <span className="text-blue-300 cursor-not-allowed">
                    <Icon icon={faDownload}/> Lien de téléchargement
                  </span>
                </div>
                <div className="px-4 py-2 inline-block w-full">
                  <span className="text-red-300 cursor-not-allowed">
                    <Icon icon={faYoutube}/> Lien de la vidéo
                  </span>
                </div>
              </div>
              <div className="p-2 flex flex-wrap">
                {
                  (Array.from(Array(2))).map((_, k) => <LoadingChip key={k} />)
                }
              </div>
            </div>
          </div>
        </div>
      ))
    }
  </>
), []);
