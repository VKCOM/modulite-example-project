<?php

global $InputQ;

function router() {
  global $InputQ;

  $InputQ = (string)$_GET['q'];
  $input_json = json_decode($_GET['args'], true);
  $args = is_array($input_json) ? (array)$input_json : [];

  try {
    $json = \API\ApiRouter::parseAndRouteApiQuery($InputQ, $args);
    echo $json;
  } catch (\API\Exceptions\ApiException $ex) {
    $status_code = $ex->getHttpStatusCode();
    $status_string = stringifyHttpCode($ex->getHttpStatusCode());
    header($_SERVER["SERVER_PROTOCOL"] . ' ' . $status_string, true, $status_code);
  }
}

function stringifyHttpCode(int $status_code): string {
  static $map = [
    200 => "200 OK",
    400 => "400 Bad Request",
    404 => "404 Not found",
    401 => "401 Unauthorized",
    // ...
  ];
  return $map[$status_code] ?? '503 Service Unavailable';
}
