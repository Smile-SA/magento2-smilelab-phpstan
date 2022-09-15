# SmileLab PHPStan Extension

## Description

This extension is meant to be used on Magento projects and modules.

The src folder is copied from `https://github.com/magento/magento2/tree/2.4.5/dev/tests/static/framework/Magento/PhpStan`.

## Installation

To use this extension, require it in composer:

```
composer require --dev smile/magento2-smilelab-phpstan
```

## Configuration

Create a configuration file named `phpstan.neon.dist` at the root of your module.
For example:

```neon
parameters:
    level: 6
    checkMissingIterableValueType: false
    excludePaths:
        - 'vendor/*'
```

If you also install phpstan/extension-installer then you're all set!

Otherwise, add the following configuration to this file:

```neon
includes:
    - vendor/smile/magento2-smilelab-phpstan/extension.neon
```

## Usage

You can run the phpstan analysis with this command:

```bash
vendor/bin/phpstan analyse [src folder]
```
