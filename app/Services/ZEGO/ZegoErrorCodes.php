<?php
namespace ZEGO;

class ZegoErrorCodes{
    const success                       = 0;  // Successfully obtained authentication token
    const appIDInvalid                  = 1;  // Error in appID parameter passed in when calling the method
    const userIDInvalid                 = 3;  // Error in userID parameter passed in when calling the method
    const secretInvalid                 = 5;  // Error in secret parameter passed in when calling the method
    const effectiveTimeInSecondsInvalid = 6;  // Error in effectiveTimeInSeconds parameter passed in when calling the method
}
