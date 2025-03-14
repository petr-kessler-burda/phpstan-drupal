<?php

declare(strict_types=1);

namespace mglaman\PHPStanDrupal\Tests\Type;

use mglaman\PHPStanDrupal\Tests\AdditionalConfigFilesTrait;
use PHPStan\Testing\TypeInferenceTestCase;

final class DrupalContainerDynamicReturnTypeTest extends TypeInferenceTestCase
{
    use AdditionalConfigFilesTrait;

    public function dataFileAsserts(): iterable
    {
        yield from $this->gatherAssertTypes(__DIR__ . '/data/container.php');
        yield from $this->gatherAssertTypes(__DIR__ . '/data/drupal-service-static.php');
        yield from $this->gatherAssertTypes(__DIR__ . '/data/drupal-class-resolver.php');
    }

    /**
     * @dataProvider dataFileAsserts
     * @param string $assertType
     * @param string $file
     * @param mixed ...$args
     */
    public function testFileAsserts(
        string $assertType,
        string $file,
        ...$args
    ): void
    {
        $this->assertFileAsserts($assertType, $file, ...$args);
    }
}
