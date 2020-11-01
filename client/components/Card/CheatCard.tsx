import React from 'react';
import { faDownload } from '@fortawesome/free-solid-svg-icons';
import { faYoutube } from '@fortawesome/free-brands-svg-icons';
import { Icon } from 'components/Icon';
import { CheatChip } from 'components/Chip';

interface CheatCardInterface {
  chips?: string[];
  downloadLink: string;
  name: string;
  youtubeLink: string;
}

const CheatCard: React.FC<CheatCardInterface> = ({ chips = [], downloadLink, name, youtubeLink }) => (
  <div className="bg-white rounded-lg shadow hover:shadow-lg transition-all duration-200 overflow-hidden">
    <div className="divide-y divide-gray-400">
      <div className="py-2">
        <span className="px-4 py-2 text-center text-gray-800 font-bold text-lg inline-block w-full">
          { name }
        </span>
        <div className="px-4 py-2 inline-block w-full">
          <a href={downloadLink} target="_blank" rel="noreferrer nofollow noopener" className="hover:text-blue-900 text-blue-700 cursor-pointer">
            <Icon icon={faDownload}/> Lien de téléchargement
          </a>
        </div>
        <div className="px-4 py-2 inline-block w-full">
          {
            youtubeLink ?
              <a href={youtubeLink} target="_blank" rel="noreferrer nofollow noopener" className="hover:text-red-900 text-red-700 cursor-pointer">
                <Icon icon={faYoutube}/> Lien de la vidéo
              </a> :
              <span className="text-red-300 cursor-not-allowed">
                <Icon icon={faYoutube}/> Lien de la vidéo
              </span>
          }
        </div>
      </div>
      <div className="p-2 flex flex-wrap">
        {
          chips.map((chip, key) => <CheatChip key={key} value={key}>{ chip }</CheatChip>)
        }
      </div>
    </div>
  </div>
);

export default CheatCard;
