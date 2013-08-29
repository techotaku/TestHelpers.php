# TestHelpers.php

[![Build Status](https://travis-ci.org/techotaku/TestHelpers.php.png?branch=master)](https://travis-ci.org/techotaku/TestHelpers.php)

## Overview
Some useful php test helper classes. Wrappers of [test_helpers](https://github.com/php-test-helpers/php-test-helpers).

## Highlights
#### 2013-08-29
The behavior of `ExitTestHelper::getFirstExitOutput()` has been changed. See [usage](#usage) for more information.

## Features

* ExitTestHelper: A wrapper of set_exit_overload() and unset_exit_overload(), with an output grabber.

## Usage

#### ExitTestHelper
Run [sample](https://github.com/techotaku/TestHelpers.php/blob/master/sample/ExitSampleTest.php):
```bash
techotaku@dev:~/TestHelpers.php$ php ./sample/ExitSampleTest.php
```
APIs:
* `ExitTestHelper::init()` Initialize the helper, register exit handler.
* `ExitTestHelper::clean()` Clean up. unregister exit handler.
* `ExitTestHelper::isThereExit()` Returns a value indicating whether there is any exit() was invoked.
* `ExitTestHelper::getFirstExitOutput()` Returns the output after first exit() was invoked. If no exit() was invoked, returns all contents in output buffer. This behavior could help you to **remove 'ugly' exit() invoking, from your product code**.

## Thanks
Thanks to [test_helpers](https://github.com/php-test-helpers/php-test-helpers), thanks to [its contributors](https://github.com/php-test-helpers/php-test-helpers/graphs/contributors).

## License
The MIT License (MIT)

Copyright (c) 2013 Ian Li

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.