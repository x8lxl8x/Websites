<?php
$config_array =
[
  "config_enabled"  => "false",
  "config_type"     => "link",

  "media_name"      => "Business Insider",
  "media_url"       => "https://www.businessinsider.fr/  https://www.capital.fr/",
  "media_encode"    => "false",

  "module_body"     => "main",
  "module_article"  => "article",
  "module_headline" => "a[class=bi-title-link]",

  "article_body"    => "article",
  "article_title"   => "h1",
  "article_date"    => "time",
  "article_author"  => "span[class=page-article-author] a",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                  ],

  "clean_article_post"  => [
                    ["/<h1(.*?)h1>/s", ""],
                    ["/<button(.*?)button>/s", ""],
                    ["/<template(.*?)template>/s", ""],
                    ["/<svg(.*?)svg>/s", ""],
                    ["/<div class=\"ads-core-placer\"(.*?)>(.*?)<\/div>/s", ""],
                    ["/<div class=\"page-article-share\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"page-article-meta\">(.*?)<\/div>/s", ""],
                    ["/<span class=\"page-article-media-copyright\">(.*?)<\/span>/s", ""],
                    ["/<span class=\"page-article-media-legend\">(.*?)<\/span>/s", "<p><i>$1</i></p>"],
                    ["/<span class=\"credit\">(.*?)<\/span>/s", ""],
                    ["/<source(.*?)>/s", ""],
                    ["/<picture(.*?)>(.*?)<\/picture>/s", "$2"],
                    ["/<figcaption(.*?)>(.*?)<\/figcaption>/s", "$2"],
                    ["/<figure(.*?)>(.*?)<\/figure>/s", "$2"],
                    ["/<div(\s+)class=\"logora_synthese\"(.*?)>(.*?)<\/div>/s", ""],
                    ["/<div(\s+)data-pmc-insert(.*?)>(.*?)<\/div>/s", ""],
                    ["/<div class=\"tagList\">(.*?)<\/div>/s", ""],
                    ["/<em>&Agrave; lire aussi(.*?)<\/em>/s", ""],
                    ["/<strong>&Agrave; lire aussi(.*?)<\/strong>/s", ""],
                    ["/<p>Version originale(.*?)<\/p>/s", ""],
                    ["/<header(.*?)>(.*?)<\/header>/s", "$2"],
                    ["/<iframe(.*?)iframe>/s", ""],
                    ["/<script(.*?)script>/s", ""],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                    ["/<h2(.*?)>(.*?)<\/h2>/s", "<p><b>$2</b></p>"],
                    ["/<em><strong>(.*?)<\/strong><\/em>/s", ""],
                    ["/<strong><em>(.*?)<\/em><\/strong>/s", ""],
                    ["/<video(.*?)>(.*?)<\/video>/s", ""],
                    ["/<\/cite>/s", "</cite><br>"],
                    ["/<ul class=\"bookmark-tag\">(.*?)<\/ul>/s", ""],
                    ["/<strong>(.*?)<\/strong>/s", "$1"],
                    ["/<b>(.*?)<\/b>/s", "$1"],
                  ],
];
?>
