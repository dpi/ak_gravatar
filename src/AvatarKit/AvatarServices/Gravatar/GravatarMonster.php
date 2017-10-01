<?php

namespace dpi\ak_gravatar\AvatarKit\AvatarServices\Gravatar;

/**
 * Monster avatar service.
 *
 * @AvatarService(
 *   id = "gravatar_monster",
 *   name = "Monster",
 *   description = "Monster as provided by Gravatar.",
 *   protocols = {
 *     "http",
 *     "https"
 *   },
 *   mime = {
 *     "image/jpeg"
 *   },
 *   dimensions = "1x1-2048x2048",
 *   is_dynamic = FALSE,
 *   is_fallback = TRUE,
 *   is_remote = TRUE
 * )
 */
class GravatarMonster extends GravatarStaticBase {

  /**
   * {@inheritdoc}
   */
  public function defaultId() {
    return 'monsterid';
  }

}
