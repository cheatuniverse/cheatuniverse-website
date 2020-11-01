import React from 'react';
import { NextPage } from 'next';
import { getCommonTranslations } from 'i18n';

const Error: NextPage = () => (
  <h1>
    An error occurred
  </h1>
);

Error.getInitialProps = async () => ({ props: { namespacesRequired: [...getCommonTranslations(), 'error'] } });

export default Error;
