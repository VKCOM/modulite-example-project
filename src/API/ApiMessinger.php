<?php

namespace API;

use API\Exceptions\UnauthorizedException;
use Messinger\Channels\ChannelActions;
use Messinger\Folders\FolderActions;
use Messinger\Folders\SortImplementation;
use Messinger\Folders\SortPolicy;

class ApiMessinger {
  static private function currentUserOrThrow(): \Users\User {
    $user = currentUser();
    if ($user === null) {
      throw new UnauthorizedException();
    }
    return $user;
  }

  static function getMyFolders(): ApiResponseOk {
    $user = self::currentUserOrThrow();
    $folders = FolderActions::getFoldersOfUser($user);
    return new ApiResponseOk($folders);
  }

  static function joinChannel(int $channel_id, ?string $invite_code): ApiResponseOk {
    $user = self::currentUserOrThrow();
    ChannelActions::join($user->id, $channel_id, $invite_code);
    return new ApiResponseOk();
  }

  static function leaveChannel(int $channel_id): ApiResponseOk {
    $user = self::currentUserOrThrow();
    ChannelActions::leave($user->id, $channel_id);
    return new ApiResponseOk();
  }
}
