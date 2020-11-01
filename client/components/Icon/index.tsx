import React from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { IconDefinition } from '@fortawesome/fontawesome-svg-core';

interface indexInterface {
  icon: IconDefinition;
}

export const Icon: React.FC<indexInterface> = ({ icon }) => <FontAwesomeIcon icon={icon} />;
