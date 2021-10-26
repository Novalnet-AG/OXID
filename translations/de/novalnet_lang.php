<?php
/**
 * Novalnet payment module
 *
 * This file is used for real time processing of transaction.
 *
 * This is free contribution made by request.
 * If you have found this file useful a small
 * recommendation as well as a comment on merchant form
 * would be greatly appreciated.
 *
 * @author    Novalnet AG
 * @copyright Copyright by Novalnet
 * @license   https://www.novalnet.de/payment-plugins/kostenlos/lizenz
 *
 * Script: novalnet_lang.php
 */

$sLangName = 'Deutsch';

$aLang = [
    'charset'                                           => 'UTF-8',
    'NOVALNET_TEST_MODE_MESSAGE'                        => 'Die Zahlung wird im Testmodus durchgeführt, daher wird der Betrag für diese Transaktion nicht eingezogen.',
    'NOVALNET_PAYPAL_REFERENCE_DESCRIPTION_MESSAGE'     => 'Sobald die Bestellung abgeschickt wurde, wird die Zahlung bei Novalnet als Referenztransaktion verarbeitet.',
    'NOVALNET_PAYMENT_TYPE'                             => 'Bezahlung mit',
    'NOVALNET_CREDITCARD_TYPE'                          => 'Kreditkartentyp',
    'NOVALNET_CREDITCARD_HOLDER_NAME'                   => 'Name des Karteninhabers',
    'NOVALNET_CREDITCARD_NUMBER'                        => 'Kreditkartennummer',
    'NOVALNET_CREDITCARD_EXPIRY_DATE'                   => 'Ablaufdatum',
    'NOVALNET_CREDITCARD_CVC'                           => 'CVC/CVV/CID',
    'NOVALNET_BIRTH_DATE'                               => 'Ihr Geburtsdatum',
    'NOVALNET_BIRTH_DATE_FORMAT'                        => 'JJJJ-MM-TT',
    'NOVALNET_SEPA_HOLDER_NAME'                         => 'Kontoinhaber',
    'NOVALNET_SEPA_IBAN'                                => 'IBAN',
    'NOVALNET_INVOICE_COMMENTS_TITLE'                   => '<br><br>Überweisen Sie bitte den Betrag an die unten aufgeführte Bankverbindung unseres Zahlungsdienstleisters Novalnet<br>',
    'NOVALNET_DUE_DATE'                                 => '<br>Fälligkeitsdatum: ',
    'NOVALNET_ACCOUNT'                                  => '<br>Kontoinhaber: ',
    'NOVALNET_AMOUNT'                                   => '<br>Betrag: ',
    'NOVALNET_ORDER_NO'                                 => 'Bestellnummer ',

    'NOVALNET_TRANSACTION_DETAILS'                      => 'Novalnet-Transaktionsdetails<br>',
    'NOVALNET_TRANSACTION_ID'                           => 'Novalnet Transaktions-ID: ',
    'NOVALNET_TEST_ORDER'                               => '<br>Testbestellung',
    'NOVALNET_REDIRECT_MESSAGE'                         => 'Nach der erfolgreichen Überprüfung werden Sie auf die abgesicherte Novalnet-Bestellseite umgeleitet, um die Zahlung fortzusetzen',
    'NOVALNET_REDIRECT_SUBMIT'                          => 'Weiterleitung...',
    'NOVALNET_NEW_CARD_DETAILS'                         => 'Neue Kartendaten für spätere Käufe hinzufügen',
    'NOVALNET_GIVEN_CARD_DETAILS'                       => 'Eingegebene Kartendaten',
    'NOVALNET_NEW_ACCOUNT_DETAILS'                      => 'Neue Kontodaten für spätere Käufe hinzufügen',
    'NOVALNET_GIVEN_ACCOUNT_DETAILS'                    => 'Eingegebene Kontodaten',
    'NOVALNET_PAYPAL_NEW_ACCOUNT_DETAILS'               => 'Mit neuen PayPal-Kontodetails fortfahren',
    'NOVALNET_PAYPAL_GIVEN_ACCOUNT_DETAILS'             => 'Angegebene PayPal-Kontodetails',
    'NOVALNET_CHECK_HASH_FAILED_ERROR'                  => 'Während der Umleitung wurden einige Daten geändert. Die Überprüfung des Hashes schlug fehl',
    'NOVALNET_INVALID_BIRTHDATE_ERROR'                  => 'Sie müssen mindestens 18 Jahre alt sein',
    'NOVALNET_INVALID_DATE_ERROR'                       => 'Ungültiges Datumsformat',
    'NOVALNET_EMPTY_BIRTHDATE_ERROR'                    => 'Geben Sie bitte Ihr Geburtsdatum ein',
    'NOVALNET_PAYPAL_REFERENCE_TID'                     => 'PayPal Transaktions-ID',
    'NOVALNET_REFERENCE_TID'                            => 'Novalnet Transaktions-ID',
    'NOVALNET_TEST_MODE_NOTIFICATION_SUBJECT'           => 'Benachrichtigung zu Novalnet-Testbestellungen - OXID eShop',
    'NOVALNET_TEST_MODE_NOTIFICATION_MESSAGE'           => 'Sehr geehrte Kundin, <br><br>wir möchten Sie darüber informieren, dass eine Testbestellung %s kürzlich in Ihrem Shop durchgeführt wurde. Stellen Sie bitte sicher, dass für Ihr Projekt im Novalnet-Administrationsportal der Live-Modus gesetzt wurde und Zahlungen über Novalnet in Ihrem Shopsystem aktiviert sind. Ignorieren Sie bitte diese E-Mail, falls die Bestellung von Ihnen zu Testzwecken durchgeführt wurde. <br><br>Mit freundlichen Grüßen <br>Novalnet AG',
    'NOVALNET_PLEASE_SELECT'                            => '--Auswählen--',
    'NOVALNET_UPDATE'                                   => 'Ändern',
    'NOVALNET_DEFAULT_ERROR_MESSAGE'                    => 'Die Zahlung war nicht erfolgreich. Ein Fehler trat auf',
    'NOVALNET_INVALID_NAME_EMAIL'                       => 'Ungültige Werte für die Felder Kundenname-/email',
    'NOVALNET_BARZAHLEN_DUE_DATE'                       => '<br>Verfallsdatum des Zahlscheins: ',
    'NOVALNET_BARZAHLEN_PAYMENT_STORE'                  => '<br><br>Barzahlen-Partnerfiliale in Ihrer Nähe<br><br>',
    'NOVALNET_BARZAHLEN_BUTTON'                         => 'Jetzt mit Barzahlen bezahlen',
    'NOVALNET_PAYMENT_GUARANTEE_COMMENTS'               => 'Diese Transaktion wird mit Zahlungsgarantie verarbeitet<br>',
    'NOVALNET_INVOICE_MULTI_REF_DESCRIPTION'            => '<br>Bitte verwenden Sie einen der unten angegebenen Verwendungszwecke für die Überweisung, da nur so Ihr Geldeingang zugeordnet werden kann:',
    'NOVALNET_PAYMENT_REFERENCE_1'                      => '<br>Zahlungsreferenz 1: ',
    'NOVALNET_PAYMENT_REFERENCE_2'                      => '<br>Zahlungsreferenz 2: ',

    'NOVALNET_CC_SAVE_CARD_DATA'                        => 'Ich möchte meine Kartendaten für spätere Einkäufe speichern',
    'NOVALNET_SEPA_SAVE_CARD_DATA'                      => 'Ich möchte meine Kontodaten für spätere Einkäufe speichern',
    'NOVALNET_PAYPAL_SAVE_CARD_DATA'                    => 'Ich möchte meine PayPal-Kontodaten für spätere Einkäufe speichern',
    'NOVALNET_CC_INVALID_DETAILS'                       => 'Ihre Kreditkartendaten sind ungültig',
    'NOVALNET_SEPA_INVALID_DETAILS'                     => 'Ihre Kontodaten sind ungültig',
    'NOVALNET_GUARANTEE_FORCE_DISABLED_MESSAGE'         => 'Die Zahlung kann nicht verarbeitet werden, weil die grundlegenden Anforderungen nicht erfüllt wurden',
    'NOVALNET_GUARANTEE_AMOUNT_ERROR_MESSAGE'           => 'Mindestbestellwert ',
    'NOVALNET_GUARANTEE_CURRENCY_ERROR_MESSAGE'         => 'Nur EUR als Währung erlaubt',
    'NOVALNET_GUARANTEE_ADDRESS_MISMATCH_ERROR_MESSAGE' => 'Die Lieferadresse muss mit der Rechnungsadresse identisch sein',
    'NOVALNET_GUARANTEE_COUNTRY_ERROR_MESSAGE'          => 'nur Deutschland, Österreich oder die Schweiz sind zulässig',
    'NOVALNET_ORDER_CONFIRMATION'                       => 'Bestellbestätigung - Ihre Bestellung ',
    'NOVALNET_ORDER_CONFIRMATION1'                      => ' bei ',
    'NOVALNET_ORDER_CONFIRMATION2'                      => ' wurde bestätigt',
    'NOVALNET_ORDER_CONFIRMATION3'                      => 'Wir freuen uns Ihnen mitteilen zu können, dass Ihre Bestellung bestätigt wurde',
    'NOVALNET_PAYMENT_INFORMATION'                      => 'Zahlung Informationen:',

    'NOVALNET_IBAN'                                     => '<br>IBAN: ',
    'NOVALNET_BIC'                                      => '<br>BIC: ',
    'NOVALNET_BANK'                                     => '<br>Bank: ',
    'NOVALNET_ZEROAMOUNT_BOOKING_MESSAGE'               =>'Diese Bestellung wird als Nullbetrag gebucht, in dem Ihre Zahlungsdaten für weitere Online-Einkäufe gespeichert werden',

    'NOVALNET_CRITICAL_ERROR_MESSAGE1'                  => ' Kritischer Fehler im Shopsystem ',
    'NOVALNET_CRITICAL_ERROR_MESSAGE2'                  => ' : Bestellung für TID: %s nicht gefunden ',
    'NOVALNET_CRITICAL_MESSAGE_SUBJECT'                 => 'Dear Technic team,<br/><br/>Sehen Sie sich bitte diese Transaktion an und kontaktieren Sie das Technik- bzw. das Backend-Team bei Novalnet.<br/><br/>',
    'NOVALNET_MERCHANT_ID'                              => 'Händler-ID: ',
    'NOVALNET_PROJECT_ID'                               => 'Projekt-ID: ',
    'NOVALNET_TID'                                      => 'TID: ',
    'NOVALNET_TID_STATUS'                               => 'TID status: ' ,
    'NOVALNET_PAYMENT_TYPE'                             => 'Zahlungsart: ',
    'NOVALNET_EMAIL'                                    => 'E-mail: ',
    'NOVALNET_REGARDS'                                  => '<br/><br/>Grüßen,<br/>Novalnet Team',

    'NOVALNET_SEPA_DECLARATION'                         => '<strong>Ich erteile hiermit das SEPA-Lastschriftmandat</strong> (elektronische Übermittlung) <strong>und bestätige, dass die Bankverbindung korrekt ist.</strong><br/><br/>',
    'NOVALNET_SEPA_AUTHORIZE'                           => 'Ich ermächtige den Zahlungsempfänger, Zahlungen von meinem Konto mittels Lastschrift einzuziehen. Zugleich weise ich mein Kreditinstitut an, die von dem Zahlungsempfänger auf mein Konto gezogenen Lastschriften einzulösen.<br/><br/>',
    'NOVALNET_SEPA_CREDITOR_IDENTIFIER'                 => '<strong>Gläubiger-Identifikationsnummer: DE53ZZZ00000004253</strong><br/><br/>',
    'NOVALNET_SEPA_CLAIM_NOTES'                         => '<strong>Hinweis:</strong>Ich kann innerhalb von acht Wochen, beginnend mit dem Belastungsdatum, die Erstattung des belasteten Betrages verlangen. Es gelten dabei die mit meinem Kreditinstitut vereinbarten Bedingungen.<br/>',
    'NOVALNET_GUARANTEE_TEXT'                   => '<br><br>Ihre Bestellung ist unter Bearbeitung. Sobald diese bestätigt wurde, erhalten Sie alle notwendigen Informationen zum Ausgleich der Rechnung. Wir bitten Sie zu beachten, dass dieser Vorgang bis zu 24 Stunden andauern kann<br>',
    'NOVALNET_SEPA_GUARANTEE_TEXT'                   => '<br><br>Ihre Bestellung wird derzeit überprüft. Wir werden Sie in Kürze über den Bestellstatus informieren. Bitte beachten Sie, dass dies bis zu 24 Stunden dauern kann.<br>',

    'NOVALNET_PAYMENT_FAILED'                   => 'Zahlung fehlgeschlagen',
];
?>

