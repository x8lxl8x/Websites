<?php
#------------------------------------------------------------------------------------------------------------

include("./global_objects.php");
include("./simple_html_dom.php");

#------------------------------------------------------------------------------------------------------------

$page_title     = "Events Calendar";
$apps_area      = "fn";
#$time_zone      = 3;
$time_zone      = 2;

#---------------------------------------------------------------------------------------------------

# TimeZone
# 55 - UTC
# 8  - EST
# 68 - EET

# Countries
# 4 - UK
# 5 - US
# 6 - Canada
#12 - Suiss
#17 - Germany
#22 - France
#72 - EU

$request_importance        ='2,3';
$request_countries         ='4,5,17,22,72';
$request_timezone          ='55';

#---------------------------------------------------------------------------------------------------

$url_page   = "https://sslecal2.forexprostools.com/?columns=exc_flags,exc_currency,exc_importance,exc_actual,exc_forecast,exc_previous&category=_employment,_economicActivity,_inflation,_credit,_centralBanks,_confidenceIndex,_balance,_Bonds&importance={$request_importance}&countries={$request_countries}&calType=day&timeZone={$request_timezone}&lang=1";
$url_calendar = "https://sslecal2.forexprostools.com/?columns=exc_flags,exc_currency,exc_importance,exc_actual,exc_forecast,exc_previous&category=_employment,_economicActivity,_inflation,_credit,_centralBanks,_confidenceIndex,_balance,_Bonds&importance=2,3&features=datepicker,timezone,timeselector,filters&countries={$request_countries}&calType=week&timeZone={$request_timezone}&lang=1";

#------------------------------------------------------------------------------------------------------------

$template_html    = "../{$dir_templates}/events_calendar.html";

date_default_timezone_set('UTC');
$time_utc =  date('H:i');

date_default_timezone_set('Europe/Sofia');
$time_local =  date('H:i') . '';
$date_current =  date('D M d, Y');

$page_content = '';
$page_module = '';
$match_array = array();

$url_content = get_url($url_page);
$url_content = preg_replace("/\n/isU", " ", $url_content);

$regex_module = "<table id=\"ecEventsTable\"(.*)>(.*)<\/table>";

$match_result = preg_match("/$regex_module/iU", $url_content, $match_array);
$page_module = $match_array[0];

$page_module = preg_replace("/<thead>(.*)<\/thead>(.*)/iU", "", $page_module);
$page_module = preg_replace("/(<tbody(.*)>|<\/tbody>)/iU", "", $page_module);

$page_module = preg_replace("/\s\s+/imU", " ", $page_module);
$page_module = preg_replace("/\s\s+>/imU", ">", $page_module);
$page_module = preg_replace("/\s\s+</imU", "<", $page_module);

$page_module = preg_replace("/onclick=\"(.*)\"/imU", "", $page_module);
$page_module = preg_replace("/\"/imU", "'", $page_module);

$page_module = preg_replace("/<tr/imU", "\n<tr", $page_module);
$page_module = preg_replace("/<td/imU", "\n<td", $page_module);

$page_module = preg_replace("/^<td(.*)theDay(.*)\/td>/imU", "", $page_module);

$page_module = preg_replace("/event_(.*)='(.*)'/imU", "", $page_module);
$page_module = preg_replace("/evt(.*)='(.*)'/imU", "", $page_module);
$page_module = preg_replace("/id='(.*)'/imU", "", $page_module);
$page_module = preg_replace("/<i(.*)i>/imU", "", $page_module);
$page_module = preg_replace("/ Volatility Expected/imU", "", $page_module);

$page_module = preg_replace("/title='Low'>/imU", "<span class='event_star'></span>", $page_module);
$page_module = preg_replace("/title='Moderate'>/imU", "<span class='event_star'></span><span class='event_star'>", $page_module);
$page_module = preg_replace("/title='High'>/imU", "<span class='event_star'></span><span class='event_star'></span><span class='event_star'></span>", $page_module);

$page_module = preg_replace("/title='(.*)'/imU", "", $page_module);
$page_module = preg_replace("/^<td(.*)colspan='8'(.*)td>/imU", "", $page_module);
$page_module = preg_replace("/^<td(.*)colspan='6'/imU", "</tr><tr><td ", $page_module);
$page_module = preg_replace("/class='center time'/imU", "class='event_time'", $page_module);

$page_module = preg_replace("/ class='flagCur'/imU", "", $page_module);
$page_module = preg_replace("/ceFlags(.*)'>&nbsp;<\/span>/imU", "country_flags\\1'>&nbsp;</span>", $page_module);
$page_module = preg_replace("/\n<\/tr>/imU", "</tr>", $page_module);

