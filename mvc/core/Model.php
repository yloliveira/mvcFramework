<?php
abstract class Model{
  protected $db;    
  
  public function __construct(){    
    global $db;
    $db = Connection::getInstance();    
  }    
}