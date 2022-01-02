<?php
$config_array =
[
  "config_enabled"  => "false",
  "config_type"     => "link",

  "media_name"      => "Boursorama - Actualité",
  "media_url"       => "https://www.boursorama.com/actualite-economique/",
  "media_encode"    => "false",

  "module_body"     => "div[class=c-list-details-news]",
  "module_article"  => "li[class*=c-list-details-news__line]",
  "module_headline" => "a[class*=c-list-details-news__subject]",

  "article_body"    => "div[class*=c-news-detail]",
  "article_title"   => "h1",
  "article_date"    => "span[class*=c-source__time]",
  "article_author"  => "strong[class*=c-source__name]",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["/<h1(.*?)>(.*?)<div(.*?)>(.*?)<\/div>/s", "<h1>$2</h1><div$3>$4</div>"],
                  ],

  "clean_article_post"  => [
                    ["/(.*?)h1>/s", ""],
                    ["/<ul class=\"c-toolbar-sharing__list(.*?)<\/ul>/s", ""],
                    ["/<div class=\"o-vertical-interval-bottom\"><\/div>/s", ""],
                    ["/<picture(.*?)>(.*?)<\/picture>/s", "$2"],
                    ["/<div class=\"c-image-news\">(.*?)<\/div>/s", "$1"],
                    ["/<source(.*?)>/s", ""],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='./image-server.php?varImageUrl=$2'><img class='clImageThumb' src='./image-server.php?varImageUrl=$2'></a><br>"],
                    ["/<h2(.*?)>(.*?)<\/h2>/s", "<p><b>$2</b></p>"],
                    ["/<p class=\"c-image-news__legend\">(.*?)<\/p>/s", "<p><i>$1</i></p>"],
                  ],
];
?>
