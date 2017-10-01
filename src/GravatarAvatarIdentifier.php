<?php

declare(strict_types = 1);

namespace dpi\ak_gravatar;

use dpi\ak\AvatarIdentifier;
use dpi\ak\Exception\AvatarIdentifierException;

/**
 * Specifies identifier logic specific to Gravatar API.
 */
class GravatarAvatarIdentifier extends AvatarIdentifier {

  /**
   * {@inheritdoc}
   */
  public function setHashed(string $string) {
    if (strlen($string) > 32) {
      // Avatars will not be unique if longer than 32 characters.
      throw new AvatarIdentifierException('Gravatar does not recognise characters after 32nd character.');
    }
    return parent::setHashed($string);
  }

  /**
   * Hashes strings for Gravatar.
   *
   * @param string $string
   *   The string to hash.
   *
   * @return string
   *   A hashed string.
   *
   * @see \dpi\ak_gravatar\AvatarKit\AvatarServices\Gravatar\GravatarBase::createIdentifier
   */
  public static function gravatarHasher(string $string) {
    $string = strtolower($string);
    $string = md5($string);
    return $string;
  }

}
