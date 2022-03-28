<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Breitbart - Entertainment",
  "media_url"       => "https://www.breitbart.com/entertainment/",
  "media_encode"    => "false",

  "module_body"     => "section[class=aList]",
  "module_article"  => "article",
  "module_headline" => "h2 a",

  "article_body"    => "article",
  "article_title"   => "h1",
  "article_date"    => "time",
  "article_author"  => "div[class=header_byline] address a",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                  ],

  "clean_article_post"  => [
                    ["/<h1(.*?)h1>/s", ""],
                    ["/<aside(.*?)aside>/s", ""],
                    ["/<figcaption(.*?)figcaption>/s", ""],
                    ["/(alt|title|width|height|itemprop)=\"(.*?)\"/s", ""],
                    ["/<div class=\"header_byline\">(.*?)<\/div>/s", ""],
                    ["/<\!--(.*?)-->/s", ""],
                    ["/<header>(.*?)<\/header>/s", "$1"],
                    ["/<figure>(.*?)<\/figure>/s", "$1"],
                    ["/<footer(.*?)>(.*?)<\/footer>/s", ""],
                    ["/<div id=\"PollyC\"(.*?)><\/div>/s", ""],
                    ["/ class=\"subheading\"/s", ""],
                    ["/<figure(.*?)><\/figure>/s", ""],
                    ["/<div class=\"Attribution_container\">(.*)$/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
