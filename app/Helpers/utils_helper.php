<?php

/**
 * Undocumented function
 *
 * @param array $data
 * @return string
 */
function response(array $data): void {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Content-Type: application/json');

    echo json_encode($data);
}	