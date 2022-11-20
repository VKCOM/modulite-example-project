<?php

namespace Messinger\Kernel;

use DB\DbConnection;

class MsgDatabase {
  private const TABLE_MESSAGES          = 'messages';
  private const TABLE_CHANNELS          = 'channels';
  private const TABLE_USERS_IN_CHANNELS = 'user_channel';

  static function addMessage(PDO\MessagePDO $message) {
    $conn = DbConnection::getFromPool();
    $conn->insertInto(self::TABLE_MESSAGES, $message->toArray());
  }

  static function deleteMessage(int $message_id) {
    $conn = DbConnection::getFromPool();
    $conn->deleteFrom(self::TABLE_MESSAGES, $message_id);
  }

  static function insertToChannelsTable(\DB\StorableObject $pdo) {
    $conn = DbConnection::getFromPool();
    $conn->insertInto(self::TABLE_CHANNELS, $pdo->toArray());
  }

  static function createChannelByName(string $name) {
    $pdo = new PDO\ChannelPDO();
    $pdo->name = $name;
    $pdo->create_time = time();
    self::insertToChannelsTable($pdo);
  }

  static function addUserToChannel(int $user_id, int $channel_id) {
    if (!$user_id) {
      \DB\MysqlAdaptor::insertToLogsTable("whyever, user_id=0");
      return;
    }

    $conn = DbConnection::getFromPool();
    $conn->insertInto(self::TABLE_USERS_IN_CHANNELS, [
      'user_id'    => $user_id,
      'channel_id' => $channel_id,
    ]);
  }

  static function getChannelsOfUser(int $user_id): array {
    $conn = DbConnection::getFromPool();
    return $conn->selectColumn(self::TABLE_USERS_IN_CHANNELS, 'channel_id', "user_id=$user_id");
  }

  static function getMessageText(int $channel_id, int $message_id): string {
    return '';
  }
}
