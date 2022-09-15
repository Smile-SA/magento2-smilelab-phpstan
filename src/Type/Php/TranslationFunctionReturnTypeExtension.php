<?php

declare(strict_types=1);

namespace Smile\PhpStan\Type\Php;

use Magento\Framework\Phrase;
use PhpParser\Node\Expr\FuncCall;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\FunctionReflection;
use PHPStan\Type\DynamicFunctionReturnTypeExtension;
use PHPStan\Type\ObjectType;
use PHPStan\Type\StringType;
use PHPStan\Type\Type;
use PHPStan\Type\UnionType;

/**
 * This extension is specific to this repository, it is not defined in Magento.
 * It is a workaround for the following bug: See https://github.com/magento/magento2/issues/36063.
 *
 * For example:
 *
 * ```php
 * $this->messageManager->addErrorMessage(__('foobar'));
 * ```
 *
 * With this extension: no error.
 * Without this extension: Parameter #1 $message of method Magento\Framework\Message\ManagerInterface::addErrorMessage()
 * expects string, Magento\Framework\Phrase given.
 *
 * Warning: it will also hide real errors, like passing a Phrase object to a function that ONLY accepts string values.
 */
class TranslationFunctionReturnTypeExtension implements DynamicFunctionReturnTypeExtension
{
    /**
     * @inheritdoc
     */
    public function isFunctionSupported(FunctionReflection $functionReflection): bool
    {
        return $functionReflection->getName() === '__';
    }

    /**
     * @inheritdoc
     */
    public function getTypeFromFunctionCall(
        FunctionReflection $functionReflection,
        FuncCall $functionCall,
        Scope $scope
    ): ?Type {
        return new UnionType([new StringType(), new ObjectType(Phrase::class)]);
    }
}
