<?php

namespace Tests;

class CreateAnimeGifTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateAnimeGif()
    {
        $img1 = dirname(__FILE__) . '/data/1.png';
        $img2 = dirname(__FILE__) . '/data/3.png';
        \DiffScreenshot\DiffScreenshot::createAnimeGif($img1, $img2);
        
        $this->assertTrue(file_exists(dirname(__FILE__) . '/../anime-diff.gif'));
    }
    
    public function testOutputCustomPath()
    {
        $img1 = dirname(__FILE__) . '/data/1.png';
        $img2 = dirname(__FILE__) . '/data/3.png';
        $outputPath = dirname(__FILE__) . '/logs/';
        \DiffScreenshot\DiffScreenshot::createAnimeGif($img1, $img2, $outputPath);
          
        $this->assertTrue(file_exists(dirname(__FILE__) . '/logs/anime-diff.gif'));
    }
    
    public function testOutputCustomFileName()
    {
        $img1 = dirname(__FILE__) . '/data/4.png';
        $img2 = dirname(__FILE__) . '/data/6.png';
        $outputPath = dirname(__FILE__) . '/logs/';
        $outputName = 'custom-anime-diff';
        \DiffScreenshot\DiffScreenshot::createAnimeGif($img1, $img2, $outputPath, $outputName);
          
        $this->assertTrue(file_exists(dirname(__FILE__) . '/logs/custom-anime-diff.gif'));
    }
}
