<?php
/**
 * @project    Hesper Framework
 * @author     Alex Gorbylev
 * @originally onPHP Framework
 * @originator Konstantin V. Arkhipov
 */
namespace Hesper\Meta\Builder;

use Hesper\Meta\Entity\MetaClass;

/**
 * Class EnumerationClassBuilder
 * @package Hesper\Meta\Builder
 */
final class EnumerationClassBuilder extends OnceBuilder {

	public static function build(MetaClass $class) {
		$out = self::getHead();

		$out .= <<<EOT
namespace {$class->getNamespace()};

use Hesper\Core\Base\Enumeration;


EOT;

		if ($type = $class->getType()) {
			$type = "{$type->getName()} ";
		} else {
			$type = null;
		}

		$out .= <<<EOT
{$type}class {$class->getName()} extends Enumeration
{
	// implement me!
}

EOT;

		return $out . self::getHeel();
	}
}
