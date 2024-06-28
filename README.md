

# zyan/detect-unicode-charset

判断字串中包含中文、日文、韩文、或泰文等各国语言文字的方法       

常见的 Unicode 属性名称：

- Greek：希腊字母字符
- Cyrillic：斯拉夫语系中的字符，包括俄文、白俄罗斯文、保加利亚文、塞尔维亚语等
- Arabic：阿拉伯字母字符
- Hebrew：希伯来字母字符
- Han：汉字字符
- Katakana：片假名字符
- Hiragana：平假名字符
- Thai：泰文字符
- Arabic：阿拉伯文字符
- Armenian：亚美尼亚文字符
- Bengali：孟加拉文字符
- Bopomofo：注音符号字符
- Braille：点字字符
- Buhid：布希德文字符
- Canadian_Aboriginal：加拿大原住民字符
- Carian：卡里亚文字符
- Cham：占族文字符
- Cherokee：切罗基文字符
- Common：普通字符（不带语言属性）
- Coptic：科普特文字符
- Cuneiform：楔形文字字符
- Cypriot：塞浦路斯文字符
- Cyrillic：西里尔文字符
- Deseret：德萨雷特字符
- Devanagari：天城文字符
- Egyptian_Hieroglyphs：埃及象形文字字符
- Ethiopic：衣索比亚文字符
- Georgian：乔治亚文字符
- Glagolitic：格拉哥里文字符
- Gothic：哥德文字符
- Greek：希腊文字符
- Gujarati：古吉拉特文字符
- Gurmukhi：古木基文字符
- Han：汉字字符
- Hangul：韩文字符
- Hanunoo：哈努诺文字符
- Hebrew：希伯来文字符
- Hiragana：平假名字符
- Imperial_Aramaic：帝国阿拉米文字符
- Inherited：继承字符
- Inscriptional_Pahlavi：碑铭巴列维文字符
- Inscriptional_Parthian：碑铭帕提亚文字符
- Javanese：爪哇文字符
- Kaithi：凯蒂文字符
- Kannada：卡纳达文字符
- Katakana：片假名字符
- Kayah_Li：克耶字母字符
- Kharoshthi：卡罗须提文字符
- Khmer：高棉文字符
- Lao：寮文字符
- Latin：拉丁文字符
- Lepcha：勒巴文字符
- Limbu：林布文字符
- Linear_B：线性 B 文字符
- Lisu：丽僳文字符
- Lycian：利基亚文字符
- Lydian：印欧语系古代语言
- Mahjong：麻将牌符号
- Malayalam：马来文字符
- Mandaic：曼代文字符
- Meetei_Mayek：米蒂-玛雅克文字符
- Meroitic_Cursive：体系玛若字母文字符
- Meroitic_Hieroglyphs：玛若象形文字字符
- Miao：苗文字符
- Mongolian：蒙古文字符
- Myanmar：缅甸文字符
- New_Tai_Lue：新傣文字符
- Nko：N'Ko 字母字符
- Ogham：奥格姆文字符
- Ol_Chiki：桑塔利文字符
- Old_Italic：古意大利文字符
- Old_Persian：古波斯文字符
- Old_South_Arabian：古南阿拉伯文字符
- Old_Turkic：古突厥文字符
- Oriya：奥里亚文字符
- Osmanya：奥斯曼亚文字符
- Phags_Pa：八思巴文字符
- Phoenician：腓尼基文字符
- Rejang：瑞让文字符
- Runic：古北欧文字符
- Samaritan：撒玛利亚文字符
- Saurashtra：索拉什特拉文字符
- Sharada：莎拉达文字符
- Shavian：萧伯纳文字符
- Sinhala：僧伽罗文字符
- Sora_Sompeng：索拉桑彭文字符
- Sundanese：巽他文字符
- Syloti_Nagri：锡尔赫特-那格里文字符
- Syriac：叙利亚文字符
- Tagalog：塔加路文字符
- Tagbanwa：塔格巴努亚文字符
- Tai_Le：傣仂文字符
- Tai_Tham：傣南文字符
- Tai_Viet：傣北文字符
- Takri：塔克里文字符
- Tamil：泰米尔文字符
- Telugu：泰卢固文字符
- Thaana：塔安那文字符
- Thai：泰文字符
- Tibetan：藏文字符
- Tifinagh：提非纳文字符
- Ugaritic：乌加里特文字符
- Vai：瓦伊文字符
- Yi：彝文字符

参考文档1：[https://www.mxp.tw/9765/](https://www.mxp.tw/9765/)      
参考文档2：[https://www.php.net/manual/zh/regexp.reference.unicode.php](https://www.php.net/manual/zh/regexp.reference.unicode.php)

这样,就可以轻松识别某个国家语言了

## 要求

1. php >= 7.3
2. Composer

## 安装

```shell
composer require zyan/detect-unicode-charset -vvv
```

## 用法

```php

use Zyan\DetectUnicodeCharset\DetectUnicodeCharset;

$detectUnicodeCharset = new DetectUnicodeCharset();


$res = $detectUnicodeCharset->charset('中文');
//return ['Han']

$res = $detectUnicodeCharset->charset('こんにちは');
//return ['Hiragana']

//命中多个时 返回多个
$res = $detectUnicodeCharset->charset('中文こんにちは');
//return ['Hiragana','Han'];

```

## 指定语言

```php

$detectUnicodeCharset = new DetectUnicodeCharset();

$detectUnicodeCharset->charset('测试こんにちは',['Han','Hiragana']);

```

## 新增或重置语言

```php

$detectUnicodeCharset = new DetectUnicodeCharset();

//在默认中追加
$detectUnicodeCharset->addCharset(['Han','Hiragana']);

//重置 默认配置将被复盖
$detectUnicodeCharset->setCharset(['Han','Hiragana']);

//test
$detectUnicodeCharset->charset('测试こんにちは',['Han','Hiragana']);

```

## 单个判断

```php

$detectUnicodeCharset = new DetectUnicodeCharset();


$detectUnicodeCharset->charset('这是中文吗?','Han');
// return true

$detectUnicodeCharset->charset('what is your name?','Han');
// return false

```


## 参与贡献

1. fork 当前库到你的名下
2. 在你的本地修改完成审阅过后提交到你的仓库
3. 提交 PR 并描述你的修改，等待合并

> github: https://github.com/aa24615/detect-unicode-charset

## License

[MIT license](https://opensource.org/licenses/MIT)
