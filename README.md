# CommerceKings_Core

Shared admin branding for CommerceKings Magento 2 modules:

- One CommerceKings configuration tab with the crown icon.
- A Developed by **CommerceKings** footer linking to `https://commercekings.net`, shown only on CommerceKings configuration pages.

This package has no feature settings, database tables, storefront assets or consent logic.
Feature modules keep their own configuration sections, ACL resources and business logic.

## Installation

CommerceKings modules that use the shared admin tab require this package through Composer.
After the first release is published, it can also be installed explicitly:

```sh
composer require commercekings/module-core:^0.1
bin/magento module:enable CommerceKings_Core
bin/magento setup:upgrade
bin/magento cache:clean
```

Follow the shop's normal static-content deployment process for production.

## For module authors

Require `commercekings/module-core: ^0.1` in `composer.json`, and sequence your module
after `CommerceKings_Core` in `etc/module.xml`. In your own `etc/adminhtml/system.xml`,
use `<tab>commercekings</tab>` without redeclaring the tab. Name your section
`commercekings_<feature>` to display the shared footer.

For a native configuration fieldset that ends directly above the footer, add
`<fieldset_css>commercekings-config-section</fieldset_css>` to its group to keep
Magento's divider above the branding.

The core has no dependency on Consent or any other CommerceKings feature, so future
standalone modules can reuse the tab without installing consent functionality.

See [compatibility](COMPATIBILITY.md) and [changes](CHANGELOG.md).
No public release has been tagged or published yet.
