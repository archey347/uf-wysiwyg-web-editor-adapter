<?php

$app->redirect("/site", "site/index.html", 301);
$app->redirect("/", "site/index.html", 301);
$app->redirect("/about", "site/index.html", 301);
$app->redirect("/legal", "site/index.html", 301);
$app->redirect("/privacy", "site/index.html", 301);

$app->get("/site/{params:.*}", "UserFrosting\Sprinkle\WAdapter\Controller\Controller:handlePage");