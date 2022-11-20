<?php

use Messinger\Channels\ChannelActions;
use Messinger\Channels\Notifications\JoinChannelNotification;
use Messinger\Kernel\MsgDatabase;


function adaminka_addUser(int $user_id, int $channel_id) {
  MsgDatabase::addUserToChannel($user_id, $channel_id);
  $n = new JoinChannelNotification('you were added by admin');
  $n->send($user_id);
  \Logging\Logger::logSuccess("user $user_id added to $channel_id");
}


function adaminka_createChannel(string $name) {
  ChannelActions::createChannel($name);
  \Logging\Logger::logSuccess("channel $name created");
}


