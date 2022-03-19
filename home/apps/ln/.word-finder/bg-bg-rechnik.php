<?php
$config_array =
[
  "media_name"      => "Речник Бг-Бг",
  "media_url"       => "https://rechnik.chitanka.info",
  "media_post"      =>  null,
  "media_word"      => ["/^(.*?)$/s", "$1/w/$word_encoded"],
  "media_encode"    => "false",

  "article_body"    => "div[id=content]",

  "clean_article"  => [
                    ["/\(<span title=\"Разширена класификация на БГ Офис\"><a href=\"(.*?)\">(.*?)<\/a><\/span>\)/s", "<z href='https://rechnik.chitanka.info$1'>$2</z>"],
                    ["/<a href=\"\/faq\/edit\/rights\" class=\"edit-fake\">(.*?)<\/a>/s", ""],
                    ["/<div class=\"links box\"(.*?)<\/div>/s", ""],
                    ["/<a(.*?)>/s", "$2"],
                    ["/<\/a>/s", ""],
                    ["/<z/s", "<a"],
                    ["/<\/z>/s", "</a>"],
                    ["/<p>С дефиси \(къси тирета\)(.*?)p>/s", ""],
                    ["/<table(.*?)table>/s", "<div class='clOverflow'><table$1table></div>"],
                    ["/<th(.*?)>единствено число<\/th>/s", "<th$1>ед.ч.</th>"],
                    ["/<th(.*?)>множествено число<\/th>/s", "<th$1>мн.ч.</th>"],
                    ["/<th(.*?)>мъжки род<\/th>/s", "<th$1>м.р.</th>"],
                    ["/<th(.*?)>женски род<\/th>/s", "<th$1>ж.р.</th>"],
                    ["/<th(.*?)>среден род<\/th>/s", "<th$1>с.р.</th>"],
                    ["/<th(.*?)>1 лице<\/th>/s", "<th$1>1 л.</th>"],
                    ["/<th(.*?)>2 лице<\/th>/s", "<th$1>2 л.</th>"],
                    ["/<th(.*?)>3 лице<\/th>/s", "<th$1>3 л.</th>"],
                    ["/<th(.*?)>членувано<\/th>/s", "<th$1>чл.</th>"],
                    ["/<th(.*?)>непълен член<\/th>/s", "<th$1>чл.н.</th>"],
                    ["/<th(.*?)>пълен член<\/th>/s", "<th$1>чл.п.</th>"],
                    ["/<th(.*?)>звателна форма<\/th>/s", "<th$1>зв.ф.</th>"],
                    ["/<td>(.*?)<ul>(.*?)<\/td>/s", "<td>$1$2</td>"],
                    ["/<td>(.*?)<\/ul>(.*?)<\/td>/s", "<td>$1$2</td>"],
                    ["/<td>(.*?)<\/li><li>(.*?)<\/td>/s", "<td>$1<br>$2</td>"],
                    ["/<td>(.*?)<\/li>(.*?)<\/td>/s", "<td>$1$2</td>"],
                    ["/<td>(.*?)<li>(.*?)<\/td>/s", "<td>$1$2</td>"],
                  ],
];
?>
