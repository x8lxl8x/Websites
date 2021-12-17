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
  $strClientNameLast  = $_POST['varClientNameLast'];
  $strClientNameFirst  = $_POST['varClientNameFirst'];
  $strClientEmail    = $_POST['varClientEmail'];

  $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
  mysqli_query( $objConnection, "set character set 'utf8'" );
  mysqli_query( $objConnection, "set names utf8" );
  mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

  $strQuery = "select a.idkey, a.name_last, a.name_first, a.email, a.price, a.package, a.date_contacted, a.date_requested, a.date_paid, a.date_completed, a.date_consulted, b.var01, b.var02, b.var03, b.var04 from aa_client a, aa_form_01 b where a.idkey = b.idkey and a.email like '%$strClientEmail%' and name_last like '%$strClientNameLast%' and name_first like '%$strClientNameFirst%';";
  $objResult = mysqli_query( $objConnection, $strQuery );
  $intNumberOfRows = mysqli_num_rows( $objResult );

  if ( $intNumberOfRows == 0 )
  {
    $strRedirect = "<meta http-equiv='refresh' content='5;url=$strRoot/php/admin-cabinet-page.php?varIdKey=$strIdKey' />";
    $strContent = fncGetTemplate( $strDirResponses . '/admin-client-search-failed.html' );
  }
  else
  {
    $arrValues = mysqli_fetch_row( $objResult );
    mysqli_free_result( $objResult );

    $strClientIdKey        = $arrValues[0];
    $strClientNameLast      = $arrValues[1];
    $strClientNameFirst      = $arrValues[2];
    $strClientEmail        = $arrValues[3];
    $strClientPrice        = $arrValues[4];
    $strClientPackage      = $arrValues[5];
    $strClientDateContacted    = $arrValues[6];
    $strClientDateRequested    = $arrValues[7];
    $strClientDatePaid      = $arrValues[8];
    $strClientDateCompleted    = $arrValues[9];
    $strClientDateConsulted    = $arrValues[10];
    $strClientBirthYear      = $arrValues[11];
    $strClientPlaceCountry    = $arrValues[12];
    $strClientPlaceCity      = $arrValues[13];
    $strClientOccupation    = $arrValues[14];

    unset( $arrValues );

    $strQuery = "select b.package_name from aa_client a, aa_packages b where a.package = '$strClientPackage' and a.package = b.package;";
    $objResult = mysqli_query( $objConnection, $strQuery );
    $arrValues = mysqli_fetch_row( $objResult );
    mysqli_free_result( $objResult );

    $strClientPackageName    = $arrValues[0];

    $strContent = fncGetTemplate( $strDirPages . '/admin-client-show.html' );
  }

  mysqli_close( $objConnection );
}

$strPage = fncGetTemplate( $strDirPages . '/media-screen.html' );

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
