<?php

session_start();

require_once __DIR__."/../vendor/autoload.php";

require_once __DIR__."/../Route/Api.php";

require_once __DIR__."/../Route/Web.php";

Flight::start();