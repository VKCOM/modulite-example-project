<?php

namespace Messinger\Channels\Notifications;

class JoinChannelNotification implements \Messinger\Kernel\NotificationInterface {

  /** @phpstan-ignore-next-line */
  public function __construct(string $message) {
  }

  function send(int $user_id) {
    // ...
  }

}
