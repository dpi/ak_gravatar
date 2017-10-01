<?php

declare(strict_types = 1);

namespace dpi\ak_gravatar\AvatarKit\AvatarServices\Gravatar;

use dpi\ak\AvatarIdentifierInterface;
use League\Uri\Components\Query;
use League\Uri\Schemes\Http;

/**
 * Base class for static Gravatars.
 */
abstract class GravatarStaticBase extends GravatarBase implements GravatarInterface {

  /**
   * {@inheritdoc}
   */
  public function getAvatar(AvatarIdentifierInterface $identifier) : string {
    $url = Http::createFromString(parent::getAvatar($identifier));

    $query = new Query($url->getQuery());
    $query = $query->merge(Query::build([
      'f' => 'y',
      'd' => $this->defaultId(),
    ]));

    return (string) $url->withQuery((string) $query);
  }

}
