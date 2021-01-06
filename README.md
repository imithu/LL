# LL - Language Localization

## Installation
via composer
``` sh
composer require imithu/ll
```



## Guide
``` php
use LL\Lang;                    // load Lang class

Lang::$Path = 'value'; // set language location in full path
                                // eg.  __DIR__.'/folderName/';

Lang::lang_set( 'lang_name' );  // set current language
Lang::lang_get();               // get current language

Lang::lang_default_set( 'default_lang_name' );  // (optional) set default language
Lang::lang_default_get();                       // (optional) get default language

Lang::__( 'folder/file', 'word' );              // get translated word

```


## Simple Example
page.php
``` php

use LL\Lang;



Lang::lang_set( 'bn' ); // tips: use this with javascript fetch or ajax once

Lang::$Path = __DIR__.'/folderName/';

/**
 *  here,
 *  'Header' is the folder name
 *  'Menu' is the json file name
 *  and 'Home' is the word name
 * 
 * you can create unlimited number of nested folder.
 * fun fact: folder is optional. (:
 * 
 * 
 */
echo Lang::__( 'Header/Menu','Home' ); // it will show বাড়ি

```

Header/Menu.json
``` json
{
    "ar":
    {
        "Home"         : "الصفحة الرئيسية",
        "Contact Us"   : "اتصل بنا",
        "About Us"     : "معلومات عنا",
        "Login"        : "تسجيل الدخول",
        "Registration" : "التسجيل"
    },
    "bn":
    {
        "Home"         : "বাড়ি",
        "Contact Us"   : "যোগাযোগ করুন",
        "About Us"     : "আমাদের সম্পর্কে",
        "Login"        : "প্রবেশ করুন",
        "Registration" : "নিবন্ধন"
    },
    "en":
    {
        "Home"         : "Home",
        "Contact Us"   : "Contact Us",
        "About Us"     : "About Us",
        "Login"        : "Login",
        "Registration" : "Registration"
    },
    "ko":
    {
        "Home"         : "집",
        "Contact Us"   : "문의하기",
        "About Us"     : "회사 소개",
        "Login"        : "로그인",
        "Registration" : "기재"
    },
    "ur":
    {
        "Home"         : "گھر",
        "Contact Us"   : "ہم سے رابطہ کریں",
        "About Us"     : "ہمارے بارے میں",
        "Login"        : "لاگ ان کریں",
        "Registration" : "اندراج"
    }

}
```


## Tips
Follow this language chart
### [List of ISO 639-1 codes](https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes)
**Fun Fact:** it is totally optional. you can use any name for any language.



## Thank you very much.