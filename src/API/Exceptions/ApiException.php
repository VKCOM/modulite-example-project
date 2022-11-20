<?php

namespace API\Exceptions;

abstract class ApiException extends \Exception {
  abstract function getHttpStatusCode(): int;
}
