# DiffScreenshot

DiffScreenshot compares two screenshot images.

[![Build Status](https://travis-ci.org/blue-goheimochi/diff-img.svg?branch=develop
)](https://travis-ci.org/blue-goheimochi/diff-img)
[![Coverage Status](https://coveralls.io/repos/github/blue-goheimochi/diff-img/badge.svg?branch=develop)](https://coveralls.io/github/blue-goheimochi/diff-img?branch=develop)
[![StyleCI](https://styleci.io/repos/80089703/shield?branch=develop)](https://styleci.io/repos/80089703)

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

* Score the difference between the two screenshots.
    ```
    $score = \DiffScreenshot\DiffScreenshot::compare($imgPath1, $imgPath2);
    ```
  If `$score = 0`, there is no difference between the two images.  
  The larger the value of $score, the greater the difference. (MAX: 1000000)
  
* Create a Gif animation that switches two screenshots one second at a time
    ```
    \DiffScreenshot\DiffScreenshot::createAnimeGif($imgPath1, $imgPath2, $outputPath);
    ```
