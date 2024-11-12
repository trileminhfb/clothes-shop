<?php

declare(strict_types=1);

namespace App\Enums\payment;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class statusPayment extends Enum
{
    const ENABLE = 0;
    const DISABLE = 1;
}
