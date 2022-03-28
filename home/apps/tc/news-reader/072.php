<?php
$config_array =
[
  "config_enabled"  => "true",
  "config_type"     => "link",

  "media_name"      => "Investor.bg - Forex",
  "media_url"       => "https://www.investor.bg/news/news/last/8/",
  "media_encode"    => "false",
  "media_encoding"  => "",

  "module_body"     => "section[class=full]",
  "module_article"  => "li",
  "module_headline" => "h3 a",

  "article_body"    => "div[id=article_text]",
  "article_title"   => "div[class=article_title] h1",
  "article_date"    => "div[class=f_article_date]",
  "article_author"  => "",

  "clean_module"    =>  [
                    ["", ""],
                  ],

  "clean_article_pre"   =>  [
                    ["", ""],
                  ],

  "clean_article_post"  => [
                    ["/\t/s", "  "],
                    ["/(alt|title|width|height|itemprop)=\"(.*?)\"/s", ""],
                    ["/<table(.*?)<img(.*?)>(.*?)<\/table>/s", "<img$2>"],
                    ["/<script(.*?)script>/s", ""],
                    ["/<div class=\"ttl s2\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"b3\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"dots\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"pad2\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"c\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"h3\">(.*?)<\/div>/s", ""],
                    ["/<div class=\"article_related(.*?)\">(.*?)<\/div>/s", ""],
                    ["/<div id='div-gpt(.*?)'>(.*?)<\/div>/s", ""],
                    ["/<div class=\"pagination\">(.*?)<\/div>/s", "$1"],
                    ["/<div class=\"article_pagination\">(.*?)<\/div>/s", "$1"],
                    ["/href=\"\?page=/s", "href=\"./news_reader.php?varFuncId=article&varConfId={$conf_id}&varName={$media_name_encoded}&varUrl={$media_url_encoded}?page="],
                    ["/\/\?page/s", "?page"],
                    ["/\%3Fpage\%3D\d+/s", ""],
                    ["/<img(.*?)src=\"(.*?)\"(.*?)>/s", "<a target='_blank' href='$2'><img class='clImageThumb' src='$2'></a><br>"],
                  ],
];
?>
