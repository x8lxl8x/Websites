<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Infostock - България",
  "media_encode"    => "true",
  "media_url"       => "http://www.infostock.bg/infostock/control/bg",

  "module_body"     => "div[class=news-list]",
  "module_article"  => "article",
  "module_headline" => "a",

  "article_body"    => "div[class*=msgbody]",
  "article_title"   => "h2",
  "article_date"    => "span[class*=news_date]",
  "article_author"  => "",

  "clean_module"    =>  [
                    ["/^(.*?)<div class=\"news-list\">/s", "<html><head></head><body><div class=\"news-list\">"],
                    ["/<c\:choose>(.*?)<\/c\:choose>(.*?)$/s", "</div></body></html>"],
                    ["/<div>(.*?)<\/div>/s", "<article>$1</article>"],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                  ],

  "clean_article_post"  => [
                    ["/<p class=\"snimka_comment\">(.*?)<\/p>/s", ""],
                    ["/<script(.*?)script>/s", ""],
                    ["/<div style=\"(.*?)\"(.*?)>(.*?)<\/div>/s", "$3"],
                    ["/<div id=\"httpool_contextualads\"(.*?)>(.*?)<\/div>/s", "$2"],
                    ["/(alt|typeof|height|width)=\"(.*?)\"/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
