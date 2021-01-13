# Kopano Konnect Sign-In

Using this module, users can directly log in or register with their Kopano credentials at this HumHub installation.

A new button "Kopano" will appear on the login page.

## Configuration

Please check the [Kopano instructions](https://documentation.kopano.io/kopanocore_administrator_manual/configure_kc_components.html#configure-3rd-party-applications-to-authenticate-using-konnect) for detailed instructions on registering HumHub as a client with the Kopano OpenID Connect provider.

The following bit needs to be added to the Konnect identifier registration for HumHub:

```yaml
- id: Humhub # your client id in Humhub
  name: Humhub # display name within Konnect
  secret: 12345 # your client secret in Humhub
  trusted: false # set this to true to suppress the consent screen for the user
  application_type: web
  redirect_uris:
  - https://humhub.company.com/user/auth/external?authclient=konnect
  insecure: false
```

Once you have the **Client ID** and **Client Secret** created there, the values must then be entered in the module configuration at: `Administration -> Modules -> Konnect Auth -> Settings`.
This page also displays the `Authorized redirect URI`, which must be inserted in Konnect identifier registration in the corresponding field.
