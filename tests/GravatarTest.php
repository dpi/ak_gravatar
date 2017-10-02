<?php

declare(strict_types = 1);

use dpi\ak\AvatarConfiguration;
use dpi\ak_gravatar\AvatarKit\AvatarServices\Gravatar\GravatarUniversal;

/**
 * Tests Gravatar services.
 */
class GravatarTest extends PHPUnit_Framework_TestCase {

  /**
   * Test no difference between raw hash casing.
   */
  public function testHashCase() {
    $configuration = (new AvatarConfiguration())
      ->setProtocol('http');
    $instance = new GravatarUniversal($configuration);

    $identifier1 = ($instance->createIdentifier())
      ->setRaw('hello@example.com');
    $identifier2 = ($instance->createIdentifier())
      ->setRaw('HELLO@EXAMPLE.COM');

    $this->assertSame($instance->getAvatar($identifier1), $instance->getAvatar($identifier2));
  }

  /**
   * Test insecure URL with no customisation.
   */
  public function testBasicInsecure() {
    $configuration = (new AvatarConfiguration())
      ->setProtocol('http');
    $instance = new GravatarUniversal($configuration);
    $identifier = ($instance->createIdentifier())
      ->setRaw('hello@example.com');

    $this->assertSame('http://gravatar.com/avatar/cb8419c1d471d55fbca0d63d1fb2b6ac', $instance->getAvatar($identifier));
  }

  /**
   * Test secure URL with no customisation.
   */
  public function testBasicSecure() {
    $configuration = (new AvatarConfiguration())
      ->setProtocol('https');
    $instance = new GravatarUniversal($configuration);
    $identifier = ($instance->createIdentifier())
      ->setRaw('hello@example.com');

    $this->assertSame('https://secure.gravatar.com/avatar/cb8419c1d471d55fbca0d63d1fb2b6ac', $instance->getAvatar($identifier));
  }

  /**
   * Ensures width is set when appropriate and height does nothing.
   *
   * @param string $uri
   *   Assert this URI.
   * @param int|null $width
   *   Set this width on the service.
   * @param int|null $height
   *   Set this height on the service.
   *
   * @dataProvider dimensionMap
   */
  public function testProtocolValidator(string $uri, ?int $width, ?int $height) {
    $configuration = (new AvatarConfiguration())
      ->setProtocol('https');
    if ($width) {
      $configuration->setWidth($width);
    }
    if ($height) {
      $configuration->setHeight($height);
    }
    $instance = new GravatarUniversal($configuration);

    $identifier = ($instance->createIdentifier())
      ->setRaw('hello@example.com');

    $this->assertSame($uri, $instance->getAvatar($identifier));

  }

  /**
   * Map for dimensions.
   *
   * @return array
   *   A data provider map.
   */
  public function dimensionMap() {
    return [
      'Width only' => [
        'https://secure.gravatar.com/avatar/cb8419c1d471d55fbca0d63d1fb2b6ac?s=999',
        999,
        NULL
      ],
      'Both dimensions' => [
        'https://secure.gravatar.com/avatar/cb8419c1d471d55fbca0d63d1fb2b6ac?s=888',
        888,
        777
      ],
      'Height only' => [
        'https://secure.gravatar.com/avatar/cb8419c1d471d55fbca0d63d1fb2b6ac',
        NULL,
        666
      ],
    ];
  }

}
