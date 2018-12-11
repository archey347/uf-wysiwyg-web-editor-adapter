<?php

$app->get("/site/{params:.*}", "UserFrosting\Sprinkle\WAdapter\Controller\Controller:handlePage");