# Compatibility and verification

The first-release runtime target is Magento Open Source 2.4.9 with PHP 8.5.
The Composer PHP range is a dependency constraint, not a claim that every
Magento/PHP combination has passed runtime testing.

**Minimum: Magento Open Source 2.4.4**, enforced by `magento/framework: ^103.0.4`. Magento 2.4.0–2.4.3
run only on PHP 7.3/7.4; this package needs PHP 8.1.

| Magento Open Source | PHP | Runtime verification |
| --- | --- | --- |
| 2.4.9 | 8.5 | Passed locally: Composer, XML schemas, DI, unit tests, PHPStan level 5, coding standard |
| 2.4.4–2.4.8 | 8.1–8.4 | Unverified; use a matching Magento dependency set and services |

Verified locally on 2026-10-15: Composer installation, native XML schemas, the
shared configuration tab, footer rendering on CommerceKings sections only,
admin static-content deployment, Magento DI compilation, database status,
PHPStan level 5 and Magento2 coding standards. This module contains no storefront
integration or database schema. Unit tests render the footer for owned, unrelated
and malformed configuration sections. Repeat checks alongside the feature packages
before release; installation from distribution archives remains pending.

The GitHub workflow checks package metadata, PHP syntax on 8.1–8.5 and Git archive
contents. Runtime support for other Magento versions remains unverified. Latest results are available in
[GitHub Actions](https://github.com/commercekings/module-core/actions).
