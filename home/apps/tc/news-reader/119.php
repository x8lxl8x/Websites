<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Onet.pl - Opinie",
  "media_url"       => "https://wiadomosci.onet.pl/opinie",
  "media_encode"    => "false",
  "media_encoding"  => "",

  "module_body"     => "section[class^=stream]",
  "module_article"  => "div[class*=itarticle]",
  "module_headline" => "h3",

  "article_body"    => "article",
  "article_title"   => "h1",
  "article_date"    => "time[class=datePublished]",
  "article_author"  => "",

  "clean_module"    =>  [
                    ["/<span><a(.*?)>(.*?)<\/a><\/span>/s", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                  ],

  "clean_article_post"  => [
                    ["/^(.*?)<\/header>/s", ""],
                    ["/<!--(.*?)-->/s", ""],
                    ["/<script(.*?)>(.*?)<\/script>/s", ""],
                    ["/<noscript(.*?)>(.*?)<\/noscript>/s", ""],
                    ["/<svg(.*?)>(.*?)<\/svg>/s", ""],
                    ["/<div class=\"afterDetailModules\">(.*)$/s", ""],
                    ["/<figure(.*?)>(.*?)<\/figure>/s", "$2"],
                    ["/<picture>(.*?)<\/picture>/s", "$1"],
                    ["/<figcaption(.*?)>(.*?)<\/figcaption>/s", "$2<br><br>"],
                    ["/<meta(.*?)>/s", ""],
                    ["/<source(.*?)>/s", ""],
                    ["/<span class=\"copyright\">(.*?)<\/span>/s", ""],
                    ["/<aside(.*?)aside>/s", ""],
                    ["/<section(.*?)>/s", ""],
                    ["/<\/section>/s", ""],
                    ["/<div id=\"content-share-top\"(.*?)>(.*?)<\/div>/s", ""],
                    ["/\s+/s", " "],
                    ["/<div id=\"detail\"(.*?)>(.*?)<\/div>/s", ""],
                    ["/<ul data-scroll=\"bullet\">(.*?)<\/ul>/s", ""],
                    ["/<div class=\"pulsembed_embed\"(.*?)div>/s", ""],
                    ["/<div class=\"embeddedApp\"(.*?)div>/s", ""],
                    ["/<div class=\"pulsevideo\"(.*?)div>/s", ""],
                    ["/<div class='adPlaceholder(.*?)div>/s", ""],
                    ["/<strong>Dziękujemy, że jesteś z nami(.*?)<\/strong>/s", ""],
                    ["/<em>Dalsza część(.*?)<\/em>/s", ""],
                    ["/ (class|data-text-len|data-scroll|data-async-ad-slot)=\"(.*?)\"/s", ""],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<br><a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
