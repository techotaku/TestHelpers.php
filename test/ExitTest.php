<?php
/**
 * PHP Test Helpers
 * Unit tests for Exit Test Helper
 * 
 * @author     Ian Li <i@techotaku.net>
 * @copyright  Ian Li <i@techotaku.net>, All rights reserved.
 * @license    MIT License
 */

  require __DIR__ . '/../src/ExitTestHelper.php';

  class ExitTest extends PHPUnit_Framework_TestCase {

    public function testAcceptance() {
      ExitTestHelper::init();
      exit('exit message');
      $this->assertEquals('exit message', ExitTestHelper::getFirstExitOutput(), 'Output verification fail!');
      ExitTestHelper::clean();
    }

    public function testAcceptanceIsTrue() {
      ExitTestHelper::init();
      exit('exit message');
      $this->assertTrue(ExitTestHelper::isThereExit(), 'There should be an exit() was invoked.');
      ExitTestHelper::clean();
    }

    public function testAcceptanceIsFalse() {
      ExitTestHelper::init();
      $var = 'normal action';
      $this->assertFalse(ExitTestHelper::isThereExit(), "There shouldn't be any exit() was invoked.");
      ExitTestHelper::clean();
    }

    public function testGetMessageWhenNoExit() {
      ExitTestHelper::init();
      $var = 'normal action';
      $this->assertEquals('', ExitTestHelper::getFirstExitOutput(), 'Output verification fail! Output should be empty.');
      ExitTestHelper::clean();
    }

    public function testExitAfterPrint() {
      ExitTestHelper::init();
      print('normal message.');
      exit('exit message');
      $this->assertEquals('normal message.exit message', ExitTestHelper::getFirstExitOutput(), 'Output verification fail!');
      ExitTestHelper::clean();
    }

    public function testMultipleExit() {
      ExitTestHelper::init();
      exit('exit message 1');
      exit('second exit');
      exit('another exit');
      $this->assertEquals('exit message 1', ExitTestHelper::getFirstExitOutput(), 'Output verification fail!');
      ExitTestHelper::clean();
    }

  }
?>
