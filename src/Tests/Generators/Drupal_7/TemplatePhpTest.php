<?php

namespace DrupalCodeGenerator\Tests\Drupal_7;

use DrupalCodeGenerator\Tests\GeneratorTestCase;

/**
 * Test for d7:template.php command.
 */
class TemplatePhpTest extends GeneratorTestCase {

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    $this->class = 'Drupal_7\TemplatePhp';
    $this->answers = [
      'Example',
      'example',
    ];

    $this->target = 'template.php';
    $this->fixture = __DIR__ . '/_template.php';

    parent::setUp();
  }

}
