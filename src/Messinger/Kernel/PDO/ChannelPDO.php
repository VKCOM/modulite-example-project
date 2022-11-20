<?php

namespace Messinger\Kernel\PDO;

class ChannelPDO implements \DB\StorableObject {
  public int $id;
  public int $create_time;
  public string $name;

  function toArray(): array {
    return [
      'id'          => $this->id,
      'create_time' => $this->create_time,
      'name'        => $this->name,
    ];
  }
}
