<?php

function currentUser(): ?\Users\User {
  if ($_COOKIE['id']) {
    return \Users\User::getUserFromDB((int)$_COOKIE['id']);
  }
  return null;
}

function realIP(): string {
  return '0.0';
}
