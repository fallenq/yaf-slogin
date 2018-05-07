<?php
/**
 * Image file tool
 */
namespace Tool;

class ImageTool
{

    /**
     * Change the direction of picture
     * @param $picAddr
     */
    public static function imgOrientate($picAddress, $imageType = ''){
        $imageType = !empty($imageType)? $imageType: 'jpeg';
        $fromMethodName = self::getImagecreatefromMethod($imageType);
        $image = call_user_func($fromMethodName, $picAddress);
        $exif = exif_read_data($picAddress);
        if($exif['Orientation'] == 3) {
            $result = imagerotate($image, 180, 0);
            imagejpeg($result, $picAddress, 100);
        } elseif($exif['Orientation'] == 6) {
            $result = imagerotate($image, -90, 0);
            imagejpeg($result, $picAddress, 100);
        } elseif($exif['Orientation'] == 8) {
            $result = imagerotate($image, 90, 0);
            imagejpeg($result, $picAddress, 100);
        }
        isset($result) && imagedestroy($result);
        imagedestroy($image);
    }

    /**
     * Get the name of imagecreatefrom
     * @param $imageType
     * @return string
     */
    private static function getImagecreatefromMethod($imageType)
    {
        $isDefault = 0;
        $imageType = strtolower($imageType);
        if ($imageType == 'gif') {

        } else if($imageType == 'png') {

        } else if(in_array($imageType, ['jpeg', 'jpg'])) {
            $imageType = 'jpeg';
        } else {
            $isDefault = 1;
        }
        if ($isDefault) {
            $fromMethodName = 'imagecreatefromjpeg';
        } else {
            $fromMethodName = 'imagecreatefrom'.$imageType;
        }
        return $fromMethodName;
    }
}