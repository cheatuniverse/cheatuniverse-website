import React, { useContext, useMemo } from 'react';
import {
  AbstractBody,
  AbstractBodyRow,
  AbstractHead,
  AbstractHeadRow,
  AbstractTable, AbstractTD,
  AbstractTH
} from 'components/Table/AbstractTable';
import { useTranslation } from 'i18n';
import { ClassNameInterface } from 'interfaces';
import { SearchContext } from 'context';

interface CategoryModule extends ClassNameInterface {
  name: string;
  modules: string[];
}

interface GlossaryItemInterface extends ClassNameInterface {
  category: string;
  description: string;
  name: string;
}

const modules: CategoryModule[] = [
  {
    className: 'bg-red-200 text-red-900',
    name: 'Combat',
    modules: [
      'AimAssist',
      'Antibot',
      'AutoArmor',
      'AutoClick',
      'AutoPot',
      'AutoSoup',
      'BedAura',
      'BowAimbot',
      'EggAura',
      'FastBow',
      'InvCleaner',
      'KillAura',
      'Regen',
      'Triggerbot',
      'Velocity'
    ]
  },
  {
    className: 'bg-green-200 text-green-900',
    name: 'Misc',
    modules: [
      'AutoFish',
      'Day',
      'FastPlace',
      'IRC',
      'Scaffold',
      'Tower'
    ]
  },
  {
    className: 'bg-orange-200 text-orange-900',
    name: 'Movement',
    modules: [
      'AutoSneak',
      'FastLadder',
      'IceSpeed',
      'Jesus',
      'LongJump',
      'NoSlowDown',
      'SafeWalk',
      'Speed',
      'Step',
      'Strafe',
      'Sprint'
    ]
  },
  {
    className: 'bg-indigo-200 text-indigo-900',
    name: 'Player',
    modules: [
      'Blink',
      'ChestAura',
      'ChestStealer',
      'FastEat',
      'Firion',
      'Flight',
      'Freecam',
      'Glide',
      'NoRotate',
      'NoFall',
      'OnGround',
      'Phase',
      'PingSpoof'
    ]
  },
  {
    className: 'bg-purple-200 text-purple-900',
    name: 'Render',
    modules: [
      'ArmorHUD',
      'Chams',
      'ChestESP',
      'EffectHUD',
      'ESP',
      'Fullbright',
      'NameTags',
      'Tracers',
      'Trajectories',
      'Xray'
    ]
  },
];

const GlossaryTable = () => {
  const { t } = useTranslation('glossary');
  const memoizedGlossaryItems: GlossaryItemInterface[] = useMemo(() =>
    [].concat.apply(
      [],
      modules.map(({ className, name, modules }) =>
        modules.map(i => ({
          category: name,
          className,
          description: t(`${name}.modules.${i}`),
          name: i,
        }))
      ) as any
    ), []);
  const { chips } = useContext(SearchContext);

  return (
    <AbstractTable>
      <AbstractHead>
        <AbstractHeadRow>
          <AbstractTH className="w-2/12">
            {t('table.header.category')}
          </AbstractTH>
          <AbstractTH className="w-2/12">
            {t('table.header.module')}
          </AbstractTH>
          <AbstractTH className="w-2/3">
            {t('table.header.description')}
          </AbstractTH>
        </AbstractHeadRow>
      </AbstractHead>
      <AbstractBody>
        {
          memoizedGlossaryItems
            .filter(
              ({ category, description, name }) =>
                !chips.length || chips.some(
                  c =>
                    category.toLowerCase().includes(c.toLowerCase())
                    || description.toLowerCase().includes(c.toLowerCase())
                    || name.toLowerCase().includes(c.toLowerCase())
                )
            )
            .map(
              (item, key) => (
                <AbstractBodyRow key={key}>
                  <AbstractTD>
                    <span className={`relative inline-block px-3 py-1 font-semibold leading-tight rounded-full ${ item.className }`}>
                      {t(`${item.category}.label`)}
                    </span>
                  </AbstractTD>
                  <AbstractTD>
                    <span>{item.name}</span>
                  </AbstractTD>
                  <AbstractTD>
                    <span>{t(`${item.category}.modules.${item.name}`)}</span>
                  </AbstractTD>
                </AbstractBodyRow>
              )
            )
        }
      </AbstractBody>
    </AbstractTable>
  )
};

GlossaryTable.getInitialProps = async () => ({ namespacesRequired: ['glossary'] });

export default GlossaryTable;
