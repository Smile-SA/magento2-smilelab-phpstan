# SmileLab PHPStan Extension

## Description

This extension is meant to be used on Magento projects and modules.

The src folder is copied from `https://github.com/magento/magento2/tree/2.4.5/dev/tests/static/framework/Magento/PhpStan`.

## Installation

To use this extension, require it in composer:

```shell
composer require --dev smile/magento2-smilelab-phpstan
```

## Configuration

Create a configuration file named `phpstan.neon.dist` at the root of your project.

Example for a Magento project:

```neon
parameters:
    level: 6
    checkMissingIterableValueType: false
    paths:
        - app/code

```

Exemple for a community module:

```neon
parameters:
    level: 6
    checkMissingIterableValueType: false
    phpVersion: {{min_php_version}}
    excludePaths:
        - 'vendor/*'
```

Where `{{min_php_version}}` is the minimum compatible version of PHP required by your module. For example, if the min version is PHP 7.4:

```neon
phpVersion: 70400
```

If you also install phpstan/extension-installer then you're all set!

Otherwise, add the following configuration to this file:

```neon
includes:
    - vendor/smile/magento2-smilelab-phpstan/extension.neon
```

## Usage

You can run the phpstan analysis with this command:

```shell
vendor/bin/phpstan analyse [src folder]
```
