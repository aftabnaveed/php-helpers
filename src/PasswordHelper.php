<?php

namespace AndreasGlaser\Helpers;

/**
 * Class RandomHelper
 *
 * @package AndreasGlaser\Helpers
 */
class PasswordHelper
{
    const DEFAULT_PASSWORD_GENERATOR_SETS = [
        'ABCDEFGHJKLMNPQRSTUVWXYZ',
        'abcdefghjkmnpqrstuvwxyz',
        '123456789',
        '+-!?+=',
    ];

    /**
     * @param int $passwordLength
     * @param array $sets
     * @return string
     * @throws \Exception
     */
    public static function generatePassword(int $passwordLength = 16, array $sets = self::DEFAULT_PASSWORD_GENERATOR_SETS): string
    {
        $setCount = count($sets);
        if ($passwordLength < $setCount) {
            throw new \LogicException(sprintf('Password length has to be at least %s characters long. (Is: %s)', $setCount, $passwordLength));
        }

        $password = '';

        // pick one character of each set to ensure at least one is present in generated password
        foreach ($sets AS $set) {
            $password .= $set[random_int(0, mb_strlen($set) - 1)];
        }

        if ($passwordLength > $setCount) {
            $setsCombined = implode('', $sets);
            $combinedSetsLength = mb_strlen($setsCombined) - 1;
            $remainingLength = $passwordLength - $setCount;
            for ($i = 0; $i < $remainingLength; $i++) {
                $password .= $setsCombined[random_int(0, $combinedSetsLength)];
            }
        }

        return str_shuffle($password);
    }
}