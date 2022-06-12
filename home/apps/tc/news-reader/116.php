<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Onet - Wiadomośći",
  "media_url"       => "https://wiadomosci.onet.pl/",
  "media_encode"    => "false",
  "media_encoding"  => "",

  "module_body"     => "section[class=stream]",
  "module_article"  => "a[id^=flat-natleft]",
  "module_headline" => "h3 span",

  "article_body"    => "article[class=articleDetail]",
  "article_title"   => "h1",
  "article_date"    => "span[class=datePublished]",
  "article_author"  => "",

  "clean_module"    =>  [
                    ["/<html(.*?)>/s", "<html>"],
                    ["/<head(.*?)head>/s", "<head></head>"],
                    ["/<header(.*?)header>/s", ""],
                    ["/<footer(.*?)footer>/s", ""],
                    ["/<nav(.*?)nav>/s", ""],
                    ["/<script(.*?)script>/s", ""],
                    ["/<noscript(.*?)noscript>/s", ""],
                    ["/<defs(.*?)defs>/s", ""],
                    ["/<svg(.*?)svg>/s", ""],
                    ["/<aside(.*?)aside>/s", ""],
                    ["/data-(.*?)=\"(.*?)\"/s", ""],
                    ["/<div class=\"timeBox\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"topWrapper\">(.*?)<\/div>/s", "$1"],
                    ["/<div class=\"imageWrapper\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"textWrapper\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"wrapperContent\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"itemTitle\">(.*?)<\/div>/s", "$1"],
                    ["/class=\"listItem listItemSolr itarticle timeLineLists\"/s", "class=\"article\""],
                  ],

  "clean_article_pre"   =>  [
                    ["/<script(.*?)script>/s", ""],
                  ],

  "clean_article_post"  => [
                    ["/^(.*?)<\/header> /s", ""],
                    ["/<div class=\"dateWrapper\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"textAds\">(.*?)<\/div>/s", ""],
                    ["/<div id=\"Teads\">(.*?)<\/div>/s", ""],
                    ["/<div id='video'>(.*?)<\/div>/s", ""],
                    ["/<div class=\"infor-ad\"(.*?)>(.*?)<\/div>/s", ""],
                    ["/<!-- detail -->(.*?)$/s", ""],
                    ["/<!--(.*?)-->/s", ""],
                    ["/<header(.*?)header>/s", ""],
                    ["/<figure class=\"articleReadMore\">(.*?)<\/figure>/s", ""],
                    ["/<figcaption(.*?)>(.*?)<\/figcaption>/s", "$2<br><br>"],
                    ["/<figure class=\"mainPhoto\">(.*?)<\/figure>/s", "$1"],
                    ["/<picture>(.*?)<\/picture>/s", "$1"],
                    ["/<source(.*?)>/s", ""],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
