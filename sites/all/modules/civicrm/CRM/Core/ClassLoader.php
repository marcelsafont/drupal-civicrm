<?php
/*
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC. All rights reserved.                        |
 |                                                                    |
 | This work is published under the GNU AGPLv3 license with some      |
 | permitted exceptions and without any warranty. For full license    |
 | and copyright information, see https://civicrm.org/licensing       |
 +--------------------------------------------------------------------+
 */

/**
 *
 *
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 */
class CRM_Core_ClassLoader {

  /**
   * We only need one instance of this object. So we use the singleton
   * pattern and cache the instance in this variable
   * @var object
   */
  private static $_singleton = NULL;

  /**
   * The classes in CiviTest have ucky, non-standard naming.
   *
   * @var array
   *   Array(string $className => string $filePath).
   */
  private $civiTestClasses;

  /**
   * @param bool $force
   *
   * @return object
   */
  public static function &singleton($force = FALSE) {
    if ($force || self::$_singleton === NULL) {
      self::$_singleton = new CRM_Core_ClassLoader();
    }
    return self::$_singleton;
  }

  /**
   * Has this been registered already.
   *
   * @var bool
   */
  protected $_registered;

  /**
   * Class constructor.
   */
  protected function __construct() {
    $this->_registered = FALSE;
    $this->civiTestClasses = [
      'CiviCaseTestCase',
      'CiviDBAssert',
      'CiviMailUtils',
      'CiviReportTestCase',
      'CiviSeleniumTestCase',
      'CiviTestSuite',
      'CiviUnitTestCase',
      'CiviEndToEndTestCase',
      'Contact',
      'ContributionPage',
      'Custom',
      'Event',
      'Membership',
      'Participant',
      'PaypalPro',
    ];
  }

  /**
   * Requires the autoload.php generated by composer
   *
   * @return void
   */
  protected function requireComposerAutoload() {
    // We are trying to locate 'vendor/autoload.php'. When installing CiviCRM
    // manually from the built tarball, that will be two directories up in the
    // civicrm-core directory. However, if civicrm-core was installed via
    // composer as a library, that'll be 5 directories up where composer was
    // run (ex. the Drupal root on a Drupal 8 site).
    $civicrm_base_path = dirname(dirname(__DIR__));
    $top_path = dirname(dirname(dirname(dirname(dirname(__DIR__)))));

    if (file_exists($civicrm_base_path . '/vendor/autoload.php')) {
      require_once $civicrm_base_path . '/vendor/autoload.php';
    }
    elseif (file_exists($top_path . '/vendor/autoload.php')) {
      require_once $top_path . '/vendor/autoload.php';
    }
  }

  /**
   * Registers this instance as an autoloader.
   *
   * @param bool $prepend
   *   Whether to prepend the autoloader or not.
   *
   * @api
   */
  public function register($prepend = FALSE) {
    if ($this->_registered) {
      return;
    }
    $civicrm_base_path = dirname(dirname(__DIR__));

    $this->requireComposerAutoload();

    // we do this to prevent a autoloader errors with joomla / 3rd party packages
    // use absolute path since we dont know the content of include_path as yet
    // CRM-11304
    // TODO Remove this autoloader. For civicrm-core and civicrm-packages, the composer autoloader works fine.
    // Extensions rely on include_path-based autoloading
    spl_autoload_register([$this, 'loadClass'], TRUE, $prepend);

    $this->_registered = TRUE;
    // The ClassLoader runs before the classes are available. Approximate Civi::paths()->get('[civicrm.packages]').
    if (isset($GLOBALS['civicrm_paths']['civicrm.packages']['path'])) {
      $packages_path = rtrim($GLOBALS['civicrm_paths']['civicrm.packages']['path'], DIRECTORY_SEPARATOR);
    }
    else {
      $packages_path = implode(DIRECTORY_SEPARATOR, [$civicrm_base_path, 'packages']);
    }
    $include_paths = [
      '.',
      $civicrm_base_path,
      $packages_path,
    ];
    $include_paths = implode(PATH_SEPARATOR, $include_paths);
    set_include_path($include_paths . PATH_SEPARATOR . get_include_path());
    // @todo Why do we need to load this again?
    $this->requireComposerAutoload();
  }

  /**
   * @param $class
   */
  public function loadClass($class) {
    if ($class === 'CiviCRM_API3_Exception' || $class === 'API_Exception') {
      //call internal error class api/Exception first
      // allow api/Exception class call external error class
      // CiviCRM_API3_Exception
      require_once 'api/Exception.php';
    }
    if (
      // Only load classes that clearly belong to CiviCRM.
      // Note: api/v3 does not use classes, but api_v3's test-suite does
      (0 === strncmp($class, 'CRM_', 4) || 0 === strncmp($class, 'CRMTraits', 9) || 0 === strncmp($class, 'api_v3_', 7) || 0 === strncmp($class, 'E2E_', 4)) &&
      // Do not load PHP 5.3 namespaced classes.
      // (in a future version, maybe)
      FALSE === strpos($class, '\\')
    ) {
      $file = strtr($class, '_', '/') . '.php';
      // There is some question about the best way to do this.
      // "require_once" is nice because it's simple and throws
      // intelligible errors.
      if (FALSE != stream_resolve_include_path($file)) {
        require_once $file;
      }
    }
    elseif (in_array($class, $this->civiTestClasses)) {
      $file = "tests/phpunit/CiviTest/{$class}.php";
      if (FALSE != stream_resolve_include_path($file)) {
        require_once $file;
      }
    }
  }

}
