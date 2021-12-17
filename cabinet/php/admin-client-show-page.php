<?php
#---------------------------------------------------------------------------------------------------

include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-variables.php" );
include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-functions.php" );

#---------------------------------------------------------------------------------------------------

$strIdKey        = $_GET['varIdKey'];
$strClientIdKey      = $_GET['varClientIdKey'];

#---------------------------------------------------------------------------------------------------

$intResult = fncCheckAuthentication( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase, $strIdKey );

if ( $intResult == 0 || $intResult == 1 )
{
  $strContent = fncGetTemplate( $strDirResponses . '/cred-authentication-failed.html' );
}
else if ( $intResult == 2 )
{
  $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
  mysqli_query( $objConnection, "set character set 'utf8'" );
  mysqli_query( $objConnection, "set names utf8" );
  mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

  $strQuery = "select a.name_last, a.name_first, a.email, a.price, a.package, a.date_contacted, a.date_requested, a.date_paid, a.date_completed, a.date_consulted, b.var01, b.var02, b.var03, b.var04 from aa_client a, aa_form_01 b where a.idkey = '$strClientIdKey' and a.idkey = b.idkey;";
  $objResult = mysqli_query( $objConnection, $strQuery );
  $arrValues = mysqli_fetch_row( $objResult );
  mysqli_free_result( $objResult );

  $strClientNameLast      = $arrValues[0];
  $strClientNameFirst      = $arrValues[1];
  $strClientEmail        = $arrValues[2];
  $strClientPrice        = $arrValues[3];
  $strClientPackage      = $arrValues[4];
  $strClientDateContacted    = $arrValues[5];
  $strClientDateRequested    = $arrValues[6];
  $strClientDatePaid      = $arrValues[7];
  $strClientDateCompleted    = $arrValues[8];
  $strClientDateConsulted    = $arrValues[9];
  $strClientBirthYear      = $arrValues[10];
  $strClientPlaceCountry    = $arrValues[11];
  $strClientPlaceCity      = $arrValues[12];
  $strClientOccupation    = $arrValues[13];

  unset( $arrValues );

  $strQuery = "select b.package_name from aa_client a, aa_packages b where a.package = '$strClientPackage' and a.package = b.package;";
  $objResult = mysqli_query( $objConnection, $strQuery );
  $arrValues = mysqli_fetch_row( $objResult );
  mysqli_free_result( $objResult );

  $strClientPackageName    = $arrValues[0];

  mysqli_close( $objConnection );

  $strContent = fncGetTemplate( $strDirPages . '/admin-client-show.html' );
}

$strPage = fncGetTemplate( $strDirPages . '/media-screen.html' );

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
