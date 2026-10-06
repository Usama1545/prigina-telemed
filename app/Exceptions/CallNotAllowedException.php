<?php

namespace App\Exceptions;

use RuntimeException;

/** A call or no-show report was attempted outside the appointment's window; the message says why. */
class CallNotAllowedException extends RuntimeException {}
