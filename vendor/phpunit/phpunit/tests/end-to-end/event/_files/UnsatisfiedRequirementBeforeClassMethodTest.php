<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TestFixture\Event;

use PHPUnit\Framework\Attributes\RequiresPhp;
use PHPUnit\Framework\TestCase;

final class UnsatisfiedRequirementBeforeClassMethodTest extends TestCase
{
    #[RequiresPhp('100')]
    public static function setUpBeforeClass(): void
    {
    }

    public function testOne(): void
    {
        $this->assertTrue(true);
    }
}