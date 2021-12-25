<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "БTA - Page 1",
  "media_url"       => "http://www.bta.bg/bg/page/214/%D0%92%D0%BE%D0%B4%D0%B5%D1%89%D0%B8%D1%82%D0%B5%20%D0%BD%D0%BE%D0%B2%D0%B8%D0%BD%D0%B8",
  "media_encode"    => "false",

  "module_body"     => "div[class=top-stories]",
  "module_article"  => "li",
  "module_headline" => "h4 a",

  "article_body"    => "article",
  "article_title"   => "div[class=page-title] h1",
  "article_date"    => "time",
  "article_author"  => "",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                  ],

  "clean_article_post"  => [
                    ["/\t/s", ""],
                    ["/<script(.*?)script>/s", ""],
                    ["/<address(.*?)address>/s", ""],
                    ["/<g\:plus(.*?)g\:plus>/s", ""],
                    ["/<div class=\"share-btn\" style=\"(.*?)\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"fb-like\"(.*?)>(.*?)<\/div>/s", ""],
                    ["/<div class=\"share-btn\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"social\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"page-title\"> (.*?)<\/div>/s", ""],
                    ["/<div class=\"news-content\"> (.*?)<\/div>/s", "$1"],
                    ["/(alt|itemprop)=\"(.*?)\"/s", ""],
                    ["/<figcaption(.*?)figcaption>/s", ""],
                    ["/<figure(.*?)>(.*?)<\/figure>/s", "$2"],
                    ["/<a href=\"\/bg\/gallery\/image\/(\d*?)\">(.*?)<\/a>/s", "$2"],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
#                    ["/showImage\/\?image=/s", "image/"],
#                    ["/\&amp;size=620'/s", "'"],
                  ],
];
?>
