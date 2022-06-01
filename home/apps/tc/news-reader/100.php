<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Mises Institute - Page 3",
  "media_url"       => "https://mises.org/wire?page=2",
  "media_encode"    => "false",
  "media_encoding"  => "",

  "module_body"     => "div[class=main-content]",
  "module_article"  => "div[class=article]",
  "module_headline" => "h3 a",

  "article_body"    => "div[class=main-content]",
  "article_title"   => "h2",
  "article_date"    => "span[class=date]",
  "article_author"  => "span[class=author] a",

  "clean_module"    =>  [
                    ["/class=\"views-row(.*?)\"/s", "class='article'"],
                    ["/<h2 class=\"teaser-title\"><a href=\"(.*?)\">(.*?)<\/a><\/h2>/s", "<h3><z href='$1'>$2</z></h3>"],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                    ["/<z/s", "<a"],
                    ["/z>/s", "a>"],
                  ],

  "clean_article_pre"   =>  [
                    ["/<h2 class=\"block-title\">Stay Connected<\/h2>/s", ""],
                  ],

  "clean_article_post"  => [
                    ["/^(.*)<div class=\"body-content(.*?)>/s", ""],
                    ["/<h2 class=\"element-invisible\">(.*?)<\/h2>/s", ""],
                    ["/<div class=\"view-header\">(.*)$/s", ""],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/src=\"data(.*?)\"/s", ""],
                    ["/data-src=\"/s", "src=\""],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<br><a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
