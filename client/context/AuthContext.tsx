import React, { createContext, useContext, useMemo, useState } from 'react';
import { Token } from 'Storage/Token';
const token = new Token().get();

interface AuthenticatedValidatorInterface {
  authenticated: boolean;
}

interface AuthContextInterface {
  isAuthenticated: boolean;
  login: (v: string) => void;
  setUser: React.Dispatch<React.SetStateAction<string>>;
  user: string;
}

const authDefaultContext: AuthContextInterface = {
  isAuthenticated: !!token,
  login: () => {},
  setUser: () => {},
  user: token || '',
};

const AuthContext = createContext(authDefaultContext);

export const AuthProvider: React.FC<AuthenticatedValidatorInterface> = ({ children, authenticated }) => {
  const [user, setUser] = useState<string>(authDefaultContext.user);
  const isAuthenticated = useMemo(() => (authenticated || !!user), [authenticated, user]);

  const login = (token: string) => {
    new Token().set(token);
    setUser(token);
  };


  return (
    <AuthContext.Provider value={{ isAuthenticated, user, login, setUser }}>
      {children}
    </AuthContext.Provider>
  )
};

export default function useAuth() {
  const context = useContext(AuthContext);

  return context
};
