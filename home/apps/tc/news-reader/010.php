<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Dnes.bg - Днес",
  "media_url"       => "https://www.dnes.bg/news.php?today",
  "media_encode"    => "true",
  "media_encoding"  => "Windows-1251",

  "module_body"     => "div[id=c1]",
  "module_article"  => "div[class=b2]",
  "module_headline" => "div[class=ttl] a",

  "article_body"    => "div[id=art_text]",
  "article_title"   => "h1",
  "article_date"    => "div[class=article_date]",
  "article_author"  => "",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
#                    ["/<div class=\"art_author\">(.*?)<a(.*?)>(.*?)<img(.*?)>(.*?)<\/a>(.*?)<\/div>/s", "<div class='article_date'>$1</div><div class='article_author'>$3</div>"],
                    ["/<div class=\"art_author\">(.*?),(.*?)<a(.*?)<\/div>/s", "<div class='article_date'>$1</div>"],
                  ],

  "clean_article_post"  => [
                    ["/\t/s", "  "],
                    ["/(alt|title|width)=\"(.*?)\"/s", ""],
                    ["/<table(.*?)<img(.*?)>(.*?)<\/table>/s", "<img$2>"],
                    ["/<span style=\"color:(.*?)>(.*?)<\/span>/s", ""],
                    ["/<span class(.*?)span>/s", ""],
                    ["/<script(.*?)script>/s", ""],
                    ["/<div><\/div>/s", ""],
                    ["/<div>&nbsp;<\/div>/s", ""],
                    ["/<div class=\"cm\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"dt\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"inf\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"ttl\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"b5\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"t\">(.*?)<\/div>/s", ""],
                    ["/<div id='div-gpt(.*?)'>(.*?)<\/div>/s", ""],
                    ["/<b>Източник:(.*?)<\/b>/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
