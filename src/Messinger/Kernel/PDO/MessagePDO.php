<?php

namespace Messinger\Kernel\PDO;

class MessagePDO implements \DB\StorableObject {
  public int $id;
  public int $user_id;
  public int $chat_id;
  public string $text;

  static function createZero(): self {
    return new self;
  }

  function toArray(): array {
    return [
      'user_id' => $this->user_id,
      'chat_id' => $this->chat_id,
      'text'    => $this->text,
    ];
  }
}