$page_module = preg_replace("/\s\s+/imU", " ", $page_module);
$page_module = preg_replace("/\s\s+>/imU", ">", $page_module);
$page_module = preg_replace("/\s\s+</imU", "<", $page_module);

$page_module = preg_replace("/<tr class='noHover displayNone' ><\/tr>/imU", "", $page_module);
$page_module = preg_replace("/^<td class='diamond(.*)td>/imU", "", $page_module);
$page_module = preg_replace("/^<tr><\/tr>/imU", "", $page_module);
$page_module = preg_replace("/<span class='audioIconNew(.*)span>/imU", "", $page_module);
$page_module = preg_replace("/ class='sentiment' /imU", " ", $page_module);
$page_module = preg_replace("/<span(.*)Preliminary Release(.*)span>/imU", "", $page_module);
$page_module = preg_replace("/<table(.*)>/imU", "<table>", $page_module);

$page_module = preg_replace("/class='(.*)act(.*)'/mU",   "class='\\1data_actual\\2'", $page_module);
$page_module = preg_replace("/Manufdata_actualuring/mU",   "Manufacturing", $page_module);

$page_module = preg_replace("/class='(.*)fore(.*)'/mU",  "class='\\1data_forecast\\2'", $page_module);
$page_module = preg_replace("/class='(.*)prev(.*)'/mU",  "class='\\1data_previous\\2'", $page_module);
$page_module = preg_replace("/class='(.*)bold(.*)'/mU",  "class='\\1font_bold\\2'", $page_module);
$page_module = preg_replace("/class='(.*)greenFont(.*)'/mU",  "class='\\1color_green\\2'", $page_module);
$page_module = preg_replace("/class='(.*)redFont(.*)'/mU",  "class='\\1color_red\\2'", $page_module);
$page_module = preg_replace("/class='(.*)blackFont(.*)'/mU",  "class='\\1color_black\\2'", $page_module);
$page_module = preg_replace("/class='first left time'/mU",  "class='event_time'", $page_module);
$page_module = preg_replace("/class='left event'/mU",  "class='event_name'", $page_module);
$page_module = preg_replace("/<td class='event_name'>(.*)<\/td>/mU",  "<td class='event_name'>\\1</td></tr><tr>", $page_module);
$page_module = preg_replace("/<td>&nbsp;<\/td><\/tr><tr>/mU",  "</tr><tr>", $page_module);
$page_module = preg_replace("/<td class='event_name'>/mU",  "</tr><tr><td class='event_name'>", $page_module);
$page_module = preg_replace("/\n<\/tr>/imU", "</tr>", $page_module);
$page_module = preg_replace("/\n\n/imU", "\n", $page_module);
$page_module = $page_module . "\n";

$pages_lines = explode("\n", $page_module);

foreach ($pages_lines as &$event_line)
{
  $pages_line_time = array();
  $regex_event_time = "event_time'.*?>(.*?)<";

  $match_result = preg_match("/$regex_event_time/imU", $event_line, $pages_line_time);

  if ($match_result)
  {
    $regex_time_local = $pages_line_time[0];
    $event_time_utc = $pages_line_time[1];

    $event_time_local = date('H:i', strtotime($event_time_utc) + 60 * 60 * $time_zone);

    $event_line_modified = preg_replace("/$regex_time_local/imU",  "event_time'>$event_time_local&emsp;$event_time_utc<", $event_line);
    $page_content = $page_content . $event_line_modified . "\n";
  }
  else
  {
    $page_content = $page_content . $event_line . "\n";
  }
}

$regex_flag = "country_flags(.*?)(...)<";
$page_content = preg_replace("/$regex_flag/mU",  "country_flags\\1</td><td class='currency_code'>\\2<", $page_content);

$page_content = preg_replace("/<table>|<\/table>/imU", "", $page_content);
$page_content = preg_replace("/<tr>|<tr >/imU", "<div>", $page_content);
$page_content = preg_replace("/<\/tr>/imU", "</div>", $page_content);
$page_content = preg_replace("/<td/imU", "<span", $page_content);
$page_content = preg_replace("/<\/td>/imU", "</span>", $page_content);

$page_content = preg_replace("/<div><\/div>/imU", "", $page_content);
$page_content = preg_replace("/<\/sp</imU", "</span><", $page_content);
$page_content = preg_replace("/currency_code'>an>/imU", "currency_code'>&nbsp;", $page_content);
$page_content = preg_replace("/<span class='event_time'>/mU",  "<br><span class='event_time'>", $page_content);

#----------------------------------------------------------------------------------------------------

$page_html = get_file_template($template_html);

#----------------------------------------------------------------------------------------------------

eval("\$page_html = \"{$page_html}\";");
echo $page_html;

#----------------------------------------------------------------------------------------------------
?>
