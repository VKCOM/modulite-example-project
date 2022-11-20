<?php

namespace Messinger\Kernel;

interface NotificationInterface {

  function send(int $user_id);

}
