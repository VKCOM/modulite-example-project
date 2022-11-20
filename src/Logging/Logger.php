<?php

namespace Logging;

class Logger {
  static function logError(string $message) {
    // todo implement a better way for logging; now, just insert to MySQL
    \DB\MysqlAdaptor::insertToLogsTable("error: $message");
  }

  static function logSuccess(string $message) {
    // todo implement a better way for logging; now, just insert to MySQL
    \DB\MysqlAdaptor::insertToLogsTable($message);
  }
}
