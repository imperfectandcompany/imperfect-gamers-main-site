<?php

$userPermissions = PermissionUtil::getUserPermissions($userid);

// Redirect non-admin users
if (!PermissionUtil::hasPermission($userPermissions, PermissionUtil::PERMISSION_ADMIN)) {
    header('Location: /');
    exit();
}