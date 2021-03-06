<?php

namespace DrupalCodeGenerator\Tests\Drupal_8\Form;

use DrupalCodeGenerator\Tests\GeneratorTestCase;

/**
 * Test for d8:form:simple command.
 */
class SimpeTest extends GeneratorTestCase {

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    $this->class = 'Drupal_8\Form\Simple';
    $this->answers = [
      'Foo',
      'foo',
      'ExampleForm',
      'foo_example',
    ];

    $this->target = 'ExampleForm.php';
    $this->fixture = __DIR__ . '/_simple.php';

    parent::setUp();
  }

}
