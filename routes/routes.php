<?php

$app->redirect("/site", "site/index.html", 301);
$app->get("/site/{params:.*}", "UserFrosting\Sprinkle\WAdapter\Controller\Controller:handlePage");