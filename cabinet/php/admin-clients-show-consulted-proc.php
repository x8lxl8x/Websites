<?php
#---------------------------------------------------------------------------------------------------

include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-variables.php" );
include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-functions.php" );

#---------------------------------------------------------------------------------------------------

$strIdKey = $_GET['varIdKey'];

#---------------------------------------------------------------------------------------------------

$intResult = fncCheckAuthentication( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase, $strIdKey );

if ( $intResult == 0 || $intResult == 1 )
{
  $strContent = fncGetTemplate( $strDirResponses . '/cred-authentication-failed.html' );
}
else if ( $intResult == 2 )
{
  $strClientsCurrent = "<table>\n";
//  $strClientsCurrent = $strClientsCurrent . "<tr><th class='clClientTdCenter'>Фамилия</th><th class='clClientTdCenter'>Имя</th><th class='clClientTdCenter'>Ключ</th><th class='clClientTdCenter'>Оплач.</th><th class='clClientTdCenter'>Запол.</th><th class='clClientTdCenter'>Закон.</th></tr>\n";
  $strClientsCurrent = $strClientsCurrent . "<tr><th class='clClientTdCenter'>Фамилия</th><th class='clClientTdCenter'>Имя</th><th class='clClientTdCenter'>Закон.</th></tr>\n";

  $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
  mysqli_query( $objConnection, "set character set 'utf8'" );
  mysqli_query( $objConnection, "set names utf8" );
  mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

  $strQuery = "select idkey, name_last, name_first, email, date_contacted, date_requested, date_paid, date_completed, date_consulted from aa_client where date_contacted != '0000-00-00' and date_requested != '0000-00-00' and date_paid != '0000-00-00' and date_completed != '0000-00-00' and date_consulted != '0000-00-00' and admin = 'N' order by name_last asc;";
  $objResult = mysqli_query( $objConnection, $strQuery );
  $intNumberOfRows = mysqli_num_rows( $objResult );

  for( $intCounter = 0; $intCounter < $intNumberOfRows; $intCounter++ )
  {
    $arrValues = mysqli_fetch_row( $objResult );

    $strClientIdKey        = $arrValues[0];
    $strClientNameLast      = $arrValues[1];
    $strClientNameFirst      = $arrValues[2];
    $strClientEmail        = $arrValues[3];
    $strClientDateContacted    = $arrValues[4];
    $strClientDateRequested    = $arrValues[5];

    $strClientDatePaid      = $arrValues[6];
    $strClientDateCompleted    = $arrValues[7];
    $strClientDateConsulted    = $arrValues[8];

    $strClientsCurrent = $strClientsCurrent . "<tr>";
//    $strClientsCurrent = $strClientsCurrent . "<td class='clClientTdCenter'><a href='./admin-client-show-page.php?varIdKey=$strIdKey&amp;varClientIdKey=$strClientIdKey'>&rarr;</a></td>";
    $strClientsCurrent = $strClientsCurrent . "<td class='clClientTd'><a href='./admin-client-show-page.php?varIdKey=$strIdKey&amp;varClientIdKey=$strClientIdKey'>$strClientNameLast</a></td>";
//    $strClientsCurrent = $strClientsCurrent . "<td class='clClientTd'>$strClientNameLast</td>";
    $strClientsCurrent = $strClientsCurrent . "<td class='clClientTd'>$strClientNameFirst</td>";
//    $strClientsCurrent = $strClientsCurrent . "<td class='clClientTd'>$strClientIdKey</td>";
//    $strClientsCurrent = $strClientsCurrent . "<td class='clClientTd'>$strClientDateContacted</td>";
//    $strClientsCurrent = $strClientsCurrent . "<td class='clClientTd'>$strClientDateRequested</td>";
//    $strClientsCurrent = $strClientsCurrent . "<td class='clClientTd'>$strClientDatePaid</td>";
//    $strClientsCurrent = $strClientsCurrent . "<td class='clClientTd'>$strClientDateCompleted</td>";
    $strClientsCurrent = $strClientsCurrent . "<td class='clClientTd'>$strClientDateConsulted</td>";
    $strClientsCurrent = $strClientsCurrent . "</tr>\n";
  }

  $strClientsCurrent = $strClientsCurrent . "</table>\n";

  mysqli_free_result( $objResult );
  mysqli_close( $objConnection );

  $strFuncOnLoad = 'fncOnLoadAdmin();';
  $strContent = fncGetTemplate( $strDirPages . '/admin-clients-show-consulted.html' );
}

$strPage = fncGetTemplate( $strDirPages . '/media-screen.html' );

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
