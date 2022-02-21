<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Les moutons enragés - Page 3",
  "media_url"       => "https://lesmoutonsenrages.fr/page/3/",
  "media_encode"    => "false",

  "module_body"     => "section[role=main]",
  "module_article"  => "article",
  "module_headline" => "h2 a",

  "article_body"    => "article",
  "article_title"   => "h1",
  "article_date"    => "span[class=meta-date] a time",
  "article_author"  => "span[class=meta-author] span[class=author vcard] a",

  "clean_module"    =>  [
                    ["/tag-les-nouvelles-du-jour\">(.*?)<h2(.*?)h2>/s", "tag-les-nouvelles-du-jour\">"],
                    ["/tag-les-news-du-jour\">(.*?)<h2(.*?)h2>/s", "tag-les-nouvelles-du-jour\">"],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                  ],

  "clean_article_post"  => [
                    ["/\t/s", "  "],
                    ["/&lt;iframe(.*?)iframe&gt;/s", ""],
                    ["/<div class=\"sharedaddy(.*)$/s", ""],
                    ["/<h1(.*?)h1>/s", ""],
                    ["/<div class=\"entry-meta(.*?)div>/s", ""],
                    ["/<script(.*?)script>/s", ""],
                    ["/<noscript(.*?)noscript>/s", ""],
                    ["/<span(.*?)span>/s", ""],
                    ["/(alt|title|width|height|itemprop|class|loading|data-lazy-type)=\"(.*?)\"/s", ""],
                    ["/ src=\"(.*?)\"/s", ""],
                    ["/data-lazy-src=\"(.*?)\"/s", "src=\"$1\""],
                    ["/<figcaption>(.*?)<\/figcaption>/s", "$1"],
                    ["/<figure(.*?)>(.*?)<\/figure>/s", "$2"],
                    ["/</s", "\n<"],
                    ["/\n<\//s", "</"],
                    ["/<b>(.*?)<\/b>/s", "$1"],
                    ["/<strong>(.*?)<\/strong>/s", "$1"],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
