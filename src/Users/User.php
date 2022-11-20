<?php

namespace Users;

class User {
  public int $id;
  public UserSettings $settings;

  function isAdmin(): bool {
    return false;
  }

  static function getUserFromDB(int $user_id): ?self {
    // fake
    $self = new self;
    $self->id = $user_id;
    $self->settings = new UserSettings();
    return $self;
  }
}
