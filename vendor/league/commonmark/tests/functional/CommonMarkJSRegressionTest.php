<?php

declare(strict_types=1);

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Original code based on the CommonMark JS reference parser (https://bitly.com/commonmark-js)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Tests\Functional;

use League\CommonMark\Util\SpecReader;

/**
 * Tests the parser against the CommonMark spec
 */
final class CommonMarkJSRegressionTest extends AbstractSpecTestCase
{
    public static function dataProvider(): \Generator
    {
        yield from SpecReader::readFile(__DIR__ . '/../../vendor/commonmark/commonmark.js/test/regression.txt');
    }
}
