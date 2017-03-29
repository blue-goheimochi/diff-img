# ImgDiff

ImgDiff compares two images using Imagick.

[![Build Status](https://travis-ci.org/blue-goheimochi/diff-img.svg?branch=develop
)](https://travis-ci.org/blue-goheimochi/diff-img)

## Require

* ext-imagick

## Install

Please add to `composer.json` as below.  
Then run `composer install`.

    {
        "repositories": [
            {
                "type": "vcs",
                "url": "https://github.com/blue-goheimochi/ImgDiff"
            }
        ],
        "require": {
            "blue-goheimochi/ImgDiff": "dev-master"
        }
    }

## Useage

* Create a differential image of two images.
      $score = \DiffImg\Compare::create($imgPath1, $imgPath2, $outputPath);
  If `$ score = 0`, there is no difference between the two images.
  The larger the value of $score, the greater the difference. (MAX: 1000000)
  
* Create a Gif animation that switches two images one second at a time
      \DiffImg\Compare::createAnimeGif($imgPath1, $imgPath2, $outputPath);
