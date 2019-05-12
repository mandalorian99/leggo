<?php
namespace Faker\Provider;

class Book extends \Faker\Provider\Base
{
  public function title($nbWords = 5)
  {
  	die("tiele accessed successfully....");
  }

  public function ISBN()
  {
    return $this->generator->ean13();
  }
}

?>