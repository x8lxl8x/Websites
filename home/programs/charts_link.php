<?php
#----------------------------------------------------------------------------------------------------

include("./global_objects.php");
include("./simple_html_dom.php");

#----------------------------------------------------------------------------------------------------

$page_title     = "Charts Link";
$currency_pair  = 'usd-chf';
$page_url_src   = "https://www.investing.com/currencies/{$currency_pair}-chart";

#----------------------------------------------------------------------------------------------------

function get_url_local($url_link, $post_fields = null)
{
  global $user_agent;

  $curl_handle = curl_init();

  curl_setopt($curl_handle, CURLOPT_URL, $url_link);
  curl_setopt($curl_handle, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($curl_handle, CURLOPT_HEADER, false);
  curl_setopt($curl_handle, CURLOPT_COOKIESESSION, true);
  curl_setopt($curl_handle, CURLOPT_COOKIESESSION, true);

  curl_setopt($curl_handle, CURLOPT_COOKIEJAR, '/home/lux/mnt/data/Temp/cookie_jar.txt');
  curl_setopt($curl_handle, CURLOPT_COOKIEFILE, '/home/lux/mnt/data/Temp/cookie_file.txt');
#  curl_setopt($curl_handle, CURLOPT_COOKIE, $cookie_header');

  curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl_handle, CURLOPT_ENCODING, 'gzip, deflate');
#  curl_setopt($curl_handle, CURLOPT_FAILONERROR, true);
  curl_setopt($curl_handle, CURLOPT_AUTOREFERER, true);
#  curl_setopt($curl_handle, CURLOPT_REFERER, '');
  curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 20);
  curl_setopt($curl_handle, CURLOPT_TIMEOUT, 60);
  curl_setopt($curl_handle, CURLOPT_FORBID_REUSE, false);
  curl_setopt($curl_handle, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

  if (! is_null($post_fields))
  {
    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $post_fields);
#    file_put_contents('/tmp/php_test.txt', $post_fields['langdir'] . " " . $post_fields['search']);
  }

  curl_setopt($curl_handle, CURLOPT_HTTPHEADER,
    array(
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'accept-language: en-US,en, bg-BG',
        'cache-control: no-cache',
        'connection: keep-alive',
        'dnt: 1',
        'pragma: no-cache',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: none',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
      )
  );

  $curl_content = curl_exec($curl_handle);
  $http_status = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);

#  file_put_contents('/tmp/php_test.txt', $url_link);

  if (curl_errno($curl_handle)) { print 'Error: [' . curl_error($curl_handle) . ']'; }

  curl_close($curl_handle);

  return $curl_content;
}

#----------------------------------------------------------------------------------------------------

$page_content = get_url_local($page_url_src);

$matches_array = array();
$return_value = preg_match("/<iframe id=\"tvc(.*?)src=\"(.*?)\"/iU", $page_content, $matches_array);
$page_url_dst = $matches_array[2];
unset($matches_array);

echo $page_url_dst;
#header("Location: {$page_url_dst}");

#------------------------------------------------------------------------------------------------------------
?>
