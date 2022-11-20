<?php

namespace Users;

class UserSettings {
  const BIT_PRIVATE_PROFILE       = 1;
  const BIT_SORT_FOLDERS_BY_COUNT = 2;

  public int $background_number;
  public int $settings_mask;

  function hasSetting(int $bit): bool {
    return ($this->settings_mask & $bit) > 0;
  }
}
