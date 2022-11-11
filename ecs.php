<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->paths([__DIR__ . '/workbench', __DIR__ . '/app']);

    $ecsConfig->skip([
        __DIR__ . '/bootstrap/**.php',
        __DIR__ . '/public/**.php',
        __DIR__ . '/workbench/**/publisher/*.php',
        __DIR__ . '/resources/views/**/*.blade.php',
        __DIR__ . '/storage/**/*.php',
        __DIR__ . '/tests/**.php',
        __DIR__ . '/_ide_helper.php',
        __DIR__ . '/.phpstorm.meta.php',
        Symplify\CodingStandard\Fixer\Spacing\MethodChainingNewlineFixer::class,
    ]);

    $ecsConfig->ruleWithConfiguration(ArraySyntaxFixer::class, [
        'syntax' => 'short',
    ]);
    $ecsConfig->ruleWithConfiguration(PhpCsFixer\Fixer\Operator\ConcatSpaceFixer::class, [
        'spacing' => 'one',
    ]);
    $ecsConfig->ruleWithConfiguration(PhpCsFixer\Fixer\Import\OrderedImportsFixer::class, [
        'sortAlgorithm' => 'alpha',
    ]);
    $ecsConfig->rules([
        PhpCsFixer\Fixer\CastNotation\LowercaseCastFixer::class,
        PhpCsFixer\Fixer\Casing\LowercaseKeywordsFixer::class,
        PhpCsFixer\Fixer\Casing\MagicConstantCasingFixer::class,
        PhpCsFixer\Fixer\FunctionNotation\MethodArgumentSpaceFixer::class,
        PhpCsFixer\Fixer\Basic\EncodingFixer::class,
        PhpCsFixer\Fixer\PhpTag\FullOpeningTagFixer::class,
        PhpCsFixer\Fixer\FunctionNotation\FunctionDeclarationFixer::class,
        PhpCsFixer\Fixer\FunctionNotation\FunctionTypehintSpaceFixer::class,
        PhpCsFixer\Fixer\StringNotation\HeredocToNowdocFixer::class,
        PhpCsFixer\Fixer\ControlStructure\IncludeFixer::class,
        PhpCsFixer\Fixer\ClassNotation\ClassDefinitionFixer::class,
        PhpCsFixer\Fixer\Basic\BracesFixer::class,
        PhpCsFixer\Fixer\NamespaceNotation\BlankLineAfterNamespaceFixer::class,
        PhpCsFixer\Fixer\PhpTag\BlankLineAfterOpeningTagFixer::class,
        PhpCsFixer\Fixer\LanguageConstruct\DeclareEqualNormalizeFixer::class,
        PhpCsFixer\Fixer\Casing\NativeFunctionCasingFixer::class,
        PhpCsFixer\Fixer\ClassNotation\NoBlankLinesAfterClassOpeningFixer::class,
        PhpCsFixer\Fixer\Phpdoc\NoBlankLinesAfterPhpdocFixer::class,
        PhpCsFixer\Fixer\PhpTag\NoClosingTagFixer::class,
        PhpCsFixer\Fixer\Phpdoc\NoEmptyPhpdocFixer::class,
        PhpCsFixer\Fixer\Semicolon\NoEmptyStatementFixer::class,
        PhpCsFixer\Fixer\Import\NoLeadingImportSlashFixer::class,
        PhpCsFixer\Fixer\NamespaceNotation\NoLeadingNamespaceWhitespaceFixer::class,
        PhpCsFixer\Fixer\ArrayNotation\NoMultilineWhitespaceAroundDoubleArrowFixer::class,
        PhpCsFixer\Fixer\CastNotation\NoShortBoolCastFixer::class,
        PhpCsFixer\Fixer\Semicolon\NoSinglelineWhitespaceBeforeSemicolonsFixer::class,
        PhpCsFixer\Fixer\FunctionNotation\NoSpacesAfterFunctionNameFixer::class,
        PhpCsFixer\Fixer\Whitespace\NoSpacesInsideParenthesisFixer::class,
        PhpCsFixer\Fixer\Whitespace\IndentationTypeFixer::class,
        PhpCsFixer\Fixer\ControlStructure\NoTrailingCommaInListCallFixer::class,
        PhpCsFixer\Fixer\ArrayNotation\NoTrailingCommaInSinglelineArrayFixer::class,
        PhpCsFixer\Fixer\Whitespace\NoTrailingWhitespaceFixer::class,
        PhpCsFixer\Fixer\Comment\NoTrailingWhitespaceInCommentFixer::class,
        PhpCsFixer\Fixer\ControlStructure\NoUnneededControlParenthesesFixer::class,
        PhpCsFixer\Fixer\Import\NoUnusedImportsFixer::class,
        PhpCsFixer\Fixer\ReturnNotation\NoUselessReturnFixer::class,
        PhpCsFixer\Fixer\ArrayNotation\NoWhitespaceBeforeCommaInArrayFixer::class,
        PhpCsFixer\Fixer\Whitespace\NoWhitespaceInBlankLineFixer::class,
        PhpCsFixer\Fixer\ArrayNotation\NormalizeIndexBraceFixer::class,
        PhpCsFixer\Fixer\Operator\ObjectOperatorWithoutWhitespaceFixer::class,
        PhpCsFixer\Fixer\Phpdoc\PhpdocIndentFixer::class,
        PhpCsFixer\Fixer\Phpdoc\PhpdocNoAccessFixer::class,
        PhpCsFixer\Fixer\Phpdoc\PhpdocNoPackageFixer::class,
        PhpCsFixer\Fixer\Phpdoc\PhpdocNoUselessInheritdocFixer::class,
        PhpCsFixer\Fixer\Phpdoc\PhpdocScalarFixer::class,
        PhpCsFixer\Fixer\Phpdoc\PhpdocSingleLineVarSpacingFixer::class,
        PhpCsFixer\Fixer\Phpdoc\PhpdocSummaryFixer::class,
        PhpCsFixer\Fixer\Phpdoc\PhpdocToCommentFixer::class,
        PhpCsFixer\Fixer\Phpdoc\PhpdocTrimFixer::class,
        PhpCsFixer\Fixer\Phpdoc\PhpdocSeparationFixer::class,
        PhpCsFixer\Fixer\Phpdoc\PhpdocTypesFixer::class,
        PhpCsFixer\Fixer\Phpdoc\PhpdocVarWithoutNameFixer::class,
        PhpCsFixer\Fixer\Operator\BinaryOperatorSpacesFixer::class,
        PhpCsFixer\Fixer\Whitespace\CompactNullableTypehintFixer::class,
        PhpCsFixer\Fixer\Operator\TernaryToNullCoalescingFixer::class,
        Symplify\CodingStandard\Fixer\Strict\BlankLineAfterStrictTypesFixer::class,
        PhpCsFixer\Fixer\FunctionNotation\ReturnTypeDeclarationFixer::class,
    ]);

    $ecsConfig->ruleWithConfiguration(PhpCsFixer\Fixer\ListNotation\ListSyntaxFixer::class, [
        'syntax' => 'short',
    ]);
    $ecsConfig->ruleWithConfiguration(PhpCsFixer\Fixer\ClassNotation\VisibilityRequiredFixer::class, [
        'elements' => 'const',
        'property',
        'method',
    ]);

    $ecsConfig->sets([
        SetList::SPACES,
        SetList::ARRAY,
        SetList::DOCBLOCK,
        SetList::PSR_12,
        SetList::CLEAN_CODE,
        SetList::SYMPLIFY,
        SetList::NAMESPACES,
    ]);
};
