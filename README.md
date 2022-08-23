# Smile Lab PHPStan Coding Standards

These coding standards are meant to be used on any community project made by Smile Lab.

First, you need to create a phpstan configuration file in your root project directory : 
```neon
# phpstan.neon.dist
parameters:
    level: 6
    checkMissingIterableValueType: false
    excludePaths:
        - 'vendor/*'
```

You can run the phpstan analysis with this command :
```bash
php ./vendor/bin/phpstan analyze [src folder]
```

Please note that the src folder is copied from `https://github.com/magento/magento2/tree/2.4.4/dev/tests/static/framework/Magento/PhpStan`. Only the namespace has been changed. We have copied these source files in order to avoid to depend on the Magento sources to run these checks.
