<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Gazeta.pl - Technologie",
  "media_url"       => "https://next.gazeta.pl/next/0,150860.html#e=NavLink",
  "media_encode"    => "true",
  "media_encoding"  => "",
  "media_encoding"  => "ISO-8859-2",

  "module_body"     => "ul[class=list_tiles]",
  "module_article"  => "article",
  "module_headline" => "header h2 a",

  "article_body"    => "section[id=article_wrapper]",
  "article_title"   => "h1[id=article_title]",
  "article_date"    => "time",
  "article_author"  => "span[class=article_author]",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                    ["/<\/a>/s", ""],
                  ],

  "clean_article_post"  => [
                    ["/^(.*?)<div id=\"gazeta_article_lead\">/s", "<div>"],
                    ["/<script(.*?)script>/s", ""],
                    ["/<noscript(.*?)noscript>/s", ""],
                    ["/<!--(.*?)-->/s", ""],
                    ["/<svg(.*?)svg>/s", ""],
                    ["/<span class=\"related_open_label\">(.*?)<\/span>/s", ""],
                    ["/<span class=\"related_gazetaPL\">(.*?)<\/span>/s", ""],
                    ["/<div id='div(.*?)<\/div>/s", ""],
                    ["/<span class=\"banLabel(.*?)<\/span>/s", ""],
                    ["/<div id=\"adUnit(.*?)<\/div>/s", ""],
                    ["/<div class=\"ban(.*?)<\/div>/s", ""],
                    ["/<div id=\"ban(.*?)<\/div>/s", ""],
                    ["/<div class=\"related_image_number(.*?)<\/div>/s", ""],
                    ["/<div class=\"art_embed(.*?)<\/div>/s", ""],
                    ["/<div class=\"onnOnDemand(.*?)<\/div>/s", ""],
                    ["/<div class=\"related_image_open(.*?)<\/div>/s", ""],
                    ["/<div class=\"newsBox__tab(.*?)<\/div>/s", ""],
                    ["/<div class=\"newsBox__contentElement(.*?)<\/div>/s", ""],
                    ["/<div class=\"newsBox__content(.*?)<\/div>/s", ""],
                    ["/<div class=\"newsBox__header(.*?)<\/div>/s", ""],
                    ["/<div class=\"newsBox (.*?)<\/div>/s", ""],
                    ["/<section class=\"tags(.*?)<\/section>/s", ""],
                    ["/<p data-xx(.*?)<\/p>/s", ""],
                    ["/<i>Przeczytaj wi(.*?)<\/i>/s", ""],
                    ["/<p class=\"art_paragraph\">Pom&oacute;&#x17c;(.*?)<\/p>/s", ""],
                    ["/<b>Pom&oacute;&#x17c;(.*?)<\/b>/s", ""],
                    ["/<i>Pom&oacute;&#x17c;(.*?)<\/i>/s", ""],
                    ["/<i>Najnowsze informacje z Ukrainy(.*?)<\/i>/s", ""],
                    ["/<b>Wi&#x119;cej informacji(.*?)<\/b>/s", ""],
                    ["/class=\"(.*?)\"/s", ""],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                    ["/<\/a>/s", ""],
                    ["/<section(.*?)>/s", ""],
                    ["/<\/section>/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<br><br><a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
