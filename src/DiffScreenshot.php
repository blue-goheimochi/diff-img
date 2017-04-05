<?php

namespace DiffScreenshot;

class DiffScreenshot
{
    public static function compare($imgPath1, $imgPath2, $outputPath = './', $outputImgType = 'jpg', $outputImgName = 'diff')
    {
        $img1 = new \Imagick();
        $img1->readImage($imgPath1);
        $img1->scaleImage(1000, 0);
        
        $img2 = new \Imagick();
        $img2->readImage($imgPath2);
        $img2->scaleImage(1000, 0);
        
        $resizeWidth  = ($img1->getImageWidth() >= $img2->getImageWidth())   ? $img1->getImageWidth()  : $img2->getImageWidth();
        $resizeHeight = ($img1->getImageHeight() >= $img2->getImageHeight()) ? $img1->getImageHeight() : $img2->getImageHeight();
        
        if ($resizeWidth > $resizeHeight) {
            $resizeHeight = $resizeWidth;
        } else {
            $resizeWidth = $resizeHeight;
        }
        
        $img1->extentImage($resizeWidth, $resizeHeight, -(($resizeWidth - $img1->getImageWidth())/2), 0);
        $img2->extentImage($resizeWidth, $resizeHeight, -(($resizeWidth - $img2->getImageWidth())/2), 0);
        
        $img1->resizeImage(1000, 1000, \Imagick::FILTER_POINT, 0);
        $img2->resizeImage(1000, 1000, \Imagick::FILTER_POINT, 0);
        
        // cf: http://php.net/manual/ja/imagick.compareimages.php#114944
        $result = $img1->compareImages($img2, 1);
            
        $diffImgName = $outputPath . $outputImgName . '.' . $outputImgType;
        $result[0]->writeImages($diffImgName, true);
        
        $img1->clear();
        $img2->clear();
        $result[0]->clear();
        
        $score = $result[1];
        return (int) $score;
    }
    
    public static function createAnimeGif($imgPath1, $imgPath2, $outputPath = './', $outputImgName = 'anime-diff')
    {
        $img1 = new \Imagick();
        $img1->readImage($imgPath1);
          
        $img2 = new \Imagick();
        $img2->readImage($imgPath2);
        
        $resizeWidth  = ($img1->getImageWidth() >= $img2->getImageWidth())   ? $img1->getImageWidth()  : $img2->getImageWidth();
        $resizeHeight = ($img1->getImageHeight() >= $img2->getImageHeight()) ? $img1->getImageHeight() : $img2->getImageHeight();
        
        $img1->extentImage($resizeWidth, $resizeHeight, -($resizeWidth - $img1->getImageWidth()) / 2, 0);
        $img2->extentImage($resizeWidth, $resizeHeight, -($resizeWidth - $img2->getImageWidth()) / 2, 0);
        
        $animeGif = new \Imagick();
        $animeGif->setFormat('gif');
        
        $img1->setImageFormat('gif');
        $img1->setImageDelay(100);
        $img1->setImageIterations(0);
        
        $img2->setImageFormat('gif');
        $img2->setImageDelay(100);
        $img2->setImageIterations(0);
        
        $animeGif->addImage($img1);
        $animeGif->addImage($img2);
        
        $animeGifName = $outputPath . $outputImgName . '.gif';
        $animeGif->writeImages($animeGifName, true);
        
        $img1->clear();
        $img2->clear();
        $animeGif->clear();
    }
}
