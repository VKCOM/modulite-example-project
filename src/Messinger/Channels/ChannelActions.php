<?php

namespace Messinger\Channels;

use Messinger\Kernel\MsgDatabase;
use Messinger\Kernel\PDO\ChannelPDO;

class ChannelActions {
  static function getMessageText(int $channel_id, int $message_id): string {
    return MsgDatabase::getMessageText($channel_id, $message_id);
  }

  static function createChannel(string $name) {
    $pdo = new ChannelPDO();
    $pdo->name = $name;
    MsgDatabase::insertToChannelsTable($pdo);
  }

  static function join(int $user_id, int $channel_id, ?string $invite_code) {
    // ...
    $notification = new Notifications\JoinChannelNotification('welcome');
    $notification->send($user_id);
  }

  static function leave(int $user_id, int $channel_id) {
    // ...
    $notification = new Notifications\LeaveChannelNotification('see you again');
    $notification->send($user_id);
  }

  static function addUserSkipRightsCheck(int $user_id, int $channel_id, ?string $notification_text) {
    MsgDatabase::addUserToChannel($user_id, $channel_id);
    if ($notification_text !== null) {
      $notification = new Notifications\JoinChannelNotification($notification_text);
      $notification->send($user_id);
    }
  }
}
