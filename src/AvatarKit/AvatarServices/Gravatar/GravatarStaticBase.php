<?php

declare(strict_types = 1);

namespace dpi\ak_gravatar\AvatarKit\AvatarServices\Gravatar;

use dpi\ak\AvatarIdentifierInterface;

/**
 * Base class for static Gravatars.
 */
abstract class GravatarStaticBase extends GravatarBase implements GravatarInterface {

  /**
   * {@inheritdoc}
   */
  public function getAvatar(AvatarIdentifierInterface $identifier) : string {
    $components = parse_url(parent::getAvatar($identifier) . '?q=2');

    // Deconstruct query.
    $query_string = $url['query'] ?? '';

    $query = [];
    parse_str($query_string, $query);

    // Add static query parameters.
    $query['f'] = 'y';
    $query['d'] = $this->defaultId();

    // Rebuild query.
    $components['query'] = http_build_query($query);

    return http_build_url($components);
  }

}
