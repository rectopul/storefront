<?php

namespace MailPoet\AdminPages\Pages;

if (!defined('ABSPATH')) exit;


use MailPoet\AdminPages\PageRenderer;
use MailPoet\Config\Menu;
use MailPoet\Features\FeaturesController;
use MailPoet\Models\Subscriber;

class Premium {
  /** @var PageRenderer */
  private $page_renderer;

  /** @var FeaturesController */
  private $features_controller;

  function __construct(PageRenderer $page_renderer, FeaturesController $features_controller) {
    $this->page_renderer = $page_renderer;
    $this->features_controller = $features_controller;
  }

  function render() {
    if ($this->features_controller->isSupported(FeaturesController::NEW_PREMIUM_PAGE)) {
      $data = [
        'subscriber_count' => Subscriber::getTotalSubscribers(),
      ];
      $this->page_renderer->displayPage('premium.html', $data);
    } else {
      $data = [
        'subscriber_count' => Subscriber::getTotalSubscribers(),
        'sub_menu' => Menu::MAIN_PAGE_SLUG,
        'display_discount' => time() <= strtotime('2018-11-30 23:59:59'),
      ];
      $this->page_renderer->displayPage('premium_old.html', $data);
    }
  }
}
