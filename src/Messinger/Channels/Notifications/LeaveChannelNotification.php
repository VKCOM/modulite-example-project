<?php

namespace Messinger\Channels\Notifications;

class LeaveChannelNotification implements \Messinger\Kernel\NotificationInterface {

  /** @phpstan-ignore-next-line */
  public function __construct(string $message) {
  }

  function send(int $user_id) {
    // ...
  }

}
