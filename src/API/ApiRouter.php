<?php

namespace API;

use API\Exceptions\UnauthorizedException;

class ApiRouter {
  static private function ensureAdmin() {
    if (!currentUser()->isAdmin()) {
      throw new UnauthorizedException();
    }
    require_once __DIR__ . '/../Adaminka/adaminka.php';
  }

  /**
   * @param mixed[] $args
   * @throws Exceptions\ApiException
   */
  static function parseAndRouteApiQuery(string $query, array $args): string {
    switch ($query) {
      case '/messinger/folders':
        $response = ApiMessinger::getMyFolders();
        break;

      case '/messinger/channels/join':
        if (!is_int($args['channel_id'])) {
          throw new Exceptions\BadRequestException("invalid channel_id");
        }
        if (isset($args['invite_code']) && !is_string($args['invite_code'])) {
          throw new Exceptions\BadRequestException("invalid invite_code");
        }
        $response = ApiMessinger::joinChannel((int)$args['channel_id'], isset($args['invite_code']) ? (string)$args['invite_code'] : null);
        break;

      case '/messinger/channels/leave':
        if (!is_int($args['channel_id'])) {
          throw new Exceptions\BadRequestException("invalid channel_id");
        }
        $response = ApiMessinger::leaveChannel((int)$args['channel_id']);
        break;

      case '/adaminka/addUser':
        self::ensureAdmin();
        adaminka_addUser((int)$args['user_id'], (int)$args['channel_id']);
        $response = new ApiResponseOk();
        break;
      case '/adaminka/createChannel':
        self::ensureAdmin();
        adaminka_createChannel((string)$args['name']);
        $response = new ApiResponseOk();
        break;

      default:
        throw new Exceptions\UnknownUrlException("Not found: $query");
    }
    return $response->json;
  }
}
