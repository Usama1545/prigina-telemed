<?php

namespace App\Exceptions;

use RuntimeException;

/** The requested doctor slot was taken (or stopped being bookable) before it could be reserved. */
class SlotUnavailableException extends RuntimeException {}
