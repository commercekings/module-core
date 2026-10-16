# CommerceKings admin branding

Shared admin branding for CommerceKings modules: one **CommerceKings** configuration tab with the crown icon, and a
"Developed by CommerceKings" footer on CommerceKings configuration pages. No settings, tables or storefront code.

```sh
composer require commercekings/module-core:^0.1
bin/magento setup:upgrade
```

Usually you don't require it yourself – every CommerceKings module brings it.

## For module authors

- Require `commercekings/module-core` and sequence your module after `CommerceKings_Core` in `etc/module.xml`.
- In `etc/adminhtml/system.xml`, use `<tab>commercekings</tab>` and name your section `commercekings_<feature>` to
  get the footer.
- Add `<fieldset_css>commercekings-config-section</fieldset_css>` to the last group to keep Magento's divider above
  the footer.

## More

[Compatibility](COMPATIBILITY.md) · [Changes](CHANGELOG.md)
