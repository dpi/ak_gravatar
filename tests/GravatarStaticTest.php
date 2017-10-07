<?php

declare(strict_types = 1);

use dpi\ak\AvatarConfiguration;
use dpi\ak_gravatar\AvatarKit\AvatarServices\Gravatar\GravatarRetro;

/**
 * Tests static Gravatar services.
 */
class GravatarStaticTest extends PHPUnit_Framework_TestCase {

  /**
   * Test no difference between raw hash casing.
   */
  public function testRetro() {
    $configuration = (new AvatarConfiguration())
      ->setProtocol('http');
    $instance = new GravatarRetro($configuration);

    $identifier = ($instance->createIdentifier())
      ->setRaw('hello@example.com');

    $this->assertSame('http://gravatar.com/avatar/cb8419c1d471d55fbca0d63d1fb2b6ac?f=y&d=retro', $instance->getAvatar($identifier));
  }

}
