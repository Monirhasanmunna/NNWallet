<?php

/**
 * @param $key
 * @return string|string[]
 */
function notificationType ($key=null): array|string
{
    return mapHelperDataSet([
        NOTIFICATION_TYPE_TRANSACTIONS,
        NOTIFICATION_TYPE_PRICE_ALERTS,
        NOTIFICATION_TYPE_NFTS,
        NOTIFICATION_TYPE_VALIDATOR_ALERT,
        NOTIFICATION_TYPE_ECOSYSTEM,
    ], $key);
}
