<?php

namespace App\Enum;

/**
 * @author Łukasz Gawryluk <gawryluklukasz@gmail.com>
 */
final class GnomeValidatorReason
{
    const StrengthToLow = "Strength is to low";
    const StrengthToHigh = "Strength is to high";
    const StrengthMustBeInt = "Strength must be an integer";
    const AgeToHigh = "Age is to high";
    const AgeToLow = "Age is to low";
    const AgeMustBeInt = "Age must be an integer";
}
