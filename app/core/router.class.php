<?php
/* ------------------------------------------------------------- */
/* URL Router class */
/* ------------------------------------------------------------- */

class Router {
  static protected $instance;
  static protected $siteRoot;
  static protected $request_path;
  static protected $controller;
  static protected $action;
  static protected $params;
  static protected $rules;

  public static function getInstance() {
    if (isset(self::$instance) and (self::$instance instanceof self)) {
      return self::$instance;
    } else {
      self::$instance = new self();
      return self::$instance;
    }
  }

  private static function arrayClean(&$array) {
    $out = array();
    foreach($array as $key => $value) {
      if (strlen($value) != 0) $out[$key] = $value;
    }

    $array = $out;
  }

  private static function ruleMatch($rule, $data) {
    $ruleItems = explode('/',$rule); self::arrayClean($ruleItems);
    $dataItems = explode('/',$data); self::arrayClean($dataItems);


    if (count($ruleItems) == count($dataItems)) {

      $result = array();

      foreach($ruleItems as $ruleKey => $ruleValue) {
        if (preg_match('/^:[\w]{1,}$/',$ruleValue)) {
          $ruleValue = substr($ruleValue,1);
          $result[$ruleValue] = $dataItems[$ruleKey];
        }
        else {
          if (strcmp($ruleValue,$dataItems[$ruleKey]) != 0) {
            return false;
          }
        }
      }

      if (count($result) > 0) return $result;
	  else return array('dummy'=>'');
      unset($result);
    }
    return false;
  }

  private static function defaultRoutes($url) {
    // process default routes
    $items = explode('/',$url);

    // remove empty blocks
    foreach($items as $key => $value) {
      if (strlen($value) == 0) unset($items[$key]);
    }

    // extract data
    if (count($items)) {
      self::$controller = array_shift($items);
      self::$action = array_shift($items);
      self::$params = $items;
    }
  }

  protected function __construct() {
    self::$rules = array();
  }

  public static function init($baseDir) {
   self::$siteRoot = $baseDir;

    @list($url, $qs) = explode('?', $_SERVER['REQUEST_URI']);
    self::$request_path = $url = str_ireplace($baseDir, '', $url);

   $isCustom = false;

    if (count(self::$rules)) {
      foreach(self::$rules as $ruleKey => $ruleData) {
        $params = self::ruleMatch($ruleKey,$url);
        if ($params !== false) {
          self::$controller = $ruleData['controller'];
          self::$action = $ruleData['action'];
          self::$params = $params;
          self::$params = self::explicitParams($ruleData);
          $isCustom = true;
          break;
        }
      }
    }

	

    if (!$isCustom) self::defaultRoutes($url);

    if (!strlen(self::$controller)) self::$controller = 'index';
    if (!strlen(self::$action)) self::$action = 'index';
  }

  public static function addRule($rule, $target) {
    self::$rules[$rule] = $target;
  }

  public static function getController() { return str_replace('-', '_', self::$controller); }
  public static function getControllerSeo() { return self::$controller; }
  public static function getSiteRoot() { return self::$siteRoot; }
  public static function getAction() { return str_replace('-', '_', self::$action); }
  public static function getActionSeo() { return self::$action; }
  public static function getParams() { return self::$params; }
  public static function getParam($id) { return self::$params[$id]; }
  public static function getPath() { return self::$request_path; }
  public static function debug() {print_r(self::$rules);}

  public static function explicitParams($extParams) {
	unset($extParams['controller']);
	unset($extParams['action']);

	return array_merge(self::$params, $extParams);
  }

}