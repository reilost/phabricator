<?php

final class PhabricatorSSOAuthProvider
  extends PhabricatorOAuth2AuthProvider {

  public function getProviderName() {
    return pht('SSO');
  }

  protected function getProviderConfigurationHelp() {
    $uri = PhabricatorEnv::getProductionURI('/');
    $callback_uri = PhabricatorEnv::getURI($this->getLoginURI());

    return pht(
      "To configure SSO OAuth, create a new SSO Application here:".
      "\n\n".
      "http://sso.ricebook.net".
      "\n\n".
      "You should use these settings in your application:".
      "\n\n".
      "  - **URL:** Set this to your full domain with protocol. For this ".
      "    Phabricator install, the correct value is: `%s`\n".
      "  - **Callback URL**: Set this to: `%s`\n".
      "\n\n".
      "Once you've created an application, copy the **Client ID** and ".
      "**Client Secret** into the fields above.",
      $uri,
      $callback_uri);
  }

  protected function newOAuthAdapter() {
    return new PhutilSSOAuthAdapter();
  }

  protected function getLoginIcon() {
    return 'SSO';
  }
}
