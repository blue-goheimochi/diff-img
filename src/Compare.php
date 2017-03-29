<?php

namespace DiffImg;

class Compare
{
    public static function create($imgPath1, $imgPath2, $outputPath = './', $outputImgType = 'jpg', $outputImgName = 'diff')
    {
        $img1 = new imagick();
        $img1->readImage($imgPath1);
        
        $img2 = new imagick();
        $img2->readImage($imgPath2);
        
        $result = $img1->compareImages($img2, imagick::METRIC_PEAKSIGNALTONOISERATIO);
        $fp = fopen($outputPath . $outputImgName . $outputImgType,'wb');
        fwrite($fp,$result[0]);
        fclose($fp);
    }
}
