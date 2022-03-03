<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Webcafé - Tech",
  "media_url"       => "https://webcafe.bg/techcafe",
  "media_encode"    => "false",

  "module_body"     => "div[class=skeleton-left]",
  "module_article"  => "div[class=article]",
  "module_headline" => "h2 a",

  "article_body"    => "div[class=global-inside-article]",
  "article_title"   => "h1",
  "article_date"    => "time",
  "article_author"  => "",

  "clean_module"    =>  [
                    ["/<source(.*?)>/s", ""],
                    ["/<picture>(.*?)<\/picture>/s", ""],
                    ["/<h1>(.*?)><\/h1>/s", "<h2>$1</h2>"],
                    ["/class=\"global-leading-article-left\"/s", "class=\"article\""],
                    ["/<div class=\"image\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"category\">(.*?)<\/div>/s", ""],
                    ["/\"article(.*?)\"/s", "\"article\""],
                    ["/<script(.*?)script>/s", ""],
                    ["/<a(.*?)a>/s", "<h2><a$1a></h2>"],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                  ],

  "clean_article_post"  => [
                    ["/^(.*?)time>/s", ""],
                    ["/<source(.*?)>/s", ""],
                    ["/^(.*?)<\/span>/s", ""],
                    ["/^(.*?)<\/div>/s", ""],
                    ["/^(.*?)<\/div>/s", ""],
                    ["/<meta(.*?)>/s", ""],
                    ["/<script(.*?)script>/s", ""],
                    ["/<div class=\"global-(.*)$/s", ""],
                    ["/<div id=\"gpt-banner-incontent\" >(.*?)<\/div>/s", ""],
                    ["/(alt|title|width|height|itemprop|itemscope|itemtype)=\"(.*?)\"/s", ""],
                    ["/<picture>(.*?)<\/picture>/s", "$1"],
                    ["/<div class=\"image\">(.*?)<\/div>/s", "$1"],
                    ["/<div class=\"photo\"   >(.*?)<\/div>/s", "$1"],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/(alt|title|width|height|itemprop)=\"(.*?)\"/s", ""],
                    ["/class=\"(.*?)\"/s", ""],
                    ["/<video(.*?)video>/s", ""],
                    ["/<a(.*?)>(.*?)<img(.*?)>(.*?)<\/a>/s", "<img$3>"],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<br><a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                    ["/^(\s*?)<br>/s", ""],
                  ],
];
?>
