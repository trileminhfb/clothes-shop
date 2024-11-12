<?php

declare(strict_types=1);

namespace App\Enums\brand;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class statusBrand extends Enum
{
    const ENABLE = 0;
    const DISABLE = 1;
}
