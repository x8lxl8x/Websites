<?php
#---------------------------------------------------------------------------------------------------

include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-variables.php" );
include( $_SERVER['DOCUMENT_ROOT'] . dirname( $_SERVER["PHP_SELF"] ) . "/global-functions.php" );

#---------------------------------------------------------------------------------------------------

$strIdKey = $_GET['varIdKey'];

#---------------------------------------------------------------------------------------------------

$intCounterNotEmpty = 0;

#---------------------------------------------------------------------------------------------------

$intResult = fncCheckAuthentication( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase, $strIdKey );

if ( $intResult == 0 || $intResult == 2 )
{
  $strContent = fncGetTemplate( $strDirResponses . '/cred-authentication-failed.html' );
}
else if ( $intResult == 1 )
{
  $arrValues = array();
  unset( $arrValues );

  $objConnection = mysqli_connect( $strDbHost, $strDbUser, $strDbPassword, $strDbDatabase );
  mysqli_query( $objConnection, "set character set 'utf8'" );
  mysqli_query( $objConnection, "set names utf8" );
  mysqli_query( $objConnection, "set collation_connection=utf8_unicode_ci" );

  $strQuery = "select name_last, name_first, email, price, package, payment_method, payment_confirmed, date_contacted, date_requested, date_paid, date_completed, date_consulted from aa_client where idkey = '$strIdKey';";
  $objResult = mysqli_query( $objConnection, $strQuery );
  $arrValues = mysqli_fetch_row( $objResult );

  $strClientNameLast         = $arrValues[0];
  $strClientNameFirst        = $arrValues[1];
  $strClientEmail            = $arrValues[2];
  $strClientPrice            = $arrValues[3];
  $strClientPackage          = $arrValues[4];
  $strClientPaymentMethod    = $arrValues[5];
  $strClientPaymentConfirmed = $arrValues[6];
  $strClientDateContacted    = $arrValues[7];
  $strClientDateRequested    = $arrValues[8];
  $strClientDatePaid         = $arrValues[9];
  $strClientDateCompleted    = $arrValues[10];
  $strClientDateConsulted    = $arrValues[11];

  unset( $arrValues );

  if                // contacted
  (
    ( $strClientPaymentConfirmed  === 'N' ) &&
    ( $strClientDateContacted    !==  '0000-00-00' ) &&
    ( $strClientDateRequested     === '0000-00-00' ) &&
    ( $strClientDatePaid          === '0000-00-00' ) &&
    ( $strClientDateCompleted     === '0000-00-00' ) &&
    ( $strClientDateConsulted     === '0000-00-00' )
  )
  {
    unset( $arrValues );

    $strQuery = "select message_text from aa_welcome_message where idkey = '$strIdKey';";
    $objResult = mysqli_query( $objConnection, $strQuery );
    $arrValues = mysqli_fetch_row( $objResult );
    mysqli_free_result( $objResult );

    $strWelcomeMessageText = $arrValues[0];

    $strContent = fncGetTemplate( $strDirPages . '/client-cabinet-contacted.html' );
  }
  else if                // requested
  (
    ( $strClientPaymentConfirmed  === 'N' ) &&
    ( $strClientDateContacted    !==  '0000-00-00' ) &&
    ( $strClientDateRequested    !==  '0000-00-00' ) &&
    ( $strClientDatePaid          === '0000-00-00' ) &&
    ( $strClientDateCompleted     === '0000-00-00' ) &&
    ( $strClientDateConsulted     === '0000-00-00' )
  )
  {

    # Currecncy Conversion ---------------------------------------------------------------------------------------

    date_default_timezone_set('Europe/Moscow');
    $strCurrentDateMSK = date( 'Y-m-d H:i' );

    date_default_timezone_set('America/Toronto');
    $strCurrentDateEST = date( 'F d, Y h:i A' );

    date_default_timezone_set('UTC');

    switch ( $strClientPaymentMethod )
    {
      case '01': $strTargetCurrency = 'RUB'; break;
      case '02': $strTargetCurrency = 'EUR'; break;
      case '03': $strTargetCurrency = 'EUR'; break;
      case '04': $strTargetCurrency = 'EUR'; break;
      case '05': $strTargetCurrency = 'CAD'; break;
      case '06': $strTargetCurrency = 'USD'; break;
    }

    $strConverterUrl = preg_replace( "/{SourceCurrency}/isU", $strSourceCurrency, $strConverterUrl );
    $strConverterUrl = preg_replace( "/{TargetCurrency}/isU", $strTargetCurrency, $strConverterUrl );
    $strConverterUrl = preg_replace( "/{Amount}/isU", $strClientPrice, $strConverterUrl );

    $objCurlHandle = curl_init();
    curl_setopt( $objCurlHandle, CURLOPT_URL, $strConverterUrl );
    curl_setopt( $objCurlHandle, CURLOPT_USERAGENT, $strUserAgent );
    curl_setopt( $objCurlHandle, CURLOPT_HEADER, 0 );
    curl_setopt( $objCurlHandle, CURLOPT_HEADER, 0 );
    curl_setopt( $objCurlHandle, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $objCurlHandle, CURLOPT_SSL_VERIFYHOST, 0 );
    curl_setopt( $objCurlHandle, CURLOPT_SSL_VERIFYPEER, 0 );
    $strConverterResult = curl_exec( $objCurlHandle );
    if ( curl_errno( $objCurlHandle ) ) { print 'Error: [' . curl_error( $objCurlHandle ) . ']'; }

    unset( $arrMatches );

    preg_match( "/${strConverterPattern}/iU", $strConverterResult, $arrMatches );

    $strMatchResult      = str_replace( ",", "", $arrMatches[1] );
    $strConverted        = sprintf( "%5.2f", ceil( floatval( $strMatchResult ) + 0.00 ) );  # Converted
    $strConvertedInterac = sprintf( "%5.2f", ceil( floatval( $strMatchResult ) + 2.00 ) );  # Converted + Interac

    # -------------------------------------------------------------------------------------------------------------

    $strClientPaymentMethodText = fncGetTemplate( $strDirPayments . '/' . $strClientPaymentMethod . '.html' );
    eval( "\$strClientPaymentMethodText = \"$strClientPaymentMethodText\";" );
    $strContent = fncGetTemplate( $strDirPages . '/client-cabinet-requested.html' );
  }
  else if                // paid and notconfirmed
  (
    ( $strClientPaymentConfirmed  === 'N' ) &&
    ( $strClientDateContacted    !==  '0000-00-00' ) &&
    ( $strClientDateRequested    !==  '0000-00-00' ) &&
    ( $strClientDatePaid         !==  '0000-00-00' ) &&
    ( $strClientDateCompleted     === '0000-00-00' ) &&
    ( $strClientDateConsulted     === '0000-00-00' )
  )
  {
    $strRecommendations = "Рекомендации будут размещены после обработки всех заполненных форм.";
    $strContent = fncGetTemplate( $strDirPages . '/client-cabinet-notconfirmed.html' );
  }
  else if                // paid and confirmed
  (
    ( $strClientPaymentConfirmed  === 'Y' ) &&
    ( $strClientDateContacted    !==  '0000-00-00' ) &&
    ( $strClientDateRequested    !==  '0000-00-00' ) &&
    ( $strClientDatePaid         !==  '0000-00-00' ) &&
    ( $strClientDateCompleted     === '0000-00-00' ) &&
    ( $strClientDateConsulted     === '0000-00-00' )
  )
  {
    $strRecommendations = "Рекомендации будут размещены после обработки всех заполненных форм.";
    $strContent = fncGetTemplate( $strDirPages . '/client-cabinet-paid.html' );
  }
  else if                // completed
  (
    ( $strClientPaymentConfirmed  === 'Y' ) &&
    ( $strClientDateContacted    !==  '0000-00-00' ) &&
    ( $strClientDateRequested    !==  '0000-00-00' ) &&
    ( $strClientDatePaid         !==  '0000-00-00' ) &&
    ( $strClientDateCompleted    !==  '0000-00-00' ) &&
    ( $strClientDateConsulted     === '0000-00-00' )
  )
  {
    $strRecommendations = "Рекомендации будут размещены после обработки всех заполненных форм.";
    $strContent = fncGetTemplate( $strDirPages . '/client-cabinet-completed.html' );
  }
  else if                // consulted
  (
    ( $strClientPaymentConfirmed  === 'Y' ) &&
    ( $strClientDateContacted    !==  '0000-00-00' ) &&
    ( $strClientDateRequested    !==  '0000-00-00' ) &&
    ( $strClientDatePaid         !==  '0000-00-00' ) &&
    ( $strClientDateCompleted    !==  '0000-00-00' ) &&
    ( $strClientDateConsulted    !==  '0000-00-00' )
  )
  {
    $strRecommendations = '';

    $strQuery = "select * from aa_recommendations_dir_map order by directory;";
    $objResultDir = mysqli_query( $objConnection, $strQuery );
    $intNumberOfRowsDir = mysqli_num_rows( $objResultDir );

    for( $intCounterDir = 0; $intCounterDir < $intNumberOfRowsDir; $intCounterDir++ )
    {
      unset( $arrValuesDir );

      $arrValuesDir = mysqli_fetch_row( $objResultDir );
      $strRecommendationDir = sprintf( "%02d", $intCounterDir + 1 );

      $strQuery = "select * from aa_recommendation_$strRecommendationDir where idkey = '$strIdKey';";
      $objResultFile = mysqli_query( $objConnection, $strQuery );

      if ( $objResultFile != false )
      {
        $strRecommendationBlock = '';
        $strRecommendationDirName = $arrValuesDir[1];
        $arrValuesFile = mysqli_fetch_row( $objResultFile );

        for( $intCounterFile = 1; $intCounterFile < count( $arrValuesFile ); $intCounterFile++ )
        {
          if ( $arrValuesFile[$intCounterFile] === '1' )
          {
            $strRecommendationFile = sprintf( "%03d", $intCounterFile );

            $strQuery = "select * from aa_recommendations_file_map where directory = '$strRecommendationDir' and file = '$strRecommendationFile';";
            $objResultFileName = mysqli_query( $objConnection, $strQuery );
            $arrValuesFileName = mysqli_fetch_row( $objResultFileName );
            mysqli_free_result( $objResultFileName );

            $strRecommendationBlock = $strRecommendationBlock . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            $strRecommendationBlock = $strRecommendationBlock . "<a href='./client-recommendation-page.php?";
            $strRecommendationBlock = $strRecommendationBlock . "varIdKey=$strIdKey";
            $strRecommendationBlock = $strRecommendationBlock . "&amp;varClientNameLast=$strClientNameLast";
            $strRecommendationBlock = $strRecommendationBlock . "&amp;varClientNameFirst=$strClientNameFirst";
            $strRecommendationBlock = $strRecommendationBlock . "&amp;varRecommendationDir=$strRecommendationDir";
            $strRecommendationBlock = $strRecommendationBlock . "&amp;varRecommendationFile=$strRecommendationFile";
            $strRecommendationBlock = $strRecommendationBlock . "'>";
            $strRecommendationBlock = $strRecommendationBlock . $arrValuesFileName[2] . "</a><br />\n";

            $intCounterNotEmpty++;
          }
        }

        if ( $strRecommendationBlock !== '' )
        {
          $strRecommendations = $strRecommendations . "<b>$strRecommendationDirName</b><br />\n" . $strRecommendationBlock;
        }

        mysqli_free_result( $objResultFile );
      }
    }

    mysqli_free_result( $objResultDir );

    $strContent = fncGetTemplate( $strDirPages . '/client-cabinet-consulted.html' );
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
