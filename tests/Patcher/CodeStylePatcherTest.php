<?php
/**
 * Copyright MediaCT. All rights reserved.
 * https://www.mediact.nl
 */
namespace Mediact\CodingStandard\PhpStorm\Tests\Patcher;

use Mediact\CodingStandard\PhpStorm\EnvironmentInterface;
use Mediact\CodingStandard\PhpStorm\FilesystemInterface;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_TestCase;
use Mediact\CodingStandard\PhpStorm\Patcher\CodeStylePatcher;

/**
 * @coversDefaultClass \Mediact\CodingStandard\PhpStorm\Patcher\CodeStylePatcher
 */
class CodeStylePatcherTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::patch
     */
    public function testPatch()
    {
        $ideConfigFs = $this->createMock(FilesystemInterface::class);

        $defaultsFs = $this->createMock(FilesystemInterface::class);

        $environment = $this->createConfiguredMock(
            EnvironmentInterface::class,
            [
                'getIdeConfigFilesystem' => $ideConfigFs,
                'getDefaultsFilesystem' => $defaultsFs
            ]
        );

        (new CodeStylePatcher())->patch($environment);
    }
}
