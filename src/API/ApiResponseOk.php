<?php

namespace API;

class ApiResponseOk {
  public string $json;

  /** @param mixed $any */
  function __construct($any = null) {
    if ($any === null) {
      $this->json = '{"ok":1}';
    } else if (is_string($any)) {
      $this->json = $any;
    } else {
      $this->json = (string)json_encode($any);
    }
  }
}
