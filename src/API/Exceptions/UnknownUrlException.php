<?php

namespace API\Exceptions;

class UnknownUrlException extends ApiException {
  function getHttpStatusCode(): int {
    return 404;
  }

  function __construct(string $url) {
    parent::__construct("Url not found: $url");
  }
}
