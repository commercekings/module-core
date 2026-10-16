# CommerceKings admin branding

Works with Magento 2.4+ · PHP 8.1–8.5

[![License](https://badgen.net/github/license/commercekings/module-core)](LICENSE) [![Release](https://badgen.net/github/release/commercekings/module-core)](https://github.com/commercekings/module-core/releases) [![Checks](https://badgen.net/github/checks/commercekings/module-core/main?label=checks)](https://github.com/commercekings/module-core/actions)

**One home for every CommerceKings module in the Magento admin.**

Shared admin branding for CommerceKings modules: one **CommerceKings** configuration tab with the crown icon, and a
"Developed by CommerceKings" footer on CommerceKings configuration pages. On the storefront, it keeps the page cache's
store view and currency on CommerceKings endpoints. No settings or tables.

## Installation

Usually you don't require it yourself – every CommerceKings module brings it. On its own:

```sh
composer require commercekings/module-core:^0.1
bin/magento setup:upgrade
```

## For module authors

- Require `commercekings/module-core` and sequence your module after it in `etc/module.xml`.
- In `etc/adminhtml/system.xml`, use `<tab>commercekings</tab>` and name your section `commercekings_<feature>` to
  get the footer.
- Add `<fieldset_css>commercekings-config-section</fieldset_css>` to the last group to keep Magento's divider above
  the footer.
- Controllers on the action interfaces: add your route id to `CommerceKings\Core\Observer\KeepVaryCookie` (argument
  `routes`) in `etc/frontend/di.xml`, so they keep the shopper's store view and currency in the page cache. It is for
  non-cacheable endpoints only: a cacheable page needs the store and currency context initialized, or it can be
  cached under the wrong store view or currency.

## More

[Compatibility](COMPATIBILITY.md) · [Changes](CHANGELOG.md)
