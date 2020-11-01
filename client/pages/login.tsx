import React from 'react';
import Layout from 'components/Layout/Layout';
import { getCommonTranslations, useTranslation } from 'i18n';
import { LoginForm } from 'components/Form';
import { useNotLogged } from 'hooks';
import { NextPage } from 'next';

const Login: NextPage = () => {
  useNotLogged();
  const { t } = useTranslation('login');

  return (
    <Layout title={t('title')}>
      <div className="relative px-0 sm:px-8 lg:px-16 xl:px-32 2xl:px-64 pb-16">
        <div className="bg-white w-full md:w-1/2 mx-auto p-4 rounded-lg -mt-32">
          <LoginForm />
        </div>
      </div>
    </Layout>
  )
};

Login.getInitialProps = () => {
  return { namespacesRequired: [...getCommonTranslations(), 'login', 'form'] }
};

export default Login;
