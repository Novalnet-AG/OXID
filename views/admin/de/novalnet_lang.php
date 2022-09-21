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
    'charset'                       => 'UTF-8',
    'NOVALNET_MENU'                 => 'Novalnet',
    'NOVALNET_CONFIG_MENU'          => 'Novalnet-Zahlungseinstellungen',
    'NOVALNET_ADMIN_CONFIG_MESSAGE' => 'Bevor Sie beginnen, lesen Sie bitte die Installationsanleitung und melden Sie sich mit Ihrem Händlerkonto im <a href="https://admin.novalnet.de" target="_blank">Novalnet Admin-Portal</a> an. Um ein Händlerkonto zu erhalten, senden Sie bitte eine E-Mail an <a style="font-weight: bold; color:#0080c9" href="mailto:sales@novalnet.de">sales@novalnet.de</a> oder rufen Sie uns unter +49 89 923068320 an<br/><br/>Um PayPal-Transaktionen zu akzeptieren, konfigurieren Sie Ihre PayPal-API-Informationen im <a href="https://admin.novalnet.de" target="_blank">Novalnet Admin-Portal</a> > Projekt > Wählen Sie Ihr Projekt > Zahlungsmethoden > PayPal > Konfigurieren',
    'NOVALNET_LINK_URL'             => 'https://www.novalnet.de',
    'NOVALNET_GLOBAL_CONFIGURATION' => 'Novalnet Haupteinstellungen',
    'NOVALNET_CREDITCARD'           => 'Novalnet Kredit- / Debitkarte',
    'NOVALNET_SEPA'                 => 'Novalnet SEPA-Lastschrift',
    'NOVALNET_INVOICE'              => 'Novalnet Rechnung',
    'NOVALNET_PREPAYMENT'           => 'Novalnet  Vorkasse',
    'NOVALNET_PAYPAL'               => 'Novalnet PayPal',
    'NOVALNET_INSTANTBANK'          => 'Novalnet Sofort',
    'NOVALNET_IDEAL'                => 'Novalnet iDEAL',
    'NOVALNET_EPS'                  => 'Novalnet eps',
    'NOVALNET_GIROPAY'              => 'Novalnet giropay',
    'NOVALNET_PRZELEWY24'           => 'Novalnet Przelewy24',
    'NOVALNET_ALIPAY'           => 'Novalnet Alipay',
    'NOVALNET_WECHATPAY'           => 'Novalnet WeChat Pay',
    'NOVALNET_TRUSTLY'           => 'Novalnet Trustly',
    'NOVALNET_ONLINE_BANK_TRANSFER' => 'Novalnet Online bank transfer',

    'NOVALNET_PRODUCT_ACTIVATION_KEY_TITLE'       => 'Produktaktivierungsschlüssel',
    'NOVALNET_TARIFF_ID_TITLE'                    => 'Auswahl der Tarif-ID',
    'NOVALNET_MANUAL_CHECK_LIMIT_TITLE'           => 'Mindesttransaktionsbetrag für die Autorisierung',
    'NOVALNET_CLIENT_KEY_TITLE'                   => 'Schlüsselkunde',    
    'NOVALNET_CREDITCARD_ENFORCE_3D_TITLE'        => '3D-Secure-Zahlungen außerhalb der EU erzwingen',
    'NOVALNET_CREDITCARD_ENFORCE_3D_DESCRIPTION'  => 'Wenn Sie diese Option aktivieren, werden alle Zahlungen mit Karten, die außerhalb der EU ausgegeben wurden, mit der starken Kundenauthentifizierung (Strong Customer Authentication, SCA) von 3D-Secure 2.0 authentifiziert.',
    'NOVALNET_LOGO_CONFIGURATION_TITLE'           => 'Steuerung der angezeigten Logos',
    'NOVALNET_CHECKOUT_PAYMENT_LOGO_TITLE'        => 'Zahlungslogo anzeigen ',
    'NOVALNET_CALLBACKSCRIPT_CONFIGURATION_TITLE' => 'Benachrichtigungs- / Webhook-URL festlegen',
    'NOVALNET_CALLBACK_TEST_MODE_TITLE'           => 'Manuelles Testen der Benachrichtigungs- / Webhook-URL erlauben ',
    'NOVALNET_CALLBACK_TEST_MODE_DESCRIPTION'     => 'Aktivieren Sie diese Option, um die Novalnet-Benachrichtigungs-/Webhook-URL manuell zu testen. Deaktivieren Sie die Option, bevor Sie Ihren Shop liveschalten, um unautorisierte Zugriffe von Dritten zu blockieren ',
    'NOVALNET_CALLBACK_TO_ADDRESS_TITLE'          => 'E-Mails senden an',
    'NOVALNET_NOTIFY_URL_TITLE'                   => 'Benachrichtigungs- / Webhook-URL festlegen',
    'NOVALNET_CALLBACK_ENABLE_MAIL_TITLE'         => 'E-Mail-Benachrichtigungen einschalten ',
    'NOVALNET_CALLBACK_ENABLE_MAIL_DESCRIPTION'   => 'Aktivieren Sie diese Option, um die angegebene E-Mail-Adresse zu benachrichtigen, wenn die Benachrichtigungs- / Webhook-URL erfolgreich ausgeführt wurde',

    'NOVALNET_PRODUCT_ACTIVATION_KEY_DESCRIPTION' => 'Ihren Produktaktivierungsschlüssel finden Sie im <a style="font-weight: bold; color:#0080c9;" href="https://admin.novalnet.de" target="_blank">Novalnet Admin-Portal</a>: Projekte > Wählen Sie Ihr Projekt > API-Anmeldeinformationen > API Signature (Aktivierungsschlüssel des Produkts)',
    'NOVALNET_TARIFF_ID_DESCRIPTION'              => 'Wählen Sie eine Tarif-ID, die dem bevorzugten Tarifplan entspricht, den Sie im Novalnet Admin-Portal für dieses Projekt erstellt haben',
    'NOVALNET_MANUAL_CHECK_LIMIT_DESCRIPTION'     => ' Übersteigt der Bestellbetrag das genannte Limit, wird die Transaktion, bis zu ihrer Bestätigung durch Sie, auf on hold gesetzt. Sie können das Feld leer lassen, wenn Sie möchten, dass alle Transaktionen als on hold behandelt werden.',
    'NOVALNET_PAYPAL_MANUAL_CHECK_LIMIT_DESCRIPTION' => 'Falls der Bestellbetrag das angegebene Limit übersteigt, wird die Transaktion ausgesetzt, bis Sie diese selbst bestätigen. (Für PayPal: Um diese Option zu verwenden, müssen Sie die Option Billing Agreement (Zahlungsvereinbarung) in Ihrem PayPal-Konto aktiviert haben. Kontaktieren Sie dazu bitte Ihren Kundenbetreuer bei PayPal.)',
    'NOVALNET_LOGO_CONFIGURATION_DESCRIPTION'     => 'Sie können die Anzeige der Logos auf der Checkout-Seite aktivieren oder deaktivieren',
    'NOVALNET_CHECKOUT_PAYMENT_LOGO_DESCRIPTION'  => 'Das Logo der Zahlungsart wird auf der Checkout-Seite angezeigt',
    'NOVALNET_CALLBACK_TO_ADDRESS_DESCRIPTION'    => 'E-Mail-Benachrichtigungen werden an diese E-Mail-Adresse gesendet',
    'NOVALNET_NOTIFY_URL_DESCRIPTION'             => 'Eine Benachrichtigungs- / Webhook-URL ist erforderlich, um die Datenbank / das System des Händlers mit dem Novalnet-Account synchronisiert zu halten (z.B. Lieferstatus). Weitere Informationen finden Sie in der Installationsanleitung',

    'NOVALNET_TEST_MODE_TITLE'                 => 'Testmodus aktivieren',
    'NOVALNET_BUYER_NOTIFICATION_TITLE'        => 'Benachrichtigung des Käufers',
    'NOVALNET_CREDITCARD_INLINE_FORM_TITLE'       => 'Inline-Formular ermöglichen',
    'NOVALNET_CREDITCARD_INLINE_FORM_DESCRIPTION' => ' Inline-Zahlungsformular: Die folgenden Felder werden im Checkout in zwei Zeilen angezeigt: Karteninhaber & Kreditkartennummer / Ablaufdatum / CVC-Code',
    'NOVALNET_SHOP_TYPE_TITLE'                 => 'Einkaufstyp',

    'NOVALNET_SEPA_DUE_DATE_TITLE'             => 'Fälligkeitsdatum (in Tagen)',
    'NOVALNET_INVOICE_DUE_DATE_TITLE'          => 'Fälligkeitsdatum (in Tagen)',
    'NOVALNET_PREPAYMENT_DUE_DATE_TITLE'       => 'Fälligkeitsdatum (in Tagen)',
    'NOVALNET_GUARANTEE_CONFIGURATION_TITLE'   => 'Einstellungen für die Zahlungsgarantie',
    'NOVALNET_GUARANTEE_PAYMENT_TITLE'         => 'Zahlungsgarantie aktivieren',
    'NOVALNET_GUARANTEE_MINIMUM_AMOUNT_TITLE'  => 'Mindestbestellbetrag für Zahlungsgarantie ',
    'NOVALNET_GUARANTEE_PAYMENT_FORCE_TITLE'   => 'Zahlung ohne Zahlungsgarantie erzwingen',

    'NOVALNET_TEST_MODE_DESCRIPTION'                 => 'Die Zahlung wird im Testmodus durchgeführt, daher wird der Betrag für diese Transaktion nicht eingezogen',
    'NOVALNET_BUYER_NOTIFICATION_DESCRIPTION'        => 'Der eingegebene Text wird auf der Checkout-Seite angezeigt',
    'NOVALNET_SHOP_TYPE_DESCRIPTION'                 => 'Einkaufstyp auswählen',


    'NOVALNET_SEPA_DUE_DATE_DESCRIPTION'             => 'Geben Sie die Anzahl der Tage ein, nach denen die Zahlung vorgenommen werden soll (muss zwischen 2 und 14 Tagen liegen)',
    'NOVALNET_INVOICE_DUE_DATE_DESCRIPTION'          => ' Anzahl der Tage, die der Käufer Zeit hat, um den Betrag an Novalnet zu überweisen (muss mehr als 7 Tage betragen). Wenn Sie dieses Feld leer lassen, werden standardmäßig 14 Tage als Fälligkeitsdatum festgelegt',
    'NOVALNET_PREPAYMENT_DUE_DATE_DESCRIPTION' => 'Anzahl der Tage, die der Käufer Zeit hat, um den Betrag an Novalnet zu überweisen (muss zwischen 7 und 28 Tagen liegen). Wenn Sie dieses Feld leer lassen, werden standardmäßig 14 Tage als Fälligkeitsdatum festgelegt.',
    'NOVALNET_GUARANTEE_CONFIGURATION_DESCRIPTION'   => 'Grundanforderungen für die Zahlungsgarantie
                                                         <ul>
                                                             <li>Zugelassene Staaten: DE, AT, CH</li>
                                                             <li>Zugelassene Währung: EUR</li>
                                                             <li>Mindestbetrag der Bestellung: 9,99 EUR</li>
                                                             <li> Mindestalter: 18 Jahre </li>
                                                             <li>Rechnungsadresse und Lieferadresse müssen übereinstimmen</li></ul>',
    'NOVALNET_GUARANTEE_MINIMUM_AMOUNT_DESCRIPTION'  => 'Geben Sie den Mindestbetrag (in Cent) für die zu bearbeitende Transaktion mit Zahlungsgarantie ein. Geben Sie z.B. 100 ein, was 1,00 entspricht. Der Standbetrag ist 9,99 EUR',
    'NOVALNET_GUARANTEE_PAYMENT_FORCE_DESCRIPTION'   => 'Falls die Zahlungsgarantie zwar aktiviert ist, jedoch die Voraussetzungen für Zahlungsgarantie nicht erfüllt sind, wird die Zahlung ohne Zahlungsgarantie verarbeitet. Die Voraussetzungen finden Sie in der Installationsanleitung unter "Zahlungsgarantie aktivieren"',
    'NOVALNET_OPTION_NONE'               => 'Keiner',
    'NOVALNET_ONE_CLICK_SHOP'            => 'Kauf mit einem Klick',
    'NOVALNET_ZERO_AMOUNT_BOOK'          => 'Transaktionen mit Betrag 0',
    'NOVALNET_MANAGE_TRANSACTION_TITLE'  => 'Ablauf der Buchung steuern',
    'NOVALNET_MANAGE_TRANSACTION_LABEL'  => 'Wählen Sie bitte einen Status aus',
    'NOVALNET_PLEASE_SELECT'             => '--Auswählen--',
    'NOVALNET_CONFIRM'                   => 'Bestätigen',
    'NOVALNET_CANCEL'                    => 'Stornieren',
    'NOVALNET_UPDATE'                    => 'Ändern',

    'NOVALNET_UPDATE_AMOUNT_TITLE'      => 'Betrag ändern',
    'NOVALNET_UPDATE_AMOUNT_LABEL'      => 'Betrag der Transaktion ändern',
    'NOVALNET_CENTS'                    => '(in der kleinsten Währungseinheit,<br> z.B. 100 Cent = entsprechen 1.00 EUR)',

    'NOVALNET_REFUND_AMOUNT_TITLE'                => 'Ablauf der Rückerstattung',
    'NOVALNET_REFUND_AMOUNT_LABEL'                => 'Geben Sie bitte den erstatteten Betrag ein',
    'NOVALNET_REFUND_REFERENCE_LABEL'             => 'Referenz für die Rückerstattung',
    'NOVALNET_AMOUNT_REFUNDED_PARENT_TID_MESSAGE' => '<br><br>Die Rückerstattung für die TID: %s mit dem Betrag %s wurde veranlasst',
    'NOVALNET_AMOUNT_REFUNDED_CHILD_TID_MESSAGE'  => '. Die neue TID für den erstatteten Betrag latuet: %s',
    'NOVALNET_STATUS_UPDATE_CONFIRMED_MESSAGE'    => '<br><br>Die Buchung wurde am %s um %s Uhr bestätigt',
    'NOVALNET_STATUS_UPDATE_CANCELED_MESSAGE'     => '<br><br>Die Transaktion wurde am %s um %s Uhr storniert',
    'NOVALNET_AMOUNT_UPDATED_MESSAGE'             => '<br><br><br>Die Transaktion wurde mit dem Betrag %s am %s, %s',

    'NOVALNET_TRANSACTION_DETAILS'                => 'Novalnet-Transaktionsdetails<br>',
    'NOVALNET_TRANSACTION_ID'                     => 'Novalnet Transaktions-ID: ',
    'NOVALNET_TEST_ORDER'                         => '<br>Testbestellung',
    'NOVALNET_UPDATE_AMOUNT_DUEDATE_TITLE'        => 'Betrag / Fälligkeitsdatum ändern',
    'NOVALNET_UPDATE_DUEDATE_LABEL'               => 'Fälligkeitsdatum der Transaktion',
    'NOVALNET_INVOICE_COMMENTS_TITLE'             => '<br><br>Überweisen Sie bitte den Betrag an die unten aufgeführte Bankverbindung unseres Zahlungsdienstleisters Novalnet<br>',
    'NOVALNET_DUE_DATE'                           => 'Fälligkeitsdatum: ',
    'NOVALNET_ACCOUNT'                            => '<br>Kontoinhaber: ',
    'NOVALNET_AMOUNT'                             => '<br>Betrag: ',
    'NOVALNET_INVOICE_MULTI_REFERENCE'            => '<br>%s. Verwendungszweck: ',
    'NOVALNET_ORDER_NO'                           => 'Bestellnummer ',

    'NOVALNET_INVALID_STATUS'                         => 'Wählen Sie bitte einen Status aus',
    'NOVALNET_INVALID_AMOUNT'                         => 'Ungültiger Betrag',
    'NOVALNET_INVALID_DUEDATE'                        => 'Ungültiges Fälligkeitsdatum',
    'NOVALNET_INVALID_PAST_DUEDATE'                   => 'Das Datum sollte in der Zukunft liegen',
    'NOVALNET_INVALID_GUARANTEE_MINIMUM_AMOUNT_ERROR' => 'Der Mindestbetrag sollte bei mindestens 9,99 EUR liegen',
    'NOVALNET_CONFIRM_CAPTURE'                        => 'Sind Sie sicher, dass Sie die Zahlung einziehen möchten?',
    'NOVALNET_CONFIRM_CANCEL'                         => 'Sind Sie sicher, dass Sie die Zahlung stornieren wollen?',
    'NOVALNET_CONFIRM_AMOUNT_UPDATE'                  => 'Sind Sie sich sicher, dass Sie den Bestellbetrag ändern wollen?',
    'NOVALNET_CONFIRM_DUEDATE_UPDATE'                 => 'Sind Sie sich sicher, dass Sie den Betrag / das Fälligkeitsdatum der Bestellung ändern wollen?',
    'NOVALNET_CONFIRM_REFUND'                         => 'Sind Sie sicher, dass Sie den Betrag zurückerstatten möchten?',
    'NOVALNET_CONFIRM_BOOKED'                         => 'Sind Sie sich sicher, dass Sie den Bestellbetrag buchen wollen?',

    'NOVALNET_BOOK_AMOUNT_TITLE'                => 'Transaktion durchführen',
    'NOVALNET_BOOK_AMOUNT_LABEL'                => 'Buchungsbetrag der Transaktion',
    'NOVALNET_AMOUNT_BOOKED_MESSAGE'            => '<br><br>Ihre Bestellung wurde mit einem Betrag von %s gebucht. Ihre neue TID für den gebuchten Betrag: %s',
    'NOVALNET_INVALID_CONFIG_ERROR'             => 'Füllen Sie bitte alle Pflichtfelder aus',
    'NOVALNET_INVALID_SEPA_CONFIG_ERROR'        => 'SEPA Fälligkeitsdatum Ungültiger',
    'NOVALNET_PREPAYMENT_INVALID_DUE_DATE_ERROR'  => 'Geben Sie bitte ein gültiges Fälligkeitsdatum ein',
    'NOVALNET_DEFAULT_ERROR_MESSAGE'            => 'Die Zahlung war nicht erfolgreich. Ein Fehler trat auf',

    'NOVALNET_IFRAME_CONFIGURATION_TITLE'             => 'Darstellung des Formulars',
    'NOVALNET_IFRAME_LABEL'                           => 'Beschriftung',
    'NOVALNET_IFRAME_INPUT_FIELD'                     => 'Eingabefeld',

    'NOVALNET_IFRAME_STYLE_CONFIGURATION_TITLE'       => 'CSS-Einstellungen für den iFrame mit Kreditkartendaten',    
    'NOVALNET_IFRAME_CSS'                             => 'Text für das CSS',
    'NOVALNET_BARZAHLEN'                              => 'Novalnet Barzahlen/viacash',
    'NOVALNET_BARZAHLEN_DUE_DATE_TITLE'               => 'Verfallsdatum des Zahlscheins (in Tagen)',
    'NOVALNET_BARZAHLEN_DUE_DATE_DESCRIPTION'         => 'Geben Sie die Anzahl der Tage ein, um den Betrag in einer Barzahlen-Partnerfiliale in Ihrer Nähe zu bezahlen. Wenn das Feld leer ist, werden standardmäßig 14 Tage als Fälligkeitsdatum gesetzt.',
    'NOVALNET_BARZAHLEN_DUE_DATE_UPDATE_TITLE'        => 'Betrag / Verfallsdatum des Zahlscheins ändern',
    'NOVALNET_BARZAHLEN_DUE_DATE_LABEL'               => 'Verfallsdatum des Zahlscheins',
    'NOVALNET_BARZAHLEN_DUE_DATE'                     => '<br>Verfallsdatum des Zahlscheins: ',
    'NOVALNET_BARZAHLEN_PAYMENT_STORE'                => '<br><br>Barzahlen-Partnerfiliale in Ihrer Nähe<br><br>',
    'NOVALNET_CONFIRM_SLIPDATE_UPDATE'                => 'Sind Sie sicher, dass sie den Bestellbetrag / das Ablaufdatum des Zahlscheins ändern wollen?',
    'NOVALNET_INVALID_SLIPEDATE'                      => 'Geben Sie bitte ein gültiges Ablaufdatum für den Zahlschein ein.',
    'NOVALNET_AMOUNT_DATE_UPDATED_MESSAGE'            => '<br><br>Die Transaktion wurde mit dem Betrag %s und dem Fälligkeitsdatum %s aktualisiert.',
    'NOVALNET_AMOUNT_SLIP_EXPIRY_DATE_UPDATED_MESSAGE' => '<br><br>Die Transaktion wurde mit dem Betrag %s aktualisiert und das Ablaufdatum des Belegs mit %s',
    'NOVALNET_ADMIN_MENU'                             => 'Novalnet-updates',
    'NOVALNET_ADMIN_UPDATE_VERSION'                   => '<h2><b>Novalnet-Zahlungsplugin V11.5.0</b></h2>',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE'                       => 'Vielen Dank, dass Sie die neueste Version des Novalnet Zahlungs-moduls installiert haben. Diese Version bringt einige großartige neue Funktionen und Erweiterungen.',
   'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_IT'                     =>'Hoffentlich macht es Ihnen Spaß, damit zu arbeiten!',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_KEY'                   =>'Aktivierungsschlüssel des Produkts',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_KEY_DESC'              =>'Novalnet hat den Aktivierungsschlüssel für Produkte eingeführt, um die gesamten Händler-Zugangsdaten automatisch einzutragen, wenn dieser Schlüssel in die Novalnet-Hauptkonfiguration eingetragen wird.Um diesen Aktivierungschlüssel für das Produkt zu erhalten',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_IP'                    =>'Einstellung der IP-Adresse',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_IP_DESC'               =>'Für alle Zugriffe auf die API (automatische Konfiguration mit dem Aktivierungsschlüssel des Produkts, Laden eines Kreditkarten-iFrame, Zugriff auf die API für die Übermittlung von Transaktionen, die Abfrage des Transaktionsstatus und Änderungen an Transaktionen), muss eine IP-Adresse für den Server im Novalnet Admin-Portal eingerichtet sein.',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_VENDOR_URL'            =>'Aktualisierung der Notifikation & Webhook -URL',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_VENDOR_URL_DESC'       =>'Die Notifikation & Webhook -URL wird dazu benötigt, um den Transaktionsstatus in der Datenbank / im System des Händlers aktuell und auf demselben Stand wie bei Novalnet zu halten. Dazu muss die Notifikation & Webhook -URL im Novalnet Admin-Portal eingerichtet werden.Vom Novalnet-Server wird die Information zu jeder Transaktion und deren Status (durch asynchrone Aufrufe) an den Server des Händlers übertragen.',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_ONE_CLICK'             =>'Shopping mit einem Klick',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_ONE_CLICK_DESC'        =>'Möchten Sie Ihre Kunden eine Bestellung mit einem einzigen Klick aufgeben lassen? Mit dem Novalnet Zahlungs-modul ist dies möglich! Dieses Merkmal ermöglicht es dem Endkunden, bequemer mit hinterlegten Konto-/Kartendaten zu bezahlen.',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_ZERO_AMOUNT'           =>'Buchung mit Betrag 0',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_ZERO_AMOUNT_DESC'      =>'Die Funktion "Buchung mit Betrag 0" ermöglicht es dem Händler, ein Produkt zu unterschiedlichen Preisen im Shop zu verkaufen. Die Bestellung wird zuerst mit dem Betrag 0 verarbeitet, danach kann der Händler später den Bestellbetrag abbuchen, um die Transaktion abzuschließen.',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_CC_IFRAME'             =>'Beschleunigter Kreditkarten-iFrame',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_CC_IFRAME_DESC'        =>'Jetzt haben wir den iFrame für Kreditkartenzahlungen mit den dynamischsten Funktionen aktualisiert. Mit nur wenig Code haben wir den Inhalt des Kreditkarten-iFrame beschleunigt und nutzerfreundlicher gemacht.Der Händler kann selbst die CSS-Einstellungen des Kreditkarten-iFrame-Formulars anpassen.',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_KEY_DESCS'             =>'Um diesen Aktivierungschlüssel für das Produkt zu erhalten, gehen Sie zum <a href=https://admin.novalnet.de target=_blank> Novalnet Admin-Portal</a> - Projekte: Informationen zum jeweiligen Projekt - Parameter Ihres Shops: API Signature (Aktivierungsschlüssel des Produkts)',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_IP_DESCS'              =>'Um eine IP-Adresse einzurichten, gehen Sie im  <a href=https://admin.novalnet.de target=_blank>Novalnet Admin-Portal </a> zu Projekte: Informationen zum jeweiligen Projekt - Projektübersicht: IPs für Zahlungsaufrufe.',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_VENDOR_URL_DESCS'      =>'Um den Händlerskript-URL einzurichten, gehen Sie im <a href=https://admin.novalnet.de target=_blank> Novalnet Admin-Portal</a> zu  Projekte: Informationen zum jeweiligen Projekt - Projektübersicht: Händlerskript-URL / Notifikation & Webhook -URL',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_MORE'                  =>'Moment, es gibt noch mehr!',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_PAYPAL'                =>'PayPal',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_PAYPAL_DESE'           =>'Um PayPal-Zahlungen verarbeiten zu können, müssen Sie Ihre PayPal-API-Details im Novalnet Admin-Portal konfigurieren.',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_PAYPAL_DESES'          =>'Um die PayPal-API-Details zu konfigurieren, gehen Sie bitte im <a href=https://admin.novalnet.de target=_blank>Novalnet Admin-Portal</a> zu Projekte: [Informationen zum jeweiligen Projekt] - Zahlungsmethoden : PayPal - Konfigurieren.',

    'NOVALNET_PAYMENT_ACTION_TITLE'                                     => 'Aktion für vom Besteller autorisierte Zahlungen',
    'NOVALNET_PAYMENT_ACTION_DESCRIPTION'                               => 'Wählen Sie, ob die Zahlung sofort belastet werden soll oder nicht. Zahlung einziehen: Betrag sofort belasten. Zahlung autorisieren: Die Zahlung wird überprüft und autorisiert, aber erst zu einem späteren Zeitpunkt belastet. So haben Sie Zeit, über die Bestellung zu entscheiden ',
    'NOVALNET_CONFIG_IP_ERROR1'                                         => 'Sie müssen die IP-Adresse Ihres Outgoing-Servers ',
    'NOVALNET_CONFIG_IP_ERROR2'                                         => ' abei Novalnet hinterlegen. Bitte hinterlegen Sie diese im Novalnet Admin-Portal oder kontaktieren Sie uns unter technic@novalnet.de',
    'NOVALNET_INVOICE_MULTI_REF_DESCRIPTION'            => '<br>Bitte verwenden Sie einen der unten angegebenen Verwendungszwecke für die Überweisung, da nur so Ihr Geldeingang zugeordnet werden kann:',
    'NOVALNET_PAYMENT_REFERENCE_1'                      => '<br>Zahlungsreferenz 1: ',
    'NOVALNET_PAYMENT_REFERENCE_2'                      => '<br>Zahlungsreferenz 2: ',
    'NOVALNET_IBAN'                                     => '<br>IBAN: ',
    'NOVALNET_BIC'                                      => '<br>BIC: ',
    'NOVALNET_BANK'                                     => '<br>Bank: ',
    'NOVALNET_ORDER_CONFIRMATION'                       => 'Bestellbestätigung - Ihre Bestellung ',
    'NOVALNET_ORDER_CONFIRMATION1'                      => ' bei ',
    'NOVALNET_ORDER_CONFIRMATION2'                      => ' wurde bestätigt',
    'NOVALNET_ORDER_CONFIRMATION3'                      => 'Wir freuen uns Ihnen mitteilen zu können, dass Ihre Bestellung bestätigt wurde',
    'NOVALNET_PAYMENT_INFORMATION'                      => 'Zahlung Informationen:',
    'NOVALNET_PAYMENT_GUARANTEE_COMMENTS'               => 'Diese Transaktion wird mit Zahlungsgarantie verarbeitet<br>',
    'NOVALNET_PAYMENT_ACTION_CAPTURE'            => 'Zahlung einziehen',
    'NOVALNET_PAYMENT_ACTION_AUTHORIZE'          => 'Zahlung autorisieren
',
];
?>
