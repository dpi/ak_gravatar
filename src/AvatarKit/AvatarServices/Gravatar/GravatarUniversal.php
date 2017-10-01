<?php

namespace dpi\ak_gravatar\AvatarKit\AvatarServices\Gravatar;

/**
 * Universal Gravatar service.
 *
 * @AvatarService(
 *   id = "gravatar_universal",
 *   name = "Gravatar",
 *   description = "Universal Gravatar avatar hosting service.",
 *   protocols = {
 *     "http",
 *     "https"
 *   },
 *   mime = {
 *     "image/jpeg"
 *   },
 *   dimensions = "1x1-2048x2048",
 *   is_dynamic = TRUE,
 *   is_fallback = FALSE,
 *   is_remote = TRUE
 * )
 */
class GravatarUniversal extends GravatarBase {

  /**
   * {@inheritdoc}
   */
  public function defaultId() {
    return '404';
  }

}
