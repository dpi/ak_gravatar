<?php

namespace dpi\ak_gravatar\AvatarKit\AvatarServices\Gravatar;

/**
 * Mystery Man avatar service.
 *
 * @AvatarService(
 *   id = "gravatar_mystery_man",
 *   name = "Mystery Man",
 *   description = "Mystery Man as provided by Gravatar.",
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
class GravatarMysteryMan extends GravatarStaticBase {

  /**
   * {@inheritdoc}
   */
  public function defaultId() {
    return 'mm';
  }

}
