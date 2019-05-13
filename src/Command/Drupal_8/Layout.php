<?php

namespace DrupalCodeGenerator\Command\Drupal_8;

use DrupalCodeGenerator\Command\ModuleGenerator;

/**
 * Implements d8:layout command.
 */
class Layout extends ModuleGenerator {

  protected $name = 'd8:layout';
  protected $description = 'Generates a layout';
  protected $alias = 'layout';
  protected $nameQuestion = NULL;

  /**
   * {@inheritdoc}
   */
  protected function generate() :void {

    $vars = &$this->collectDefault();

    $vars['layout_name'] = $this->ask('Layout name', 'Example');
    $vars['layout_machine_name'] = $this->ask('Layout machine name', '{layout_name|h2m}');
    $vars['category'] = $this->ask('Category', 'My layouts');

    $vars['js'] = $this->confirm('Would you like to create JavaScript file for this layout?', FALSE);
    $vars['css'] = $this->confirm('Would you like to create CSS file for this layout?', FALSE);

    $this->addFile('{machine_name}.layouts.yml', 'd8/_layout/layouts')
      ->action('append');

    if ($vars['js'] || $vars['css']) {
      $this->addFile('{machine_name}.libraries.yml', 'd8/_layout/libraries')
        ->action('append');
    }

    $vars['layout_asset_name'] = '{layout_machine_name|u2h}';

    $this->addFile('layouts/{layout_machine_name}/{layout_asset_name}.html.twig', 'd8/_layout/template');
    if ($vars['js']) {
      $this->addFile('layouts/{layout_machine_name}/{layout_asset_name}.js', 'd8/_layout/javascript');
    }
    if ($vars['css']) {
      $this->addFile('layouts/{layout_machine_name}/{layout_asset_name}.css', 'd8/_layout/styles');
    }

  }

}
