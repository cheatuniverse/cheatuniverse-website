import React from 'react';
import Layout from 'components/Layout/Layout';
import { getCommonTranslations, useTranslation } from 'i18n';
import { RegisterForm } from 'components/Form';
import { NextPage } from 'next';

const Register: NextPage = () => {
  const { t } = useTranslation('register');

  return (
    <Layout title={t('title')}>
      <div className="relative px-0 sm:px-8 lg:px-16 xl:px-32 2xl:px-64 pb-16">
        <div className="bg-white w-full md:w-1/2 mx-auto p-4 rounded-lg -mt-32">
          <RegisterForm />
        </div>
      </div>
    </Layout>
  )
};

Register.getInitialProps = async () => {
  return { props: { namespacesRequired: [...getCommonTranslations(), 'register', 'form'] } }
};

export default Register;
