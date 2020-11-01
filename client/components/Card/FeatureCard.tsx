import React from 'react';
import { IconDefinition } from '@fortawesome/fontawesome-svg-core';
import { Icon } from 'components/Icon';
import { ClassNameInterface } from 'interfaces';
import { H2 } from 'components/Typography';

interface FeatureCardInterface extends ClassNameInterface {
  icon: IconDefinition;
}

const FeatureCard: React.FC<FeatureCardInterface> = ({ children, className, icon }) => (
  <div className="w-full md:w-1/2 p-2">
    <div className={`p-4 bg-white rounded-lg shadow-lg border border-gray-200 ${className || ''}`}>
      <span className="block text-6xl">
        <Icon icon={icon}/>
      </span>
      <H2>
        {children}
      </H2>
    </div>
  </div>
);

export default FeatureCard;
