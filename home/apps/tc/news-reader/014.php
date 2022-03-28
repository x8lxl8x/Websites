<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Moreto.net - Page 2",
  "media_url"       => "http://www.moreto.net/novini.php?p=1",
  "media_encode"    => "true",
  "media_encoding"  => "Windows-1251",

  "module_body"     => "table[id=module]",
  "module_article"  => "td[class=t2]",
  "module_headline" => "div[class=t3] b",

  "article_body"    => "table[id=article]",
  "article_title"   => "h1 b",
  "article_date"    => "div[style=float: left; width: 300px;] i",
  "article_author"  => "",

  "clean_module"    =>  [
                    ["/<table width=\"470\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">/s", "<table id=\"module\">"],
                    ["/href=\"\?n=/s", "href=\"/novini.php?n="],
                  ],

  "clean_article_pre"   =>  [
                    ["/<table width=100% border=0 cellspacing=0 cellpadding=0 align=center>/s", "<table id=\"article\">"],
                  ],

  "clean_article_post"  => [
                    ["/<\/pp>(.*)/s", "</pp>"],
                    ["/<span id=VoteAjax(N|Y)>(.*?)<\/span>/s", ""],
                    ["/(.*)<\/h1>/s", ""],
                    ["/<div class=\"fb-like\"(.*?)div>/s", ""],
                    ["/<a href=\"javascript(.*?)a>/s", ""],
                    ["/<div align=left>(.*?)div>/s", ""],
                    ["/<div style=\"height(.*?)div>/s", ""],
                    ["/<div style=\"float(.*?)div>/s", ""],
                    ["/<div class=t3(.*?)div>/s", ""],
                    ["/<div>(.*?)<\/div>/s", "$1"],
                    ["/<iframe(.*?)iframe>/s", ""],
                    ["/<pp>(.*?)<\/pp>/s", "$1"],
                    ["/<h2>(.*?)<\/h2>/s", "$1"],
                    ["/<i>(.*?)<\/i>/s", "$1"],
                    ["/<img(.*?)>(.*?)<\/div>/s", "<img$1>"],
                    ["/<p class=t3 align=justify>/s", ""],
                    ["/href=\"novini\.php(.*?)\"/s", "href=\"./news_reader.php?varFuncId=article&varConfId={$conf_id}&varName=&varUrl=http://www.moreto.net/novini.php$1\""],
                    ["/src=\"/s", "src=\"http://www.moreto.net/"],
                    ["/http:\/\/www\.moreto\.net\/http/s", "http"],
                    ["/<\/div>/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
