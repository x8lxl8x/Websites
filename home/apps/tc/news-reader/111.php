<?php
$config_array =
[
  "config_enabled"  => "false",
  "config_type"     => "link",

  "media_name"      => "PAP Świat - Page 3",
  "media_url"       => "https://www.pap.pl/swiat?page=2",
  "media_encode"    => "false",
  "media_encoding"  => "",

  "module_body"     => "div[class=newsList]",
  "module_article"  => "span[class=header]",
  "module_headline" => "h2[class=title] a",

  "article_body"    => "body",
  "article_title"   => "h1[class=title]",
  "article_date"    => "span[class=actualDate]",
  "article_author"  => "",

  "clean_module"    =>  [
                    ["/<html(.*?)>/s", "<html>"],
                    ["/<head(.*?)head>/s", "<head></head>"],
                    ["/<header(.*?)header>/s", ""],
                    ["/<footer(.*?)footer>/s", ""],
                    ["/<nav(.*?)nav>/s", ""],
                    ["/<script(.*?)script>/s", ""],
                    ["/<svg(.*?)svg>/s", ""],
                    ["/<div class=\"textWrapper\">(.*?)<\/div>/s", "$1"],
                    ["/<div class=\"imageWrapper\">(.*?)<\/div>/s", ""],
                    ["/<li class=\"news col-sm-6\">(.*?)<\/li>/s", "<span class='header'>$1</span>"],
                    ["/<div class=\"m2\">(.*?)<\/div>/s", "<span class='header'>$1</span>"],
                    ["/<h1 class=\"title\">/s", "<h2 class=\"title\">"],
                  ],

  "clean_article_pre"   =>  [
                    ["/<span property=\"schema:name\">(.*?)<\/span>/s", "$1"],
                    ["/<script(.*?)script>/s", ""],
                    ["/<svg(.*?)svg>/s", ""],
                    ["/aktualizacja: /s", ""],
                  ],

  "clean_article_post"  => [
                    ["/^(.*?)<article(.*?)article>/s", ""],
                    ["/<ul class=\"social\">(.*?)<\/ul>/s", ""],
                    ["/<div class=\"description\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"header\">(.*?)$/s", ""],
                    ["/<div class=\"readMore\">(.*?)<\/div>/s", ""],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/<article(.*?)article>/s", ""],
                    ["/<article(.*?)>/s", ""],
                    ["/<section(.*?)section>/s", ""],
                    ["/<a id=\"main-content\">(.*?)<\/a>/s", ""],
                    ["/<a(.*?)>(.*?)<\/a>/s", ""],
                    ["/<\/a>/s", ""],
                    ["/<li>(\s*?)<\/li>/s", ""],
                    ["/<span property=\"schema:name\"(.*?)<\/span>/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
