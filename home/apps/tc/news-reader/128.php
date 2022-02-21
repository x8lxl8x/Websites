<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Dreuz.info - International",
  "media_url"       => "https://www.dreuz.info/category/international/",
  "media_encode"    => "false",

  "module_body"     => "div[class=post_area]",
  "module_article"  => "div[class=post]",
  "module_headline" => "h2 a",

  "article_body"    => "div[class=main]",
  "article_title"   => "div[class=singlepage-title] a",
  "article_date"    => "div[class=author]",
  "article_author"  => "div[class=date]",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["/<div class=\"author\">(.*?)<a(.*?)>(.*?)<\/a>(.*?)<\/div>/s", "<div class=\"author\">$3</div><div class=\"date\">$4</div>"],
                  ],

  "clean_article_post"  => [
                    ["/<div class=\"wp-block-image\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"wp-block-media-text__content\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"wp-block-media-text(.*?)>(.*?)<\/div>/s", ""],
                    ["/<aside(.*?)>(.*?)<\/aside>/s", ""],
                    ["/<div class=\"mailpoet_form_popup_overlay\">(.*)$/s", ""],
                    ["/^(.*?)<div class=\"content-single\">/s", "<div class=\"content-single\">"],
                    ["/<div class=\"tags\">(.*)$/s", ""],
                    ["/<em>Parce que Dreuz est(.*?)<\/em>/s", ""],
                    ["/<p class=\"has-vivid-red-color has-text-color has-medium-font-size\">(.*?)<\/p>/s", ""],
                    ["/<span class=\"has-inline-color has-vivid-red-color\">(.*?)<\/span>/s", ""],
                    ["/<h(2|3) class=\"has-text-align-left\">(.*?)<\/h(2|3)>/s", "$2"],
                    ["/<strong>(.*?)<\/strong>/s", "$1"],
                    ["/<figure(.*?)>(.*?)<\/figure>/s", "$2"],
                    ["/ (loading|width|height|alt|srcset|sizes|class)=\"(.*?)\"/s", ""],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/<!-- Composite Start -->(.*?)<!-- Composite End -->/s", ""],
                  ],
];
?>
