<?php declare(strict_types=1);
/**
 * This file is part of the php-lisp/php-lisp.
 *
 * @Link     https://github.com/php-lisp/php-lisp
 * @Document https://github.com/php-lisp/php-lisp/blob/master/README.md
 * @Contact  itwujunze@gmail.com
 * @License  https://github.com/php-lisp/php-lisp/blob/master/LICENSE
 *
 * (c) Panda <itwujunze@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace PhpLisp\Psp\Runtime\PspList;

use PhpLisp\Psp\Runtime\BuiltinFunction;

final class UnsetAt extends BuiltinFunction
{
    public function execute(array $arguments)
    {
        list($list, $key) = $arguments;
        if (isset($list[$key])) {
            $value = $list[$key];
            unset($list[$key]);

            return $value;
        }
        $key = var_export($key, true);
        throw new \OutOfRangeException("no index $key of the list");
    }
}
