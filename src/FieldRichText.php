<?php

namespace Adaptcms\FieldRichText;

use Adaptcms\Base\Models\Package;

class FieldRichText
{
  /**
  * On Install
  *
  * @return void
  */
  public function onInstall()
  {
    Package::syncPackageFolder(get_class());
  }
}
