<?php

require __DIR__ . '/vendor/autoload.php';

$config = require 'app/config.php';

date_default_timezone_set('PRC');
set_time_limit(0);
$series = new \App\Series($seriesUrl);

$seriesUrl = 'https://laracasts.com/series/vim-mastery';

$series->run($seriesUrl);