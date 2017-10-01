<?php

namespace dpi\ak_gravatar\AvatarKit\AvatarServices\Gravatar;

/**
 * Wavatar avatar service.
 *
 * @AvatarService(
 *   id = "gravatar_wavatar",
 *   name = "Wavatar",
 *   description = "Wavatar as provided by Gravatar.",
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
class GravatarWavatar extends GravatarStaticBase {

  /**
   * {@inheritdoc}
   */
  public function defaultId() {
    return 'wavatar';
  }

}
