<?php

namespace Messinger\Folders;

class SortImplementation {
  static function sortFolders(array $folders, int $policy): array {
    switch ($policy) {
      case SortPolicy::SORT_BY_NAME:
        // ...
        break;
      case SortPolicy::SORT_BY_UNREAD_COUNT:
        // ....
        break;
    }
    return $folders;
  }
}
