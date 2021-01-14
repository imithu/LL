# [LL - Language Localization](https://github.com/imithu/LL)

## Installation
via composer
``` sh
composer require imithu/ll
```



## Guide
create a config file in this location\
storage/app/LL/Self/config.json\
and set there the default language and rtl languages
``` json
    {
        "lang_default": "lang_name",
        "rtl": [ "lang_name", "lang_name" ]
    }
```

in page,
``` php
use LL\Lang;                    // load Lang class

Lang::$Path = 'value'; // set language json file location in full path
                                // eg. Storage::disk( value )->path( value ) ;

Lang::lang_set( 'lang_name' );  // set current language
Lang::lang_get();               // get current language


Lang::__( 'Word_key' );              // get translated word

Lang::rtl();   // return true if language direction is rtl else false

```


## Simple Example
page.php
``` php

use LL\Lang;



Lang::lang_set( 'bn' ); // tips: use this with javascript fetch or ajax once

Lang::$Path = Storage::disk('local')->path('folder/page.json');

/**
 *  here,
 *  page.json is the languages json file name
 *  you can create unlimited number of nested folder.
 *  fun fact: folder is optional. (:
 * 
 */
echo Lang::__( 'Home' ); // it will show বাড়ি

```

folder/page.json
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