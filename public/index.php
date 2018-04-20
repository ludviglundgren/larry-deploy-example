<?php

$branch = getenv('GIT_BRANCH');
$srvname = getenv('SERVER_NICKNAME');

echo $srvname;
echo $branch;

echo "Hello from {$branch} branch on {$_SERVER['HTTP_HOST']}";
