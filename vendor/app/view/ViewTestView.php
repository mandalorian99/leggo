<?php 
/**
 * Class : ViewTest.view.php
 * render data with template and output html content
 */

class ViewTestView extends View{
 private $template_name = 'viewTest.blade.php' ;

 public function output(){
 	echo 'child evoked..' ;
 }

}
?>