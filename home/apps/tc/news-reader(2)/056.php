<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Тechnews.bg - Page 2",
  "media_url"       => "https://technews.bg/article-category/news/page/2",
  "media_encode"    => "false",

  "module_body"     => "div[id=content]",
  "module_article"  => "article",
  "module_headline" => "header h2 a",

  "article_body"    => "article",
  "article_title"   => "h1",
  "article_date"    => "span[class*=date time published]",
  "article_author"  => "",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                  ],

  "clean_article_post"  => [
                    ["/\t/s", "  "],
                    ["/<header(.*?)header>/s", ""],
                    ["/(alt|title|width|height|itemprop)=\"(.*?)\"/s", ""],
                    ["/class=\"size-full wp-image-(\d*?)\"/s", ""],
                    ["/<\!--(.*?)-->/s", ""],
                    ["/<div style=\"clear:both;\">(.*?)<\/div>/s", ""],
                    ["/<footer(.*?)>(.*?)<\/footer>/s", ""],
                    ["/<script(.*?)script>/s", ""],
                    ["/<aside id=\"custom_(.*)/s", ""],
                    ["/class=\"wp-caption-text\">/s", ""],
                    ["/srcset=\"(.*?)\"/s", ""],
                    ["/<div id=\"attachment_(.*?)\"(.*?)>(.*?)<\/div>/s", "$3"],
                    ["/<a(.*?)<img(.*?)>(.*?)<\/a>/s", "<img$2>"],
                    ["/<div id=\"related-posts-(.*?)\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"related-posts\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"entry-content\">/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
