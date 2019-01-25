<?php

namespace UserFrosting\Sprinkle\WAdapter\Controller;

use UserFrosting\Sprinkle\Core\Controller\SimpleController;
use UserFrosting\Support\Exception\NotFoundException;
use Slim\Http\Request;
use Slim\Http\Response;


class Controller extends SimpleController
{
  public function handlePage(Request $request, Response $response, $args) 
  {
    $dir = \UserFrosting\SPRINKLES_DIR . "/WAdapter";

    $request_dir =  urldecode($request->getUri()->getPath());
    $filename = array_values(array_slice(explode("/", $request_dir), -1))[0];

    $extension = array_values(array_slice(explode(".", $filename), -1))[0];

    if ($extension == $filename) {
      $filename = "index.html";
      if (substr($request_dir, -1) != "/") {
        $request_dir .= "/";
      }
  
      $request_dir .= $filename; 
      $extension = end(explode(".", $filename));
    }

    if($args['fromRoot']) {
      $dir .= "/templates/site/" . $request_dir;
  
    } else {
      $dir .= "/templates/" . $request_dir;
    }

    if(!file_exists($dir)) {
      throw new NotFoundException();
    }

    if($extension == "html") {
      return $this->ci->view->render($response, $request_dir);

    } else {
      
      
      $contentType = mime_content_type($dir);
      if($extension == "css") {
        $contentType = "text/css";
      }
      
      return $response->withHeader('Content-type', $contentType)
                      ->write(file_get_contents($dir));
    }

  }
}