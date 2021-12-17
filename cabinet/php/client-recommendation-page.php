<?php
#---------------------------------------------------------------------------------------------------

include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-variables.php" );
include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-functions.php" );

#---------------------------------------------------------------------------------------------------

$strIdKey        = $_GET['varIdKey'];
$strClientNameLast    = $_GET['varClientNameLast'];
$strClientNameFirst    = $_GET['varClientNameFirst'];
$strRecommendationDir  = $_GET['varRecommendationDir'];
$strRecommendationFile  = $_GET['varRecommendationFile'];

#---------------------------------------------------------------------------------------------------

$strRedirect        = '';
$strFuncOnLoad        = '';
$strRecommendationDirName  = '';
$strRecommendationFileName  = '';

#---------------------------------------------------------------------------------------------------

$intResult = fncCheckAuthentication( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase, $strIdKey );

if ( $intResult == 0 || $intResult == 2 )
{
  $strContent = fncGetTemplate( $strDirResponses . '/cred-authentication-failed.html' );
}
else if ( $intResult == 1 )
{
  if ( $strRecommendationDir === '01' && $strRecommendationFile === '001' )
  {
    $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
    mysqli_query( $objConnection, "set character set 'utf8'" );
    mysqli_query( $objConnection, "set names utf8" );
    mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

    $strQuery = "select package from aa_client where idkey = '$strIdKey';";
    $objResult = mysqli_query( $objConnection, $strQuery );
    $arrValues = mysqli_fetch_row( $objResult );
    $strPackage = $arrValues[0];

    mysqli_free_result( $objResult );
    unset( $arrValues );

    $strQuery = "select * from aa_recommendation_99 where idkey = '$strIdKey';";
    $objResult = mysqli_query( $objConnection, $strQuery );
    $arrValues = mysqli_fetch_row( $objResult );

    $strRecommendation99 = $arrValues[1];
    $strRecommendation99 = preg_replace( "/\"/sU", "'", $strRecommendation99 );
    $strRecommendation99 = preg_replace( "/\'(.*?)\'/s", "&laquo;$1&raquo;", $strRecommendation99 );
    $strRecommendation99 = preg_replace( "/\'/sU", "", $strRecommendation99 );
    $strRecommendation99 = preg_replace( "/\n/sU", "</p><p>", $strRecommendation99 );

    mysqli_free_result( $objResult );
    mysqli_close( $objConnection );

    $strRecommendationFilePath = $strRecommendationsDir . '/' . $strRecommendationDir . '/' . $strRecommendationFile . '-' . $strPackage . '.txt';
  }
  else
  {
    $strRecommendationFilePath = $strRecommendationsDir . '/' . $strRecommendationDir . '/' . $strRecommendationFile . '.txt';
  }

  $strPageRecommendation = fncGetWiki( $strRecommendationFilePath );
  eval( "\$strPageRecommendation = \"$strPageRecommendation\";" );

  $strContent = fncGetTemplate( $strDirPages . '/client-recommendation.html' );
}

$strPage = fncGetTemplate( $strDirPages . '/media-screen.html' );

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
