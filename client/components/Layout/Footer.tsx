import React from 'react';
import { Icon } from 'components/Icon';
import { faDiscord } from '@fortawesome/free-brands-svg-icons';
import { useTranslation } from 'i18n';

export const Footer: React.FC = () => {
  const { t } = useTranslation('common');
  return (
    <div className="overflow-hidden h-64 relative">
      <img alt="Footer background"
           className="w-full h-full object-cover"
           src="https://fr-minecraft.net/upload/wallpapers/images/fr-minecraft_wallpaper_UDWX.png"/>
      <div className="absolute bottom-0 p-4 overflow-hidden w-full h-full flex footer-overlay">
        <a rel="noopener noreferrer" target="_blank"
           href="https://discord.gg/KNCtrdvjNj"
           className="m-auto text-decoration-none text-white text-3xl md:text-4xl lg:text-6xl">
          <Icon icon={faDiscord} /> { t('footer') }
        </a>
      </div>
    </div>
  );
};
