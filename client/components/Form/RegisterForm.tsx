import React from 'react';
import AbstractForm from './AbstractForm';
import { email, password, username } from 'components/Input/Fields';
import { Users } from 'actions/Users';

const RegisterForm: React.FC = () => {
  return (
    <AbstractForm
      alert={{
        Error: () => (
          <>
            <strong className="font-bold">Error! </strong>
            <span className="block sm:inline">Username or email already exist.</span>
          </>
        ),
        Success: () => (
          <>
            <strong className="font-bold">Success! </strong>
            <span className="block sm:inline">Check your e-mails to activate your account</span>
          </>
        )
      }}
      fields={[
        email(),
        password(),
        username(),
      ]}
      onSubmit={
        ({ email, password, username }) => new Users().register({ email, password, username }).then()
      }
    />
  );
};

export default RegisterForm;
