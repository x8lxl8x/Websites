<?php
$config_array =
[
  "config_enabled"  => "false",
  "config_type"     => "link",

  "media_name"      => "Investing.com - Actualités",
  "media_url"       => "https://fr.investing.com/news/latest-news",
  "media_encode"    => "false",
  "media_encoding"  => "",

  "module_body"     => "div[class*=largeTitle]",
  "module_article"  => "article",
  "module_headline" => "div a",

  "article_body"    => "div[class*=articlePage]",
  "article_title"   => "h1",
  "article_date"    => "div[class=contentSectionDetails] span",
  "article_author"  => "div[class=contentSectionDetails] a",

  "clean_module"    =>  [
                    ["/<article class=\"js-article-item articleItem sponsoredArticle  \"  >/s", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["/<span class(.*?)span>/s", ""],
                    ["/<span id(.*?)span>/s", ""],
                    ["/<span style(.*?)span>/s", ""],
                  ],

  "clean_article_post"  => [
                    ["/<aside(.*?)aside>/s", ""],
                    ["/<video(.*?)video>/s", ""],
                    ["/<div class=\"align_center\">(.*?)<\/div>/s", "$1"],
                    ["/<div class=\"contentMediaBoxBottom(.*?)\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"contentMediaBox(.*?)\"(.*?)>(.*?)<\/div>/s", "$3"],
                    ["/<h(.*?)>(.*?)<\/h(.*?)>/s", "<em>$2</em>"],
                    ["/<p data-id=\"(.*?)\"(.*?)>(.*?)<\/p>/s", ""],
                    ["/ dir=\"ltr\"/s", ""],
                    ["/<a href=\"javascript(.*?)a>/s", ""],
                    ["/<div id=\"imgCarousel\"(.*?)>(.*?)<\/div>/s", "$2"],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
