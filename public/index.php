<?php

use Challenge\SharedContext\Infrastructure\Resources\ChallengeApiKernel;

require_once '../vendor/autoload_runtime.php';

return static function (array $context) {
    return new ChallengeApiKernel($context['APP_ENV'], (bool)$context['APP_DEBUG']);
};
