# CommerceKings admin branding<a href="https://commercekings.net"><picture><source media="(prefers-color-scheme: dark)" srcset="https://raw.githubusercontent.com/commercekings/module-core/main/.github/commercekings-dark.svg"><img align="right" width="152" src="https://raw.githubusercontent.com/commercekings/module-core/main/.github/commercekings-light.svg" alt="Built by CommerceKings. Ready to sell more? Talk to us"></picture></a>

Works with Magento 2.4.4+ · PHP 8.1–8.5

[![License](https://badgen.net/github/license/commercekings/module-core)](LICENSE) [![Release](https://badgen.net/github/release/commercekings/module-core)](https://github.com/commercekings/module-core/releases) [![Checks](https://github.com/commercekings/module-core/actions/workflows/checks.yml/badge.svg?branch=main)](https://github.com/commercekings/module-core/actions/workflows/checks.yml)

**One home for every CommerceKings module in the Magento admin.**

Shared admin branding for CommerceKings modules: one **CommerceKings** configuration tab with the crown icon, and a
"Developed by CommerceKings" footer on CommerceKings configuration pages. No settings, tables or storefront code.

## Installation

Usually you don't require it yourself – every CommerceKings module brings it. On its own:

```sh
composer require commercekings/module-core:^0.1
bin/magento setup:upgrade
```

## Extending

- Require `commercekings/module-core` and sequence your module after it in `etc/module.xml`.
- In `etc/adminhtml/system.xml`, use `<tab>commercekings</tab>` and name your section `commercekings_<feature>` to
  get the footer.
- Add `<fieldset_css>commercekings-config-section</fieldset_css>` to the last group to keep Magento's divider above
  the footer.

## More

[Compatibility](COMPATIBILITY.md) · [Changes](CHANGELOG.md)

---

**Need help installing or setting it up?** **[Get a quote →](https://commercekings.net)**
