<?php
class Helper{

  public static function alert($msg){
    echo "<script>";
    echo "alert('$msg')";
    echo "</script>";
  }
}
