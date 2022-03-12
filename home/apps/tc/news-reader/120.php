<?php
$config_array =
[
  "config_enabled"  => "false",
  "config_type"     => "link",

  "media_name"      => "Zonebourse - Devises & Forex",
  "media_url"       => "https://www.zonebourse.com/actualite-bourse/devises-eco/devises/",
  "media_encode"    => "true",

  "module_body"     => "tr[id=myCENTER]",
  "module_article"  => "td[class*=newsColCT]",
  "module_headline" => "a",

  "article_body"    => "div[data-io-article-url^=http]",
  "article_title"   => "div[data-io-article-url^=http] h1",
  "article_date"    => "datetime",
  "article_author"  => "",

  "clean_module"    =>  [
                    ["/Ђ/", "€"],
                  ],

  "clean_article_pre"   =>  [
                    ["/<meta itemprop=\"datePublished\"(.*?)>(.*?)<\/div>/s", "<datetime>$2</datetime></div>"],
                    ["/Й/s", "É"],
                    ["/й/s", "é"],
                    ["/В/s", "Â"],
                    ["/в/s", "â"],
                    ["/А/s", "À"],
                    ["/а/s", "à"],
                    ["/И/s", "È"],
                    ["/и/s", "è"],
                    ["/К/s", "Ê"],
                    ["/к/s", "ê"],
                    ["/Ф/s", "Ô"],
                    ["/ф/s", "ô"],
                    ["/Ы/s", "Û"],
                    ["/ы/s", "û"],
                  ],

  "clean_article_post"  => [
                    ["/\t/s", " "],
                    ["/^(.*?)<div id='grantexto'(.*?)>(.*?)<\/div>(.*)$/s", "$3"],
                    ["/<br\/><br\/><br\/>/s", "<br><br>"],
                    ["/<pre>(.*?)<\/pre>/s", ""],
                    ["/Й/s", "É"],
                    ["/й/s", "é"],
                    ["/В/s", "Â"],
                    ["/в/s", "â"],
                    ["/А/s", "À"],
                    ["/а/s", "à"],
                    ["/И/s", "È"],
                    ["/и/s", "è"],
                    ["/К/s", "Ê"],
                    ["/к/s", "ê"],
                    ["/Ф/s", "Ô"],
                    ["/ф/s", "ô"],
                    ["/Ы/s", "Û"],
                    ["/ы/s", "û"],
                  ],
];
?>
