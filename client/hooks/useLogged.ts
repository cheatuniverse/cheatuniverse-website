import { useEffect } from 'react';
import useAuth from 'context/AuthContext';
import { useRouter } from 'next/router';

const useLogged = () => {
  const { isAuthenticated } = useAuth();
  const { replace } = useRouter();
  useEffect(() => {
    if (!isAuthenticated) {
      replace('/');
    }
  }, [isAuthenticated]);
};

export default useLogged;
