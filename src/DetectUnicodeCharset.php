<?php


namespace Zyan\DetectUnicodeCharset;

/**
 * Class DetectUnicodeCharset.
 *
 * @package Zyan\DetectUnicodeCharset
 *
 * @author 读心印 <aa24615@qq.com>
 */
class DetectUnicodeCharset
{
    /**
     * @var string[]
     */
    protected $charset = [
        'Hiragana',
        'Thai',
        'Arabic',
        'Armenian',
        'Bengali',
        'Bopomofo',
        'Braille',
        'Buhid',
        'Canadian_Aboriginal',
        'Carian',
        'Cham',
        'Cherokee',
        'Common',
        'Coptic',
        'Cuneiform',
        'Cypriot',
        'Cyrillic',
        'Deseret',
        'Devanagari',
        'Egyptian_Hieroglyphs',
        'Ethiopic',
        'Georgian',
        'Glagolitic',
        'Gothic',
        'Greek',
        'Gujarati',
        'Gurmukhi',
        'Han',
        'Hangul',
        'Hanunoo',
        'Hebrew',
        'Imperial_Aramaic',
        'Inherited',
        'Inscriptional_Pahlavi',
        'Inscriptional_Parthian',
        'Javanese',
        'Kaithi',
        'Kannada',
        'Katakana',
        'Kayah_Li',
        'Kharoshthi',
        'Khmer',
        'Lao',
        'Latin',
        'Lepcha',
        'Limbu',
        'Linear_B',
        'Lisu',
        'Lycian',
        'Lydian',
        'Mahjong',
        'Malayalam',
        'Mandaic',
        'Meetei_Mayek',
        'Meroitic_Cursive',
        'Meroitic_Hieroglyphs',
        'Miao',
        'Mongolian',
        'Myanmar',
        'New_Tai_Lue',
        'Nko',
        'Ogham',
        'Ol_Chiki',
        'Old_Italic',
        'Old_Persian',
        'Old_South_Arabian',
        'Old_Turkic',
        'Oriya',
        'Osmanya',
        'Phags_Pa',
        'Phoenician',
        'Rejang',
        'Runic',
        'Samaritan',
        'Saurashtra',
        'Sharada',
        'Shavian',
        'Sinhala',
        'Sora_Sompeng',
        'Sundanese',
        'Syloti_Nagri',
        'Syriac',
        'Tagalog',
        'Tagbanwa',
        'Tai_Le',
        'Tai_Tham',
        'Tai_Viet',
        'Takri',
        'Tamil',
        'Telugu',
        'Thaana',
        'Tibetan',
        'Tifinagh',
        'Ugaritic',
        'Vai',
        'Yi'
    ];

    /**
     * addCharset.
     *
     * @param array $charset
     *
     * @return void
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function addCharset(array $charset)
    {
        $this->charset = array_unique(array_merge($this->charset, $charset));
    }

    /**
     * setCharset.
     *
     * @param array $charset
     *
     * @return void
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function setCharset(array $charset)
    {
        $this->charset = $charset;
    }

    /**
     * getCharset
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     * charset.
     *
     * @param string $str
     * @param array $charsets
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function charset(string $str,array $charsets = [])
    {
        $matches = [];
        if ($charsets) {
            foreach ($charsets as $charset) {
                if (preg_match("/\p{{$charset}}/u", $str)) {
                    $matches[] = $charset;
                }
            }
        } else {
            foreach ($this->getCharset() as $charset) {
                if (preg_match("/\p{{$charset}}/u", $str)) {
                    $matches[] = $charset;
                }
            }
        }

        return $matches;
    }

    /**
     * isCharset.
     *
     * @param string $str
     * @param string $charset
     *
     * @return bool
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function isCharset(string $str,string $charset)
    {
        return preg_match("/\p{{$charset}}/u", $str);
    }

}