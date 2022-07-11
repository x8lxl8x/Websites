<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "20minutes.fr - Entertainment",
  "media_url"       => "https://www.20minutes.fr/arts-stars/",
  "media_encode"    => "false",
  "media_encoding"  => "",

  "module_body"     => "div[id=page-content]",
  "module_article"  => "article",
  "module_headline" => "h2",

  "article_body"    => "article",
  "article_title"   => "h1",
  "article_date"    => "time",
  "article_author"  => "span[class=author-name]",

  "clean_module"    =>  [
                    ["/<script(.*?)script>/s", ""],
                    ["/<svg(.*?)svg>/s", ""],
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                    ["/<svg(.*?)svg>/s", ""],
                  ],

  "clean_article_post"  => [
                    ["/<header(.*?)header>/s", ""],
                    ["/<script(.*?)script>/s", ""],
                    ["/<svg(.*?)svg>/s", ""],
                    ["/<nav(.*?)nav>/s", ""],
                    ["/<div class=\"sharebar\">(.*?)<\/div>/s", ""],
                    ["/(alt|title|width|height|itemprop)=\"(.*?)\"/s", ""],
                    ["/<figcaption(.*?)>(.*?)<\/figcaption>/s", "$2"],
                    ["/<figure(.*?)>(.*?)<\/figure>/s", "$2"],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                    ["/<em class=\"credit\">(.*?)<\/em>/s", ""],
                    ["/<ul class=\"tags(.*?)ul>/s", ""],
                    ["/<div class=\"block-footer\">(.*)$/s", ""],
                    ["/<div id=\"dfp_in_read\"(.*)$/s", ""],
                    ["/<div class=\"lt-endor-body content\">/s", ""],
                    ["/<div class=\"media-wrap\">/s", ""],
                    ["/<div class=\"teaser\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"box box-borderless color-entertainment mb1\">(.*?)<\/div>/s", ""],
                    ["/<strong>(.*?)<\/strong>/s", "$1"],
                    ["/<\/div>/s", ""],
                    ["/<div(.*?)>/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                    ["/310x190/s", "960x614"],
#                    ["/</s", "\n<"],
#                    ["/\n<\//s", "</"],
                  ],
];
?>
