<?php

namespace MailPoet\Cron\Workers;

if (!defined('ABSPATH')) exit;


use Carbon\Carbon;
use MailPoet\Cron\CronHelper;
use MailPoet\Models\Newsletter;
use MailPoet\Models\ScheduledTask;
use MailPoet\Models\Subscriber;
use MailPoet\Util\Security;
use MailPoet\WP\Functions as WPFunctions;

class UnsubscribeTokens extends SimpleWorker {
  const TASK_TYPE = 'unsubscribe_tokens';
  const BATCH_SIZE = 1000;
  const AUTOMATIC_SCHEDULING = false;

  function processTaskStrategy(ScheduledTask $task) {
    $subscribers_count = $this->addTokens(Subscriber::class);
    while ($subscribers_count === self::BATCH_SIZE) {
      CronHelper::enforceExecutionLimit($this->timer);
      $subscribers_count = $this->addTokens(Subscriber::class);
    };
    $newsletters_count = $this->addTokens(Newsletter::class);
    while ($newsletters_count === self::BATCH_SIZE) {
      CronHelper::enforceExecutionLimit($this->timer);
      $newsletters_count = $this->addTokens(Newsletter::class);
    };
    if ($subscribers_count > 0 || $newsletters_count > 0) {
      self::schedule();
    }
    return true;
  }

  public function addTokens($model) {
    $instances = $model::whereNull('unsubscribe_token')->limit(self::BATCH_SIZE)->findMany();
    foreach ($instances as $instance) {
      $instance->set('unsubscribe_token', Security::generateUnsubscribeToken($model));
      $instance->save();
    }
    return count($instances);
  }

  static function getNextRunDate() {
    $wp = new WPFunctions;
    return Carbon::createFromTimestamp($wp->currentTime('timestamp'));
  }

}
