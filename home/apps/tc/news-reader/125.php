<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Contrepoints - International",
  "media_url"       => "https://www.contrepoints.org/category/international",
  "media_encode"    => "false",
  "media_encoding"  => "",

  "module_body"     => "div[class*=Container]",
  "module_article"  => "article",
  "module_headline" => "a h2",

  "article_body"    => "div[class*=Container]",
  "article_title"   => "h1",
  "article_date"    => "time",
  "article_author"  => "span[property=author] a",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                  ],

  "clean_article_post"  => [
                    ["/<nav class=\"Menu\">(.*?)<\/nav>/s", ""],
                    ["/<nav class=\"Menu\">(.*?)<\/nav>/s", ""],
                    ["/<nav(.*?)nav>/s", ""],
                    ["/<form(.*?)form>/s", ""],
                    ["/<iframe(.*?)iframe>/s", ""],
                    ["/<header(.*?)header>/s", ""],
                    ["/<footer(.*?)footer>/s", ""],
                    ["/<figcaption(.*?)figcaption>/s", ""],
                    ["/<script(.*?)script>/s", ""],
                    ["/<style(.*?)style>/s", ""],
                    ["/<aside(.*?)aside>/s", ""],
                    ["/<section(.*?)section>/s", ""],
                    ["/<h1(.*?)h1>/s", ""],
                    ["/<div class=\"PostContent-header\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"PostContent-contentFooter\">(.*)$/s", ""],
                    ["/<a(.*?)>(.*?)<\/a>/s", "$2"],
                    ["/<i class=\"BigPicture-caption\">(.*?)<\/i>/s", ""],
                    ["/<div class=\"sd-content\">(.*?)<\/div>/s", ""],
                    ["/<li class=\"share(.*?)li>/s", ""],
                    ["/<h3 class=\"sd-title\">(.*?)<\/h3>/s", ""],
                    ["/<div class=\"robots(.?)<\/div>/s", ""],
                    ["/<div class=\"sharedaddy(.*?)<\/div>/s", ""],
                    ["/(\s+)class=\"PostLayout-bigPicture BigPicture js-bigPicture\"/s", ""],
                    ["/<div style=\"background-image: url\('(.*?)'\)\"><\/div>/s", "<img src=\"$1\">"],
                    ["/(alt|sizes|width|height|loading|style)=\"(.*?)\"/s", ""],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/<figure(.*?)>(.*?)<\/figure>/s", "$2"],
                    ["/(\s+)class=\"(.*?)\"(\s+)/s", " "],
                    ["/  \/>/s", ">"],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
