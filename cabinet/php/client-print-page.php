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

$intResult = fncCheckAuthentication( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase, $strIdKey );

if ( $intResult == 0 || $intResult == 2 )
{
  $strContent = fncGetTemplate( $strDirResponses . '/cred-authentication-failed.html' );
}
else if ( $intResult == 1 )
{
  $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
  mysqli_query( $objConnection, "set character set 'utf8'" );
  mysqli_query( $objConnection, "set names utf8" );
  mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

  $strQuery = "select name from aa_recommendations_dir_map where directory = '$strRecommendationDir';";
  $objResult = mysqli_query( $objConnection, $strQuery );
  $arrValues = mysqli_fetch_row( $objResult );
  $strRecommendationDirName = $arrValues[0];

  unset( $arrValues );

  $strQuery = "select name from aa_recommendations_file_map where directory = '$strRecommendationDir' and file = '$strRecommendationFile';";
  $objResult = mysqli_query( $objConnection, $strQuery );
  $arrValues = mysqli_fetch_row( $objResult );
  $strRecommendationFileName = $arrValues[0];

  unset( $arrValues );

  mysqli_free_result( $objResult );
  mysqli_close( $objConnection );

  if ( $strRecommendationDir === '01' && $strRecommendationFile === '001' )
  {
    $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
    mysqli_query( $objConnection, "set character set 'utf8'" );
    mysqli_query( $objConnection, "set names utf8" );
    mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

    $strQuery = "select * from aa_recommendation_99 where idkey = '$strIdKey';";
    $objResult = mysqli_query( $objConnection, $strQuery );
    $arrValues = mysqli_fetch_row( $objResult );
    $strRecommendation99 = $arrValues[1];

    mysqli_free_result( $objResult );
    mysqli_close( $objConnection );
  }

  $strRecommendationFilePath = $strRecommendationsDir . '/' . $strRecommendationDir . '/' . $strRecommendationFile . '.txt';
  $strPageRecommendation = fncGetWiki( $strRecommendationFilePath );
  eval( "\$strPageRecommendation = \"$strPageRecommendation\";" );

  $strContent = fncGetTemplate( $strDirPages . '/client-recommendation.html' );
  $strContent = preg_replace( "/<div id=\'idExitLink\'>(.*?)<\/div>/is", "", $strContent );
}

$strPage = fncGetTemplate( $strDirPages . '/media-print.html' );

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
