<?php
namespace App\Helpers;

class AvatarHelper {
    public static function getAvatar($gender, $prefix = '') {
        $g = strtolower(trim($gender));
        if ($g == "male" || $g == "groom") {
            return $prefix . "images/male_avatar.png";
        } else {
            return $prefix . "images/female_avatar.png";
        }
    }
}
?>
