<?php
/**
 * Created by PhpStorm.
 * User: CuBeR116
 * Date: 02.05.2019
 * Time: 16:36
 * Mail: cuber116@gmail.com
 */

class APPLICATION
{
  public $cssFiles;
  public $title = 'no-title';
  public $arTest;
  public $jsFiles;
  public $content;
  
  public function file_include($file)
  {
    if (require_once($_SERVER['DOCUMENT_ROOT'] . '/template' . $file))
      return true;
    else
      return false;
  }
  
  public function include_css($file)
  {
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)) {
      $this->cssFiles[$file] = $file;
      return true;
    } else {
      return false;
    }
  }
  
  public function include_js($file)
  {
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)) {
      $this->jsFiles[$file] = $file;
      return true;
    } else {
      return false;
    }
  }
  
  public function echoIncludedCSS()
  {
    foreach ($this->cssFiles as $css) {
      echo '<link rel="stylesheet" href="' . $css . '">';
    }
  }
  
  public function echoIncludedJS()
  {
    if (is_array($this->jsFiles)) {
      foreach ($this->jsFiles as $js) {
        echo '<script src="' . $js . '"></script>';
      }
    }
  }
  
  public function getTitle()
  {
    return $this->title;
  }
  
  public function setTitle($strTitle)
  {
    $this->title = $strTitle;
  }
  
  public function getTestsList() {
    $arFiles = [];
    foreach (glob($_SERVER['DOCUMENT_ROOT'] . "/cub-admin/questions/*.txt") as $file) {
      $testContent = json_decode(file_get_contents($file), true);
      $fileInfo = pathinfo($file);
      $arFiles[] = [
        'path' => $file,
        'content' => $testContent,
        'testName' => $testContent['name'],
        'testFileName' => $fileInfo['filename'],
      ];
    }
    
    return $arFiles;
  }
  
  public function checkTestExist($name) {
    if(file_exists(__DIR__ . '/questions/' . $name . '.txt')) {
      return true;
    }
    else {
      return false;
    }
  }
  
  public function getTest($name)
  {
    if(file_exists(__DIR__ . '/questions/' . $name . '.txt')) {
      return json_decode(file_get_contents(__DIR__ . '/questions/' . $name . '.txt'), true);
    }
    else {
      return false;
    }
  }
  
  function getTypeAnswer($haystackAr)
  {
    $request = 'true';
    $count = 0;
    
    foreach ($haystackAr as $haystack) {
      if ($haystack['right'] == $request)
        $count++;
    }
    
    if ($count > 1)
      return true;
    
    else
      return false;
    
  }
  
  public function getCountAnswer($haystackAr)
  {
    $count = 0;
    $request = 'true';
    
    if (is_array($haystackAr)) {
      
      foreach ($haystackAr as $haystack) {
        if ($haystack['right'] == $request)
          $count++;
      }
      
    }
    
    return $count;
  }
  
  public function prepareTitle()
  {
    $this->content = (preg_replace('|(<title>).+(</title>)|isU', "$1" . $this->getTitle() . "$2", $this->content));
  }
  
  public function showContent()
  {
    $this->prepareTitle();
    echo $this->content;
  }
  
  public function getMenu($name)
  {
    require $_SERVER['DOCUMENT_ROOT'] . '/.' . $name . '.menu.php';
    return $menu;
  }
  
  public function includeAdminTemplate($file)
  {
    if (require ($_SERVER['DOCUMENT_ROOT'] . '/cub-admin/template' . $file))
      return true;
    else
      return false;
  }
}

function debug($array)
{
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}