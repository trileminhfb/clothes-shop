<?php

declare(strict_types=1);

namespace App\Enums\category;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class statusCategory extends Enum
{
    const ENABLE = 0;
    const DISABLE = 1;
}
