<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "American Institute for Economic Research",
  "media_url"       => "https://www.aier.org/articles/",
  "media_encode"    => "false",

  "module_body"     => "div[class=page-content]",
  "module_article"  => "div[class=col-md-4]",
  "module_headline" => "h2 a",

  "article_body"    => "div[class=col-md-8]",
  "article_title"   => "h1",
  "article_date"    => "span[class=article-date]",
  "article_author"  => "",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                  ],

  "clean_article_post"  => [
                    ["/\t/s", "  "],
                    ["/<div class=\"author_date\"(.*?)&#8211;/s", ""],
                    ["/^(.*?)<span class=\"rt-time\">(.*?)<\/span>/s", ""],
                    ["/^(.*?)<div class=\"breadcrumb\">/s", "<div class=\"breadcrumb\">"],
                    ["/<div class=\"col-md-12\">(.*?)<\/div>/s", "$1"],
                    ["/ (data-pagination|data-permalink|data-viewnumber)=\"(.*?)\"/s", ""],
                    ["/<span class=\"rt-time\">(.*?)<\/span>/s", ""],
                    ["/<span class=\"rt-label rt-prefix\">(.*?)<\/span>/s", ""],
                    ["/<span class=\"rt-label rt-postfix\">(.*?)<\/span>/s", ""],
                    ["/<span class=\"span-reading-time rt-reading-time\">(.*?)<\/span>/s", ""],
                    ["/<span class=\"reading-time\">(.*?)<\/span>/s", ""],
                    ["/<ol itemscope(.*?)<\/ol>/s", ""],
                    ["/<div class=\"printfriendly(.*?)div>/s", ""],
                    ["/<img class=\"attachment(.*?)>/s", ""],
                    ["/<noscript(.*?)noscript>/s", ""],
                    ["/<div class=\"a2a_kit(.*?)div>/s", ""],
                    ["/<div class=\"addtoany_shortcode\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"addtoany_aier\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"author-box\"(.*)$/s", ""],
                    ["/<div class=\"centered\">(.*?)<\/div>/s", ""],
                    ["/<figure(.*?)>(.*?)<\/figure>/s", "$2"],
                    ["/<div class=\"breadcrumb\">(.*?)<\/div>/s", "<br>"],
                    ["/ (loading|width|height|class|alt|src|data-lazy-srcset|data-lazy-sizes)=\"(.*?)\"/s", ""],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                    ["/data-lazy-src=/s", "src="],
                    ["/<ol(.*?)>/s", "<ul>"],
                    ["/<\/ol>/s", "</ul>"],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                    ["/<br>(\s*?)<a target='_blank'/s", "<a target='_blank'"],
                  ],
];
?>
