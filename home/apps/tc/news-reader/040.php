<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Lifestyle.bg - Звезди",
  "media_url"       => "https://lifestyle.bg/stars",
  "media_encode"    => "false",
  "media_encoding"  => "",

  "module_body"     => "div[class=inner-page]",
  "module_article"  => "div[class=topic]",
  "module_headline" => "div[class=topic-information] h2 a",

  "article_body"    => "article",
  "article_title"   => "h1",
  "article_date"    => "p[class=time]",
  "article_author"  => "",

  "clean_module"    =>  [
                    ["/<div class=\"main-news\">/s", "<div class=\"topic\">"],
                    ["/<div class=\"news-info\">(.*?)<h2>(.*?)<\/h2>(.*?)<\/div>/s", "<div class=\"topic-information\"><h2>$2</h2><\/div>"],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                  ],

  "clean_article_post"  => [
                    ["/(.*)\/header>/s", ""],
                    ["/<meta(.*?)>/s", ""],
                    ["/(alt|itemprop)=\"(.*?)\"/s", ""],
                    ["/class=\"(thumb|title)\"/s", ""],
                    ["/<div class=\"source-ribbon\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"btn\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"btn rate\"(.*?)>(.*?)<\/div>/s", ""],
                    ["/<strong>(.*?)<\/strong>/s", "$1"],
                    ["/<div id=\"gpt-banner-1-tablet\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"banner-1\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"banners tablet-banners\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"social-links\">(.*?)<\/div>/s", ""],
                    ["/<div id=\"gpt-banner-11\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"img\"(.*?)>(.*?)<\/div>/s", "$2"],
                    ["/<div class=\"img-wrapper\">(.*?)<\/div>/s", "$1"],
                    ["/<div class=\"img-or-video img-gallery\">(.*?)<\/div>/s", "$1"],
                    ["/<div class=\"small-ribbon\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"md-thumb\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"reference-article\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"editors-choice\"(.*)/s", ""],
                    ["/<ul class=\"tags\"(.*?)> (.*)/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
