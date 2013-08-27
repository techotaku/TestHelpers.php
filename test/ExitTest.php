<?php
require __DIR__ . '/../src/ExitTestHelper.php';

class ExitTest extends PHPUnit_Framework_TestCase {

  public function testAcceptance() {
    ExitTestHelper::init();
    exit('exit message');
    $this->assertEquals('exit message', ExitTestHelper::getFirstExitOutput(), 'Output verification fail!');
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
