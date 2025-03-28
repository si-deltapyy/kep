--TEST--
phpunit --exclude-group one,two tests/FooTest.php
--FILE--
<?php declare(strict_types=1);
$_SERVER['argv'][] = '--do-not-cache-result';
$_SERVER['argv'][] = '--no-configuration';
$_SERVER['argv'][] = '--debug';
$_SERVER['argv'][] = '--exclude-group';
$_SERVER['argv'][] = 'one,two';
$_SERVER['argv'][] = __DIR__ . '/../../_files/groups/tests/FooTest.php';

require_once __DIR__ . '/../../../bootstrap.php';

(new PHPUnit\TextUI\Application)->run($_SERVER['argv']);
--EXPECTF--
PHPUnit Started (PHPUnit %s using %s)
Test Runner Configured
Test Suite Loaded (3 tests)
Event Facade Sealed
Test Runner Started
Test Suite Sorted
Test Suite Filtered (1 test)
Test Runner Execution Started (1 test)
Test Suite Started (PHPUnit\TestFixture\Groups\FooTest, 1 test)
Test Preparation Started (PHPUnit\TestFixture\Groups\FooTest::testThree)
Test Prepared (PHPUnit\TestFixture\Groups\FooTest::testThree)
Assertion Succeeded (Constraint: is true, Value: true)
Test Passed (PHPUnit\TestFixture\Groups\FooTest::testThree)
Test Finished (PHPUnit\TestFixture\Groups\FooTest::testThree)
Test Suite Finished (PHPUnit\TestFixture\Groups\FooTest, 1 test)
Test Runner Execution Finished
Test Runner Finished
PHPUnit Finished (Shell Exit Code: 0)
