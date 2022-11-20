<?php

namespace DB;

class DbConnection {
  static function getFromPool(): self {
    return new self;
  }

  public function insertInto(string $table, array $assoc) {
    // ...
  }

  public function deleteFrom(string $table, int $primary_id) {
    // ...
  }

  public function selectColumn(string $table, string $column, string $where): array {
    // ...
    return [];
  }
}
