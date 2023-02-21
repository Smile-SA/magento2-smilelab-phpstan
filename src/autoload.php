<?php

/**
 * Copied from magento.
 * @see https://github.com/magento/magento2/blob/2.4.5/dev/tests/static/framework/Magento/PhpStan/autoload.php
 * phpcs:disable
 */

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Code\Generator\Io;
use Magento\Framework\Filesystem\Driver\File;
use Magento\Framework\TestFramework\Unit\Autoloader\ExtensionAttributesGenerator;
use Magento\Framework\TestFramework\Unit\Autoloader\ExtensionAttributesInterfaceGenerator;
use Magento\Framework\TestFramework\Unit\Autoloader\FactoryGenerator;
use Magento\Framework\TestFramework\Unit\Autoloader\GeneratedClassesAutoloader;

require realpath(__DIR__ . '/../../../../') . '/vendor/squizlabs/php_codesniffer/autoload.php';

if (!defined('GENERATED_TEMP_DIR')) {
    define('GENERATED_TEMP_DIR', dirname(__DIR__) . '/tmp');
}

$generatorIo = new Io(
    new File(),
    GENERATED_TEMP_DIR . '/' . DirectoryList::getDefaultConfig()[DirectoryList::GENERATED_CODE][DirectoryList::PATH]
);
$generatedCodeAutoloader = new GeneratedClassesAutoloader(
    [
        new ExtensionAttributesGenerator(),
        new ExtensionAttributesInterfaceGenerator(),
        new FactoryGenerator(),
    ],
    $generatorIo
);
spl_autoload_register([$generatedCodeAutoloader, 'load']); // @phpstan-ignore-line
