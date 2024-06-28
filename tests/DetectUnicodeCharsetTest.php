<?php
/*
 * This file is part of the zyan/detect-unicode-charset
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Zyan\DetectUnicodeCharset\DetectUnicodeCharset;

/**
 * Class DetectUnicodeCharsetTest.
 *
 *
 * @author 读心印 <aa24615@qq.com>
 */
class DetectUnicodeCharsetTest extends PHPUnit\Framework\TestCase
{
    protected $detectUnicodeCharset;

    public function setUp(): void
    {
        $this->detectUnicodeCharset = new DetectUnicodeCharset();
    }


    public function test_charset()
    {
        $detectUnicodeCharset = new DetectUnicodeCharset();
        $res = $detectUnicodeCharset->charset('中文');
        $this->assertSame($res, ['Han']);

        $res = $detectUnicodeCharset->charset('こんにちは');
        $this->assertSame($res, ['Hiragana']);

        $res = $detectUnicodeCharset->charset('中文こんにちは');
        $this->assertEquals($res, ['Hiragana', 'Han']);
    }

    public function test_setCharset()
    {

        $this->detectUnicodeCharset->setCharset(['Hiragana']);
        $res = $this->detectUnicodeCharset->charset('こんにちは中文');
        $this->assertSame($res, ['Hiragana']);
    }


    public function testAddCharset()
    {
        $newCharset = ['Hiragana', 'Katakana'];
        $this->detectUnicodeCharset->addCharset($newCharset);

        $charset = $this->detectUnicodeCharset->getCharset();

        $this->assertContains('Hiragana', $charset);
        $this->assertContains('Katakana', $charset);
    }

    public function testSetCharset()
    {
        $newCharset = ['Hiragana', 'Katakana'];
        $this->detectUnicodeCharset->setCharset($newCharset);

        $charset = $this->detectUnicodeCharset->getCharset();

        $this->assertEquals($newCharset, $charset);
    }

    public function testCharset()
    {
        $str = 'こんにちは';
        $charsets = ['Hiragana', 'Katakana'];

        $result = $this->detectUnicodeCharset->charset($str, $charsets);
        ;
        $this->assertContains('Hiragana', $result);
    }

    public function testIsCharset()
    {
        $str = 'こんにちは';
        $charset = 'Hiragana';

        $result = $this->detectUnicodeCharset->isCharset($str, $charset);
        $this->assertTrue( (bool)$result);
    }
}
