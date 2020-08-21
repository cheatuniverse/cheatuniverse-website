import React from 'react';
import '../styles/main.css';

interface AppInterface {
  Component: React.FC;
  pageProps: Record<string, string>;
}

export default function App({ Component, pageProps }: AppInterface) {
  return <Component {...pageProps} />;
}
