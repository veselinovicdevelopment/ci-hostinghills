<?php
 
if (file_exists(__DIR__ . '/rc-config.php')) {
  require_once __DIR__ . '/rc-config.php';
}  
// Exceptions
require_once __DIR__ . '/exception/ApiConnectionException.php';
require_once __DIR__ . '/exception/InvalidArrayException.php';
require_once __DIR__ . '/exception/InvalidItemException.php';
require_once __DIR__ . '/exception/InvalidParameterException.php';
require_once __DIR__ . '/exception/InvalidUrlArrayException.php';
require_once __DIR__ . '/exception/InvalidValidationException.php';
require_once __DIR__ . '/exception/MissingParameterException.php';

require_once __DIR__ . '/core/Core.php';
require_once __DIR__ . '/validation/Validation.php';
require_once __DIR__ . '/contact/Contact.php';
require_once __DIR__ . '/customer/Customer.php';
require_once __DIR__ . '/domain/Domain.php';
require_once __DIR__ . '/billing/Billing.php';