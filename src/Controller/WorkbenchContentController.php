<?php
/**
 * @file
 * Contains \Drupal\workbench\Controller\WorkbenchContentController.
 */

namespace Drupal\workbench\Controller;

use Drupal\node\Controller\NodeController;

/**
 * Class WorkbenchContentController.
 *
 * @package Drupal\workbench\Controller
 */
class WorkbenchContentController extends NodeController {

  /**
   * Simple page to show list of content type to create.
   *
   * @see hook_workbench_create_alter()
   *
   * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
   *    A Render API array of content creation options.
   */
  public function addPage() {
    $output = parent::addPage();
    // Allow other modules to add content here.
    \Drupal::moduleHandler()->alter('workbench_create', $output);

    return $output;
  }
}