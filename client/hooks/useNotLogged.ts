import useAuth from 'context/AuthContext';
import { useRouter } from 'next/router';

const useNotLogged = () => {
  const { isAuthenticated } = useAuth();
  const { push } = useRouter();
  if (isAuthenticated) {
    push('/')
  }
};

export default useNotLogged;
