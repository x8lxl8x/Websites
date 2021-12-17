<?php
#---------------------------------------------------------------------------------------------------

include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-variables.php" );
include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-functions.php" );

#---------------------------------------------------------------------------------------------------

$strIdKey      = $_GET['varIdKey'];
$strClientIdKey    = $_GET['varClientIdKey'];
$strClientNameLast  = $_GET['varClientNameLast'];
$strClientNameFirst  = $_GET['varClientNameFirst'];
$intForm      = $_GET['varForm'];
$intFields      = $_GET['varFields'];

#---------------------------------------------------------------------------------------------------

$strDiagnosisName  = '';

#---------------------------------------------------------------------------------------------------

$intResult = fncCheckAuthentication( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase, $strIdKey );

if ( $intResult == 0 || $intResult == 1 )
{
  $strContent = fncGetTemplate( $strDirResponses . '/cred-authentication-failed.html' );
}
else if ( $intResult == 2 )
{
  $strForm =   sprintf( "%02d", $intForm );

  $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
  mysqli_query( $objConnection, "set character set 'utf8'" );
  mysqli_query( $objConnection, "set names utf8" );
  mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

  $strQuery = "select * from aa_form_$strForm where idkey = '$strClientIdKey';";
  $objResult = mysqli_query( $objConnection, $strQuery );
  $intNumberOfRows = mysqli_num_rows( $objResult );

  if ( $intNumberOfRows == 1 )
  {
    $arrValues = mysqli_fetch_row( $objResult );
    $strDiagnosisContent = $arrValues[0];

    $strDiagnosisContent = '';

    $arrInformation = array( 'id0703', 'id0706', 'id0710', 'id0713' );

    for( $intCounter = 1; $intCounter < count( $arrValues ); $intCounter++ )
    {
      unset( $arrValuesDiagnosis );
      $strCurrentField = sprintf( "id$strForm%02d", $intCounter );

      if ( $arrValues[$intCounter] === "" )
      {
        continue;
      }

      if ( $arrValues[$intCounter] != "" && $arrValues[$intCounter] != "1" )
      {
        $strQuery = "select * from aa_diagnosis_$strForm where anamnesis = '$arrValues[$intCounter]';";
      }
      elseif ( $arrValues[$intCounter] === "1" )
      {
        $strQuery = "select * from aa_diagnosis_$strForm where id = '$strCurrentField' and anamnesis != 'Информация';";
      }

      $objResultDiagnosis = mysqli_query( $objConnection, $strQuery );
      $arrValuesDiagnosis = mysqli_fetch_row( $objResultDiagnosis );
      mysqli_free_result( $objResultDiagnosis );

      $strDiagnosisContent = $strDiagnosisContent . "<b>" . $arrValuesDiagnosis[2] . "</b><br />\n";
      $strDiagnosisContent = $strDiagnosisContent . "<div class='clDiagnosis'>\n";
      $strDiagnosisContent = $strDiagnosisContent . "А: " . $arrValuesDiagnosis[3] . "<br />\n";
      $strDiagnosisContent = $strDiagnosisContent . "Д: " . $arrValuesDiagnosis[4] . "<br />\n";
      $strDiagnosisContent = $strDiagnosisContent . "</div>\n";

      for( $intCounterInfo = 0; $intCounterInfo < count( $arrInformation ); $intCounterInfo++ )
      {
        if ( $arrInformation[$intCounterInfo] === $arrValuesDiagnosis[0] )
        {
          unset( $arrValuesInfo );

          $strQuery = "select * from aa_diagnosis_$strForm where id = '$arrValuesDiagnosis[0]' and anamnesis = 'Информация';";
          $objResultInfo = mysqli_query( $objConnection, $strQuery );
          $arrValuesInfo = mysqli_fetch_row( $objResultInfo );
          mysqli_free_result( $objResultInfo );

          $strInfo = $arrValuesInfo[4];
          $strDiagnosisContent = $strDiagnosisContent . "<div class='clDiagnosis'>\n";
          $strDiagnosisContent = $strDiagnosisContent . $strInfo ."\n";
          $strDiagnosisContent = $strDiagnosisContent . "</div>\n";
        }
      }

      $strDiagnosisName = $arrValuesDiagnosis[1];
    }

    if ( $strForm === "06" )
    {
      unset( $arrValuesInfo );

      $strQuery = "select * from aa_diagnosis_$strForm where id = 'id0613' and anamnesis = 'Информация';";
      $objResultInfo = mysqli_query( $objConnection, $strQuery );
      $arrValuesInfo = mysqli_fetch_row( $objResultInfo );
      mysqli_free_result( $objResultInfo );

      $strInfo = $arrValuesInfo[4];
      $strDiagnosisContent = $strDiagnosisContent . "<br /><b>Информация - Кал</b>\n";
      $strDiagnosisContent = $strDiagnosisContent . "<div class='clDiagnosis'>\n";
      $strDiagnosisContent = $strDiagnosisContent . $strInfo ."\n";
      $strDiagnosisContent = $strDiagnosisContent . "</div>\n";
    }

    if ( $strForm === "05" )
    {
      unset( $arrValuesInfo );

      $strQuery = "select * from aa_diagnosis_$strForm where id = 'id0536' and anamnesis = 'Информация';";
      $objResultInfo = mysqli_query( $objConnection, $strQuery );
      $arrValuesInfo = mysqli_fetch_row( $objResultInfo );
      mysqli_free_result( $objResultInfo );

      $strInfo = $arrValuesInfo[4];
      $strDiagnosisContent = $strDiagnosisContent . "<br /><b>Информация - Состояния тела языка</b>\n";
      $strDiagnosisContent = $strDiagnosisContent . "<div class='clDiagnosis'>\n";
      $strDiagnosisContent = $strDiagnosisContent . $strInfo ."\n";
      $strDiagnosisContent = $strDiagnosisContent . "</div>\n";
    }
  }

  mysqli_free_result( $objResult );
  mysqli_close( $objConnection );

  $strFuncOnLoad = 'fncOnLoadFormAdmin( ' . $intForm . ', ' . $intFields . ' );';
  $strContent = fncGetTemplate( $strDirPages . '/admin-diagnosis.html' );
}

$strPage = fncGetTemplate( $strDirPages . '/media-screen.html' );

#---------------------------------------------------------------------------------------------------

eval( "\$strContent = \"$strContent\";" );
eval( "\$strPage = \"$strPage\";" );
echo $strPage;

#---------------------------------------------------------------------------------------------------
?>
