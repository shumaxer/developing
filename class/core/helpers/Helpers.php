<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dante
 * Date: 05.12.12
 * Time: 14:32
 * To change this template use File | Settings | File Templates.
 */
class Helpers
{
  public  function hFormBegin($methot, $action, $name, $style)
  {
      echo '<form method="'.$methot.'" action="'.$action.'" name="'.$name.'" '.$style.' >';
  }

  public  function  hFormEbd()
  {
      echo '</form>';
  }

  public  function  hInput($type, $name, $id, $placeholder)
  {
      echo '<input type="'.$type.'" class="input-block-level" placeholder="'.$placeholder.'" name="'.$name.'" id="'.$id.'"/>';
  }
}
?>