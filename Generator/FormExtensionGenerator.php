<?php


namespace Plugin\EccubeMakerBundle\Generator;


use Symfony\Bundle\MakerBundle\Generator;
use Symfony\Bundle\MakerBundle\Util\ClassNameDetails;

final class FormExtensionGenerator
{
    /**
     * @var Generator
     */
    private $generator;

    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
    }

    public function generateFormExtension(ClassNameDetails $classNameDetails, \ReflectionClass $reflectionClass): string
    {
        $formExtensionPath = $this->generator->generateClass(
            $classNameDetails->getFullName(),
            __DIR__.'/../Resource/skeleton/form/Extension.tpl.php',
            [
                "extended_full_class_name" => $reflectionClass->getNamespaceName().'\\'.$reflectionClass->getShortName(),
                "extended_class_name" => $reflectionClass->getShortName()
            ]
        );

        return $formExtensionPath;
    }

}