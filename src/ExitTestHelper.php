<?php
/**
 * PHP Test Helpers
 * 
 * @author     Ian Li <i@techotaku.net>
 * @copyright  Ian Li <i@techotaku.net>, All rights reserved.
 * @license    MIT License
 */

  /**
   * PHP exit() test helper static class
   */
  class ExitTestHelper {
    private static $have_exit;
    private static $first_exit_output;

    /**
     * Initialize.
     * Register exit handler.
     */
    public static function init() {
      self::$have_exit = FALSE;
      self::$first_exit_output = NULL;
      set_exit_overload('ExitTestHelper::exitHandler');
      ob_start();
    }

    /**
     * Clean up.
     * Unregister exit handler.
     */
    public static function clean() {
      ob_end_clean();
      unset_exit_overload();
      self::$have_exit = FALSE;
      self::$first_exit_output = NULL;
    }

    /**
     * Returns a value indicating whether there is any exit() was invoked.
     *
     * @return boolean
     */
    public static function isThereExit() {
      return self::$have_exit;
    }

    /**
     * Returns the output after first exit() was invoked.
     *
     * @return string
     */
    public static function getFirstExitOutput() {
      return self::$first_exit_output;
    }

    /**
     * Php exit() handler.
     * Make it private, to prevent invoking outside.
     *
     * @param string $param (Optional) Exit message.
     */
    private static function exitHandler($param = NULL) {  
      if (!(self::$have_exit)) {
        self::$have_exit = TRUE;
        echo $param ?: '';
        self::$first_exit_output = ob_get_contents();
        if (self::$first_exit_output === FALSE) {
          self::$first_exit_output = '';
        }
      }
      return FALSE;
    }

  }
?>