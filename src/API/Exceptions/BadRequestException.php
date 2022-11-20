<?php

namespace API\Exceptions;

class BadRequestException extends ApiException {
  function getHttpStatusCode(): int {
    return 400;
  }

  function __construct(string $url) {
    parent::__construct($url);
  }
}
