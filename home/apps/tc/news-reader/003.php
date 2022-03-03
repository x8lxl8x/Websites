<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "БTA - България",
  "media_url"       => "https://bta.bg/bg/news/bulgaria",
  "media_encode"    => "false",

  "module_body"     => "div[class=post-list row]",
  "module_article"  => "article",
  "module_headline" => "h3 a",

  "article_body"    => "div[class=post a11y-content]",
  "article_title"   => "h1",
  "article_date"    => "div[class=post__post]",
  "article_author"  => "div[class=post__author]",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["/<span class=\"visually-hidden\">(.*?)<\/span>/s", ""],
                  ],

  "clean_article_post"  => [
                    ["/<h1(.*?)<\/h1>/s", ""],
                    ["/<div class=\"share-widget(.*?)$/s", ""],
                    ["/<div class=\"post__meta-tags(.*?)<\/div>/s", ""],
                    ["/<div class=\"post__meta-panel(.*?)<\/div>/s", ""],
                    ["/<div class=\"post__sources(.*?)<\/div>/s", ""],
                    ["/<div class=\"post__post(.*?)<\/div>/s", ""],
                    ["/<div class=\"post__place(.*?)<\/div>/s", ""],
                    ["/<div class=\"post__author(.*?)<\/div>/s", ""],
                    ["/<div(.*?)>/s", ""],
                    ["/<\/div>/s", ""],
                    ["/<small class=\"text-muted(.*?)<\/small>/s", ""],
                    ["/data-src=/s", "src="],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
