import React from 'react';
import '../styles/main.css';
import { appWithTranslation, i18n } from 'i18n';
import { AuthProvider } from 'context/AuthContext';
import { config } from "@fortawesome/fontawesome-svg-core";
import '@fortawesome/fontawesome-svg-core/styles.css';
import cookie from 'cookie';
config.autoAddCss = false;

interface AppInterface {
  Component: React.FC;
  pageProps: Record<string, string|boolean>;
}

const App = ({ Component, pageProps }: AppInterface) => {
  return (
    <AuthProvider authenticated={pageProps.authenticated as boolean}>
      <Component {...pageProps} />
    </AuthProvider>
  );
};

App.getInitialProps = async ({ Component, ctx }: any) => {
  let authenticated: boolean = false;
  const { req } = ctx;
  if (req) {
    i18n.language = req.i18n.language;
    req.cookies = cookie.parse(req.headers.cookie || '');
    authenticated = !!req.cookies.token;
  }
  if (Component.getInitialProps) {
    const { props, ...rest } = await Component.getInitialProps(ctx);
    return {
      pageProps: {
        ...rest,
        ...props,
        authenticated,
        props
      }
    }
  }
  return { pageProps: {} }
};

export default appWithTranslation(App);
