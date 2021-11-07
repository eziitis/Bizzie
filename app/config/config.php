<?php

  //Database parameters
  define('DB_HOST','localhost');
  define('DB_USER','root');
  define('DB_PASS','');
  define('DB_NAME','maindb');

  //dirname() removes last portion before / for path
  define('APPROOT', dirname(dirname(__FILE__)));

  //URLROOT (works for dynamic links)
  define ('URLROOT','localhost/bizzie');

  //Sitename
  define('SITENAME', 'bizzie');