<?php

namespace Messinger\Folders;

use Users\User;
use Users\UserSettings;

class FolderActions {
  static public function getFoldersOfUser(User $user): array {
    $folders = [];
    // ...

    $policy = $user->settings->hasSetting(UserSettings::BIT_SORT_FOLDERS_BY_COUNT)
      ? SortPolicy::SORT_BY_UNREAD_COUNT
      : SortPolicy::SORT_BY_NAME;

    return SortImplementation::sortFolders($folders, $policy);
  }
}
