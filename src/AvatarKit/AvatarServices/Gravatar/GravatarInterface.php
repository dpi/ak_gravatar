<?php

namespace dpi\ak_gravatar\AvatarKit\AvatarServices\Gravatar;

use dpi\ak\AvatarKit\AvatarServices\AvatarServiceInterface;

/**
 * Interface ServiceInterface.
 */
interface GravatarInterface extends AvatarServiceInterface {

  /**
   * Default fallback identifier.
   *
   * This identifier is used when a Universal avatar is not found, or if 'force
   * default' argument is set.
   *
   * @return string
   *   The API identifier for default provider.
   */
  public function defaultId();

}
