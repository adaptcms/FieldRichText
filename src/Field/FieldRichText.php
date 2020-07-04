<?php

namespace Adaptcms\FieldRichText\Field;

use Adaptcms\Fields\FieldType;

class FieldRichText extends FieldType
{
  /**
  * Migration Command
  * When a module field, page field, or another variation is made
  * from this field, you must supply a valid migration string in string format.
  * Here is an example, please note the use of `:columnName` and having the command
  * in single quotes so the CMS can execute the command via migrations:
  *
  * '$table->string(":columnName")->nullable();'
  *
  * @return string
  */
  public function migrationCommand()
  {
    return '$table->text(":columnName")->nullable();';
  }
}
