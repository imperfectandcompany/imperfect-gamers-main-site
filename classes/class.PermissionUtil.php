<?php

class PermissionUtil {
    const PERMISSION_ROOT = 1 << 0; // 1
    const PERMISSION_ADMIN = 1 << 1; // 2
    const PERMISSION_MOD = 1 << 2; // 4
    const PERMISSION_VIP = 1 << 3; // 8
    const PERMISSION_VERIFIED_MEMBER = 1 << 4; // 16
    const PERMISSION_ONBOARDED_MEMBER = 1 << 5; // 32
    const PERMISSION_MEMBER = 1 << 6; // 64
    const PERMISSION_GUEST = 1 << 7; // 128
    const PERMISSION_STEAM_INTEGRATED = 1 << 8; // 256

    // Maps external database roles to internal permissions
    private static $roleMap = [
        '#css/headadmin' => self::PERMISSION_ROOT,
        '#css/admin' => self::PERMISSION_ADMIN,
        '#css/moderator' => self::PERMISSION_MOD,
        '#css/vip' => self::PERMISSION_VIP,
    ];

    public static function getUserPermissions($userId) {
        $permissions = self::PERMISSION_GUEST; // Default permission

        $isAdmin = DatabaseConnector::query('SELECT admin FROM users WHERE id=:id', [':id' => $userId])[0]['admin'];
        if ($isAdmin) {
            return self::PERMISSION_ROOT; // Admin overrides all other permissions
        }

        $steamId64 = Settings::hasSteam($userId);
        if ($steamId64) {
            $permissions |= self::PERMISSION_STEAM_INTEGRATED;
            // Fetch additional permissions based on Steam ID from the external database
            $externalPermissions = self::getExternalPermissions($steamId64);
            $permissions |= $externalPermissions;
        }

        return $permissions;
    }

    private static function getExternalPermissions($steamId64) {
        $externalDbPermissions = 0;
        $adminInfo = DatabaseConnector::getExternalDatabase('simple_admin')->query("SELECT flags FROM sa_admins WHERE player_steamid='{$steamId64}'")->fetch();
        if ($adminInfo) {
            $flags = explode(',', $adminInfo['flags']);
            foreach ($flags as $flag) {
                if (array_key_exists($flag, self::$roleMap)) {
                    $externalDbPermissions |= self::$roleMap[$flag];
                }
            }
        }
    
        // Implementing hierarchical permissions
        if ($externalDbPermissions & self::PERMISSION_ROOT) {
            $externalDbPermissions |= self::PERMISSION_ADMIN | self::PERMISSION_MOD; // ROOT inherits ADMIN and MOD
        }
        if ($externalDbPermissions & self::PERMISSION_ADMIN) {
            $externalDbPermissions |= self::PERMISSION_MOD; // ADMIN inherits MOD
        }
        // No need to explicitly remove VIP, as it's only added if explicitly set in the flags
    
        return $externalDbPermissions;
    }

    public static function hasPermission($userPermissions, $requiredPermission) {
        return ($userPermissions & $requiredPermission) === $requiredPermission;
    }
}
