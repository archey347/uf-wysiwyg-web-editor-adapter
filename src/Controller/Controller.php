<?php

namespace UserFrosting\Sprinkle\WAdapter\Controller;

use UserFrosting\Sprinkle\Core\Controller\SimpleController;
use Slim\Http\Request;
use Slim\Http\Response;


class Controller extends SimpleController
{
  public function handlePage(Request $request, Response $response, $args) 
  {
    $dir = \UserFrosting\SPRINKLES_DIR . "/WAdapter";

    $request_dir = $request->getUri()->getPath();
    $filename = end(explode("/",explode("/", $request_dir)));
    $extension = end(explode(".", $filename));

    if ($extension == $filename) {
      $filename = "index.php";
      if (substr($request_dir, -1) != "/") {
        $request_dir .= "/";
      }
  
      $request_dir .= $filename; 
      $extension = end(explode(".", $filename));
    }

    $dir .= "/" . $request_dir;

    die($dir);

  }
}