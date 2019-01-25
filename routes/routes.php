<?php

$app->redirect("/site", "site/index.html", 301);
$app->redirect("/", "site/index.html", 301);
$app->redirect("/about", "site/index.html", 301);
$app->redirect("/legal", "site/index.html", 301);
$app->redirect("/privacy", "site/index.html", 301);

foreach(["/sitemap.xml", "/robots.txt"] as $url) {
    $app->get($url, function ($request, $response, $args) {
        $args['fromRoot'] = true;
        return UserFrosting\Sprinkle\WAdapter\Controller\Controller::handlePage($request, $response, $args);
    });
}

$app->get("/site/{params:.*}", "UserFrosting\Sprinkle\WAdapter\Controller\Controller:handlePage");