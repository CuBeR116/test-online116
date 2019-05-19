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
  
  public function showHead()
  {
    foreach ($this->cssFiles as $css) {
      echo '<link rel="stylesheet" href="' . $css . '">';
    }
  }
  
  public function showFooter()
  {
    foreach ($this->jsFiles as $js) {
      echo '<script src="' . $js . '"></script>';
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
  
  public function getTest()
  {
    return json_decode(file_get_contents(__DIR__ . '/questions/file.txt'), true);
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
  
  public function prepareTitle() {
    $this->content = (preg_replace('|(<title>).+(</title>)|isU', "$1". $this->getTitle() ."$2", $this->content));
  }
  
  public function showContent() {
    $this->prepareTitle();
    echo $this->content;
  }
}

function debug($array)
{
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}