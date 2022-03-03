<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Mediapool.bg",
  "media_url"       => "https://www.mediapool.bg/",
  "media_encode"    => "false",

  "module_body"     => "main[class=main_left]",
  "module_article"  => "article",
  "module_headline" => "h3 a",

  "article_body"    => "article",
  "article_title"   => "h1",
  "article_date"    => "time",
  "article_author"  => "",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                  ],

  "clean_article_post"  => [
                    ["/<button(.*?)button>/s", ""],
                    ["/<footer(.*?)footer>/s", ""],
                    ["/<script(.*?)script>/s", ""],
                    ["/<iframe(.*?)iframe>/s", ""],
                    ["/aria-label=\"(.*?)\"/s", ""],
                    ["/<div(.*?)itemprop=\"articleBody\">(.*?)<\/div>/s", "$2"],
                    ["/<div class=\"banner_mobile\"(.*)/s", ""],
                    ["/<div class=\"title_social_links\">(.*?)<\/div>/s", ""],
                    ["/(.*)\/header>/s", ""],
                    ["/<figure(.*?)>(.*?)<\/figure>/s", "$2"],
                    ["/<samp(.*?)>(.*?)<\/samp>/s", ""],
                    ["/(alt|itemprop|style)=\"(.*?)\"/s", ""],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
