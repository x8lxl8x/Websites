<?php
$config_array =
[
  "config_enabled"  => "false",
  "config_type"     => "link",

  "media_name"      => "Contrepoints - Société",
  "media_url"       => "https://www.contrepoints.org/category/societe-2",
  "media_encode"    => "false",
  "media_encoding"  => "",

  "module_body"     => "div[class*=article_ctn]",
  "module_article"  => "div[class=cp_mp_ctn]",
  "module_headline" => "div[class=cp_mp_info_ctn] h3 a",

  "article_body"    => "article",
  "article_title"   => "h1",
  "article_date"    => "div[class=cp_small_date]",
  "article_author"  => "div[class=author]",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["/Publié le /s", ""],
                    ["/header>(.*?)<div class=\"author\">(.*?)<\/div>/s", "header><div class=\"author\">$2</div>$1"],
                    ["/<div class=\"author\">(.*?)<span>(.*?)<\/span>(.*?)<\/div>/s", "<div class=\"author\">$2</div>"],
                    ["/<div class=\"author\">(.*?)<a(.*?)>(.*?)<\/a(.*?)<\/div>/s", "<div class=\"author\">$3</div>"],
                  ],

  "clean_article_post"  => [
                    ["/^(.*?)header>/s", ""],
                    ["/<div class=\"author\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"cp_opinion_info\">(.*?)<\/div>/s", ""],
                    ["/<footer(.*?)$/s", ""],
                    ["/<span class=\"cesis(.*?)span>/s", ""],
                    ["/<span class=\"cp_(.*?)span>/s", ""],
                    ["/<div class=\"cp_small_date\">(.*?)<\/div>/s", ""],
                    ["/<p>&nbsp;(\s*?)<\/p>/s", ""],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/<i class=\"cp_print fa-print\">(.*?)<\/i>/s", ""],
                    ["/<!--(.*?)-->/s", ""],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                  ],
];
?>
