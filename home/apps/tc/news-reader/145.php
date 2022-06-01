<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Valeurs Actuelles - Société",
  "media_url"       => "https://www.valeursactuelles.com/societe",
  "media_encode"    => "false",
  "media_encoding"  => "",

  "module_body"     => "body",
  "module_article"  => "article",
  "module_headline" => "h2 a",

  "article_body"    => "main",
  "article_title"   => "h1",
  "article_date"    => "time",
  "article_author"  => "author",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["/<div class=\"post__author\">(.*?)<a(.*?)>(.*?)<\/a>/s", "<author>Par $3</author>"],
                    ["/<span>Mis à jour(.*?)span>/s", ""],
                  ],

  "clean_article_post"  => [
                    ["/\t/s", " "],
                    ["/^(.*)<article class=\"post\">/s", ""],
                    ["/^(.*)<div class=\"post__excerpt gutenberg\">/s", ""],
                    ["/<div class=\"post__metas\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"post__sharing\">(.*?)<\/div>/s", ""],
                    ["/<time(.*?)time>/s", ""],
                    ["/<\/body>(.*)$/s", ""],
                    ["/<div class=\"qiota\">(.*)$/s", ""],
                    ["/<!--(.*?)-->/s", ""],
                    ["/<\/div>/s", ""],
                    ["/<div(.*?)>/s", ""],
                    ["/<small><i>(.*?)<\/i><\/small>/s", ""],
                    ["/<(\!DOCTYPE|\?xml|html|body)(.*?)>/s", ""],
                    ["/<h3(.*?)>A&nbsp;LIRE&nbsp;<\/h3>/s", ""],
                    ["/<span class=\"h3(.*?)span>/s", ""],
                    ["/<a(.*?)><\/a>/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<br><a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
