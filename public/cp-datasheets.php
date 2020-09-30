<?php

$datasheets = json_decode(file_get_contents('./datasheets.json'), true);

foreach ($datasheets['rows'] as $row) {
    if (!empty($row[0])) {
        print_r($row[0] . "\r\n");
    }
}
