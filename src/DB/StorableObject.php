<?php

namespace DB;

interface StorableObject {
  /** @return mixed[] */
  function toArray(): array;
}
