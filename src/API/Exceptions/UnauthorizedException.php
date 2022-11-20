<?php

namespace API\Exceptions;

class UnauthorizedException extends ApiException {
  function getHttpStatusCode(): int {
    return 401;
  }
}
