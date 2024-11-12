<?php

declare(strict_types=1);

namespace App\Enums\wareHouse;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class statusWareHouse extends Enum
{
    const AVAILABLE = 0;
    const LOW = 1;
    const UNAVAILABLE = 2;
}
