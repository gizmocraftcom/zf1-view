# Changelog

## 2.0.0

- Package renamed to `gizmocraft/zendframework1-view` (fork of `diablomedia/zendframework1-view`).
- Requires PHP >= 8.5; CI runs on PHP 8.5 and 8.6.
- Depends on the `gizmocraft/zendframework1-*` forks (currency, exception, filter, http, json, loader, locale, registry, translate) at `^2.0.0`.
- The `suggest` entries for the view helper packages (action, baseurl, layout, navigation, partial, paginationcontrol, url) now point to the `gizmocraft/` forks.
- Dev dependencies upgraded to PHPUnit 13, PHPStan 2.3, php-cs-fixer 3.95 and GrumPHP 2.27; `composer-require-checker` dropped.
- Tests migrated to PHPUnit 13 (`#[Group]`, `#[Depends]` and `#[DoesNotPerformAssertions]` attributes instead of annotations; error handler restored in a `finally` block; `spl_object_id()` instead of `spl_object_hash()`, which PHP 8.6 deprecates).

### Fixed

- `Zend_View_Stream` (used when `short_open_tag` is off): the converted markup (`<?=` becomes `<?php echo `) is longer than the file on disk, and PHP reads only as many bytes as the stream stat reports, so view scripts using short tags were truncated and failed with a parse error. The stat now reports the converted size.
- `Zend_View_Stream` declares the `$context` property that PHP assigns (dynamic property deprecation in PHP 8.2+) and implements `stream_set_option()` (PHP warned that it was not implemented on every `include`).

### Changed (public API)

- `Zend_View_Stream`: new public property `$context` and new public method `stream_set_option($option, $arg1, $arg2)`.
