--TEST--
https://github.com/sebastianbergmann/phpunit/issues/4929
--FILE--
<?php declare(strict_types=1);
class Foo
{
}

class Bar
{
    public function method(Foo $foo = new Foo(1, 2, 3))
    {
    }
}

require_once __DIR__ . '/../../../bootstrap.php';

$class = new ReflectionClass(Bar::class);

$mockMethod = \PHPUnit\Framework\MockObject\Generator\MockMethod::fromReflection(
    $class->getMethod('method'),
    false,
    false
);

$code = $mockMethod->generateCode();

print $code;
--EXPECT--

public function method(Foo $foo = new \Foo(1, 2, 3))
    {
        $__phpunit_definedVariables        = get_defined_vars();
        $__phpunit_namedVariadicParameters = [];

        foreach ($__phpunit_definedVariables as $__phpunit_definedVariableName => $__phpunit_definedVariableValue) {
            if ((new ReflectionParameter([__CLASS__, __FUNCTION__], $__phpunit_definedVariableName))->isVariadic()) {
                foreach ($__phpunit_definedVariableValue as $__phpunit_key => $__phpunit_namedValue) {
                    if (is_string($__phpunit_key)) {
                        $__phpunit_namedVariadicParameters[$__phpunit_key] = $__phpunit_namedValue;
                    }
                }
            }
        }

        $__phpunit_arguments = [$foo];
        $__phpunit_count     = func_num_args();

        if (1 !== null && $__phpunit_count > 1) {
            $__phpunit_arguments_tmp = func_get_args();

            for ($__phpunit_i = 1; $__phpunit_i < $__phpunit_count; $__phpunit_i++) {
                $__phpunit_arguments[] = $__phpunit_arguments_tmp[$__phpunit_i];
            }
        }

        $__phpunit_arguments = array_merge($__phpunit_arguments, $__phpunit_namedVariadicParameters);

        $__phpunit_result = $this->__phpunit_getInvocationHandler()->invoke(
            new \PHPUnit\Framework\MockObject\Invocation(
                'Bar', 'method', $__phpunit_arguments, '', $this, false
            )
        );

        return $__phpunit_result;
    }
