<?php

namespace Sparav\Customer\Enums;

use BenSampo\Enum\Enum;

class CustomerLoginSourceType extends Enum
{

    const SparavMac = 0;
    const SparavWindows = 1;
    const SparavCustomerWebsite = 2;
    const SparavAndroid = 3;
    const SparaviOS = 4;

}