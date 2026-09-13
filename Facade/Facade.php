<?php

require_once __DIR__ . "/WebExplorerHelperFacade.php";

$file = 'myFile.txt';

WebExplorerHelperFacade::generateReport('Chrome', 'html', $file);
