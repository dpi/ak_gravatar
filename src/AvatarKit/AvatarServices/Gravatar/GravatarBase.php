<?php

declare(strict_types = 1);

namespace dpi\ak_gravatar\AvatarKit\AvatarServices\Gravatar;

use dpi\ak\AvatarIdentifierInterface;
use dpi\ak\AvatarKit\AvatarServices\AvatarServiceBase;
use dpi\ak_gravatar\GravatarAvatarIdentifier;

/**
 * Common functionality for Gravatar services.
 */
abstract class GravatarBase extends AvatarServiceBase implements GravatarInterface {

  /**
   * {@inheritdoc}
   */
  public function getAvatar(AvatarIdentifierInterface $identifier) : ?string {
    $components = [];

    $components['scheme'] = $this->getConfiguration()->getProtocol();
    // @todo test invalid protocol (this shouldnt happen since factory validates).
    $components['host'] = $components['scheme'] == 'http' ? 'gravatar.com' : 'secure.gravatar.com';

    // Path.
    $identifier = $identifier->getHashed();
    $components['path'] = '/avatar/' . $identifier;

    // Query.
    $width = $this->getConfiguration()->getWidth();
    $query = [];
    if ($width) {
      $query['s'] = $width;
    }
    $components['query'] = http_build_query($query);

    return http_build_url($components);
  }

  /**
   * {@inheritdoc}
   */
  public function createIdentifier() : AvatarIdentifierInterface {
    return (new GravatarAvatarIdentifier())
      ->setHasher(['\dpi\ak_gravatar\GravatarAvatarIdentifier', 'gravatarHasher']);
  }

}
