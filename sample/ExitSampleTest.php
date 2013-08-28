<?php
/**
 * PHP Test Helpers
 * Sample tests for Exit Test Helper
 * 
 * @author     Ian Li <i@techotaku.net>
 * @copyright  Ian Li <i@techotaku.net>, All rights reserved.
 * @license    MIT License
 */

  require __DIR__ . '/../src/ExitTestHelper.php';

  $ret = 0;

  function isTrue($condition) {
    global $ret;
    if ($condition === TRUE) {
      echo "-Success\n";
    } else {
      echo "+Failure\n";
      $ret += 1; 
    }
  }

  // testAcceptance
  ExitTestHelper::init();
  exit('exit message');
  $output = ExitTestHelper::getFirstExitOutput();
  ExitTestHelper::clean();
  isTrue('exit message' == $output);

  // testAcceptanceIsTrue
  ExitTestHelper::init();
  exit('exit message');
  $output = ExitTestHelper::isThereExit();
  ExitTestHelper::clean();
  isTrue($output);

  // testAcceptanceIsFalse
  ExitTestHelper::init();
  $var = 'normal action';
  $output = ExitTestHelper::isThereExit();
  ExitTestHelper::clean();
  isTrue(!$output);

  // testGetMessageWhenNoExit
  ExitTestHelper::init();
  $var = 'normal action';
  $output = ExitTestHelper::getFirstExitOutput();
  ExitTestHelper::clean();
  isTrue('' == $output);

  // testExitAfterPrint
  ExitTestHelper::init();
  print('normal message.');
  exit('exit message');
  $output = ExitTestHelper::getFirstExitOutput();
  ExitTestHelper::clean();
  isTrue('normal message.exit message' == $output);

  // testMultipleExit
  ExitTestHelper::init();
  exit('exit message 1');
  exit('second exit');
  exit('another exit');
  $output = ExitTestHelper::getFirstExitOutput();
  ExitTestHelper::clean();
  isTrue('exit message 1' == $output);

  exit($ret);
?>
