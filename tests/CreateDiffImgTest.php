<?php

namespace Tests;

class CreateDiffImgTest extends \PHPUnit_Framework_TestCase
{
    public function testCompareSameImg()
    {
        $img1 = dirname(__FILE__) . '/data/1.png';
        $img2 = dirname(__FILE__) . '/data/2.png';
        $score = \DiffScreenshot\DiffScreenshot::compare($img1, $img2);
        
        $this->assertTrue(file_exists(dirname(__FILE__) . '/../diff.jpg'));
        $this->assertEquals(0, $score);
    }
    
    public function testOutputCustomPath()
    {
        $img1 = dirname(__FILE__) . '/data/4.png';
        $img2 = dirname(__FILE__) . '/data/5.png';
        $outputPath = dirname(__FILE__) . '/logs/';
        $score = \DiffScreenshot\DiffScreenshot::compare($img1, $img2, $outputPath);
          
        $this->assertTrue(file_exists(dirname(__FILE__) . '/logs/diff.jpg'));
        $this->assertEquals(0, $score);
    }
    
    public function testOutputCustomFileType()
    {
        $img1 = dirname(__FILE__) . '/data/1.png';
        $img2 = dirname(__FILE__) . '/data/2.png';
        $outputPath = './';
        $outputType = 'png';
        $score = \DiffScreenshot\DiffScreenshot::compare($img1, $img2, $outputPath, $outputType);
          
        $this->assertTrue(file_exists(dirname(__FILE__) . '/../diff.png'));
        $this->assertEquals(0, $score);
    }
    
    public function testOutputCustomFileName()
    {
        $img1 = dirname(__FILE__) . '/data/4.png';
        $img2 = dirname(__FILE__) . '/data/5.png';
        $outputPath = dirname(__FILE__) . '/logs/';
        $outputType = 'png';
        $outputName = 'custom-diff';
        $score = \DiffScreenshot\DiffScreenshot::compare($img1, $img2, $outputPath, $outputType, $outputName);
          
        $this->assertTrue(file_exists(dirname(__FILE__) . '/logs/custom-diff.png'));
        $this->assertEquals(0, $score);
    }
    
    public function testCompareOtherImg()
    {
        $img1 = dirname(__FILE__) . '/data/1.png';
        $img2 = dirname(__FILE__) . '/data/3.png';
        $outputPath = dirname(__FILE__) . '/logs/';
        $outputType = 'png';
        $outputName = 'other-diff';
        $score = \DiffScreenshot\DiffScreenshot::compare($img1, $img2, $outputPath, $outputType, $outputName);
          
        $this->assertTrue(file_exists(dirname(__FILE__) . '/logs/other-diff.png'));
        $this->assertEquals(647800, $score);
    }
    
    public function testCompareOtherImg2()
    {
        $img1 = dirname(__FILE__) . '/data/4.png';
        $img2 = dirname(__FILE__) . '/data/6.png';
        $outputPath = dirname(__FILE__) . '/logs/';
        $outputType = 'png';
        $outputName = 'other-diff2';
        $score = \DiffScreenshot\DiffScreenshot::compare($img1, $img2, $outputPath, $outputType, $outputName);
          
        $this->assertTrue(file_exists(dirname(__FILE__) . '/logs/other-diff2.png'));
        $this->assertEquals(551092, $score);
    }
}
