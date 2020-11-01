import React from 'react';
import AbstractForm from './AbstractForm';
import { password, username } from 'components/Input/Fields';
import { Users } from 'actions/Users';
import useAuth from 'context/AuthContext';

const LoginForm: React.FC = () => {
  const { login } = useAuth();
  return (
    <AbstractForm
      fields={[
        username(),
        password(),
      ]}
      onSubmit={
        ({ password, username }) => new Users()
          .login({ password, username })
          .then(({ token }) => {
            login(token);
            return token;
          })
      }
    />
  );
};

export default LoginForm;
