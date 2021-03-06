<?php
/**
 * @file
 * Contains \Drupal\workbench\Plugin\Block\WorkbenchBlock.
 */

namespace Drupal\workbench\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Register a block that other modules may hook into.
 *
 * @Block(
 *   id = "workbench_block",
 *   admin_label = @Translation("Workbench information")
 * )
 */
class WorkbenchBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $items = \Drupal::moduleHandler()->invokeAll('workbench_block');
    if (empty($items)) {
      return array();
    }
    return array(
      '#markup' => '<div class="workbench-info-block">' . implode('<br />', $items) . '</div>',
      '#attached' => array(
        'library' => array('workbench/workbench.block'),
      ),
    );
  }

}
