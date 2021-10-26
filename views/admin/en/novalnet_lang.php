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

$sLangName = 'English';

$aLang = [
    'charset'                       => 'UTF-8',
    'NOVALNET_MENU'                 => 'Novalnet',
    'NOVALNET_CONFIG_MENU'          => 'Novalnet payment configuration',
    'NOVALNET_ADMIN_CONFIG_MESSAGE' => 'Please read the Installation Guide before you start and login to the <a href="https://admin.novalnet.de" target="_blank">Novalnet Admin Portal</a> using your merchant account. To get a merchant account, mail to <a style="font-weight: bold; color:#0080c9;" href="mailto:sales@novalnet.de">sales@novalnet.de</a> or call +49 (089) 923068320<br/><br/>To accept PayPal transactions, configure your PayPal API info in the <a href="https://admin.novalnet.de" target="_blank">Novalnet Admin Portal</a> PROJECT > Project Information > Payment Methods > Paypal > Configure',
    'NOVALNET_LINK_URL'             => 'https://www.novalnet.com',
    'NOVALNET_GLOBAL_CONFIGURATION' => 'Novalnet Global Configuration',
    'NOVALNET_CREDITCARD'           => 'Novalnet Credit/Debit Cards',
    'NOVALNET_SEPA'                 => 'Novalnet Direct Debit SEPA',
    'NOVALNET_INVOICE'              => 'Novalnet Invoice',
    'NOVALNET_PREPAYMENT'           => 'Novalnet Prepayment',
    'NOVALNET_PAYPAL'               => 'Novalnet PayPal',
    'NOVALNET_INSTANTBANK'          => 'Novalnet Sofort',
    'NOVALNET_IDEAL'                => 'Novalnet iDEAL',
    'NOVALNET_EPS'                  => 'Novalnet eps',
    'NOVALNET_GIROPAY'              => 'Novalnet giropay',
    'NOVALNET_PRZELEWY24'           => 'Novalnet Przelewy24',

    'NOVALNET_PRODUCT_ACTIVATION_KEY_TITLE'       => 'Product activation key <span style="color:red;">*</span>',
    'NOVALNET_TARIFF_ID_TITLE'                    => 'Select Tariff ID <span style="color:red;">*</span>',
    'NOVALNET_MANUAL_CHECK_LIMIT_TITLE'           => 'Minimum transaction limit for authorization',
    'NOVALNET_CLIENT_KEY_TITLE'                   => 'Client key',
    'NOVALNET_CREDITCARD_ENFORCE_3D_TITLE'        => 'Enforce 3D secure payment outside EU',
    'NOVALNET_CREDITCARD_ENFORCE_3D_DESCRIPTION'  => 'By enabling this option, all payments from cards issued outside the EU will be authenticated via 3DS 2.0 SCA',
    'NOVALNET_LOGO_CONFIGURATION_TITLE'           => 'Logos display management',
    'NOVALNET_CHECKOUT_PAYMENT_LOGO_TITLE'        => 'Display payment logo',
    'NOVALNET_CALLBACKSCRIPT_CONFIGURATION_TITLE' => 'Notification / Webhook URL Setup',
    'NOVALNET_CALLBACK_TEST_MODE_TITLE'           => 'Allow manual testing of the Notification / Webhook URL',
    'NOVALNET_CALLBACK_TEST_MODE_DESCRIPTION'     => 'Enable this to test the Novalnet Notification / Webhook URL manually. Disable this before setting your shop live to block unauthorized calls from external parties',
    'NOVALNET_CALLBACK_TO_ADDRESS_TITLE'          => 'Send e-mail to',
    'NOVALNET_CALLBACK_ENABLE_MAIL_TITLE'         => 'Enable e-mail notification',
    'NOVALNET_CALLBACK_ENABLE_MAIL_DESCRIPTION'   => 'Enable this option to notify the given e-mail address when the Notification / Webhook URL is executed successfully',
    'NOVALNET_NOTIFY_URL_TITLE'                   => 'Notification / Webhook URL',
    'NOVALNET_PRODUCT_ACTIVATION_KEY_DESCRIPTION' => 'Get your Product activation key from the <a style="font-weight: bold; color:#0080c9;" href="https://admin.novalnet.de" target="_blank">Novalnet Admin Portal</a>: PROJECT > Choose your project > Shop Parameters > API Signature (Product activation key)',
    'NOVALNET_TARIFF_ID_DESCRIPTION'              => 'Select a Tariff ID to match the preferred tariff plan you created at the Novalnet Admin Portal for this project',
    'NOVALNET_MANUAL_CHECK_LIMIT_DESCRIPTION'     => 'In case the order amount exceeds the mentioned limit, the transaction will be set on-hold till your confirmation of the transaction. You can leave the field empty if you wish to process all the transactions as on-hold',
    'NOVALNET_PAYPAL_MANUAL_CHECK_LIMIT_DESCRIPTION'  => 'In case the order amount exceeds mentioned limit, the transaction will be set on hold till your confirmation of transaction (In order to use this option you must have billing agreement option enabled in your PayPal account. Please contact your account manager at PayPal.)',
    'NOVALNET_LOGO_CONFIGURATION_DESCRIPTION'     => 'You can activate or deactivate the logos display for the checkout page',
    'NOVALNET_CHECKOUT_PAYMENT_LOGO_DESCRIPTION'  => 'The payment method logo(s) will be displayed on the checkout page',
    'NOVALNET_CALLBACK_TO_ADDRESS_DESCRIPTION'    => 'Notification / Webhook URL execution messages will be sent to this e-mail',
    'NOVALNET_NOTIFY_URL_DESCRIPTION'             => 'Notification / Webhook URL is required to keep the merchant’s database/system synchronized with the Novalnet account (e.g. delivery status). Refer the Installation Guide for more information',

    'NOVALNET_TEST_MODE_TITLE'                    => 'Enable test mode',
    'NOVALNET_BUYER_NOTIFICATION_TITLE'           => 'Notification for the buyer',
    'NOVALNET_CREDITCARD_INLINE_FORM_TITLE'       => 'Enable inline form',
    'NOVALNET_CREDITCARD_INLINE_FORM_DESCRIPTION' => 'Inline form: The following fields will be shown in the checkout in two lines: card holder & credit card number / expiry date / CVC',
    'NOVALNET_SHOP_TYPE_TITLE'                    => 'Shopping type',

    'NOVALNET_SEPA_DUE_DATE_TITLE'                => 'Payment due date (in days)',
    'NOVALNET_INVOICE_DUE_DATE_TITLE'             => 'Payment due date (in days)',
    'NOVALNET_PREPAYMENT_DUE_DATE_TITLE'          => 'Payment due date (in days)',
    'NOVALNET_GUARANTEE_CONFIGURATION_TITLE'      => 'Payment guarantee configuration',
    'NOVALNET_GUARANTEE_PAYMENT_TITLE'            => 'Enable payment guarantee',
    'NOVALNET_GUARANTEE_MINIMUM_AMOUNT_TITLE'     => 'Minimum order amount for payment guarantee',
    'NOVALNET_GUARANTEE_PAYMENT_FORCE_TITLE'      => 'Force Non-Guarantee payment',

    'NOVALNET_TEST_MODE_DESCRIPTION'                 => 'The payment will be processed in the test mode therefore amount for this transaction will not be charged',
    'NOVALNET_BUYER_NOTIFICATION_DESCRIPTION'        => 'The entered text will be displayed on the checkout page',
    'NOVALNET_SHOP_TYPE_DESCRIPTION'                 => 'Select shopping type',
    'NOVALNET_SEPA_DUE_DATE_DESCRIPTION'             => 'Enter the number of days after which the payment should be processed (must be between 2 and 14 days)',
    'NOVALNET_INVOICE_DUE_DATE_DESCRIPTION'          => 'Number of days given to the buyer to transfer the amount to Novalnet (must be greater than 7 days). If this field is left blank, 14 days will be set as due date by default',
    'NOVALNET_PREPAYMENT_DUE_DATE_DESCRIPTION'       => 'Number of days given to the buyer to transfer the amount to Novalnet (must be between 7 and 28 days). If this field is left blank, 14 days will be set as due date by default.',
    'NOVALNET_GUARANTEE_CONFIGURATION_DESCRIPTION'   => 'Basic requirements for payment guarantee
                                                         <ul>
                                                             <li>Allowed countries: DE, AT, CH</li>
                                                            <li>Allowed currency: EUR</li>
                                                            <li>Minimum order amount: 9,99 EUR or more</li>
                                                            <li>Age limit: 18 years or more</li>
                                                            <li>The billing address must be the same as the shipping address</li>
                                                         </ul>',
    'NOVALNET_GUARANTEE_MINIMUM_AMOUNT_DESCRIPTION'  => 'Enter the minimum amount (in cents) for the transaction to be processed with payment guarantee. For example, enter 100 which is equal to 1,00. By default, the amount will be 9,99 EUR',
    'NOVALNET_GUARANTEE_PAYMENT_FORCE_DESCRIPTION'   => 'Even if payment guarantee is enabled, payments will still be processed as non-guarantee payments if the payment guarantee requirements are not met. Review the requirements under "Enable Payment Guarantee" in the Installation Guide',

    'NOVALNET_OPTION_NONE'               => 'None',
    'NOVALNET_ONE_CLICK_SHOP'            => 'One-click shopping',
    'NOVALNET_ZERO_AMOUNT_BOOK'          => 'Zero amount booking',
    'NOVALNET_MANAGE_TRANSACTION_TITLE'  => 'Manage transaction process',
    'NOVALNET_MANAGE_TRANSACTION_LABEL'  => 'Please select status',
    'NOVALNET_PLEASE_SELECT'             => '--Select--',
    'NOVALNET_CONFIRM'                   => 'Confirm',
    'NOVALNET_CANCEL'                    => 'Cancel',
    'NOVALNET_UPDATE'                    => 'Update',

    'NOVALNET_UPDATE_AMOUNT_TITLE'       => 'Amount update',
    'NOVALNET_UPDATE_AMOUNT_LABEL'       => 'Update transaction amount',
    'NOVALNET_CENTS'                     => '(in minimum unit of currency.<br> E.g. enter 100 which is equal to 1.00)',

    'NOVALNET_REFUND_AMOUNT_TITLE'                => 'Refund process',
    'NOVALNET_REFUND_AMOUNT_LABEL'                => 'Please enter the refund amount',
    'NOVALNET_REFUND_REFERENCE_LABEL'             => 'Refund reference',
    'NOVALNET_AMOUNT_REFUNDED_PARENT_TID_MESSAGE' => '<br><br>Refund has been initiated for the TID: %s with the amount %s',
    'NOVALNET_AMOUNT_REFUNDED_CHILD_TID_MESSAGE'  => '. New TID: %s for the refunded amount.',
    'NOVALNET_STATUS_UPDATE_CONFIRMED_MESSAGE'    => '<br><br>The transaction has been confirmed on %s, %s',
    'NOVALNET_STATUS_UPDATE_CANCELED_MESSAGE'     => '<br><br>The transaction has been canceled on %s, %s',
    'NOVALNET_AMOUNT_UPDATED_MESSAGE'             => '<br><br><br>The transaction has been updated with amount %s on %s, %s',

    'NOVALNET_TRANSACTION_DETAILS'            => 'Novalnet transaction details<br>',
    'NOVALNET_TRANSACTION_ID'                 => 'Novalnet transaction ID: ',
    'NOVALNET_TEST_ORDER'                     => '<br>Test order',
    'NOVALNET_UPDATE_AMOUNT_DUEDATE_TITLE'    => 'Change the  amount / due date',
    'NOVALNET_UPDATE_DUEDATE_LABEL'           => 'Transaction due date',
    'NOVALNET_INVOICE_COMMENTS_TITLE'         => '<br><br>Please transfer the amount to the below mentioned account details of our payment processor Novalnet<br>',
    'NOVALNET_DUE_DATE'                       => '<br>Due date: ',
    'NOVALNET_ACCOUNT'                        => '<br>Account holder: ',
    'NOVALNET_AMOUNT'                         => '<br>Amount: ',
    'NOVALNET_INVOICE_MULTI_REFERENCE'        => '<br>Payment Reference %s: ',
    'NOVALNET_ORDER_NO'                       => 'Order number ',

    'NOVALNET_INVALID_STATUS'                         => 'Please select status',
    'NOVALNET_INVALID_AMOUNT'                         => 'The amount is invalid',
    'NOVALNET_INVALID_DUEDATE'                        => 'Invalid due date',
    'NOVALNET_INVALID_PAST_DUEDATE'                   => 'The date should be in future',
    'NOVALNET_INVALID_GUARANTEE_MINIMUM_AMOUNT_ERROR' => 'The minimum amount should be at least 9,99 EUR',
    'NOVALNET_CONFIRM_CAPTURE'                        => 'Are you sure you want to capture the payment?',
    'NOVALNET_CONFIRM_CANCEL'                         => 'Are you sure you want to cancel the payment?',
    'NOVALNET_CONFIRM_AMOUNT_UPDATE'                  => 'Are you sure you want to change the order amount?',
    'NOVALNET_CONFIRM_DUEDATE_UPDATE'                 => 'Are you sure you want to change the order amount / due date?',
    'NOVALNET_CONFIRM_REFUND'                         => 'Are you sure you want to refund the amount?',
    'NOVALNET_CONFIRM_BOOKED'                         => 'Are you sure you want to book the order amount?',

    'NOVALNET_BOOK_AMOUNT_TITLE'                      => 'Book transaction',
    'NOVALNET_BOOK_AMOUNT_LABEL'                      => 'Transaction booking amount',
    'NOVALNET_AMOUNT_BOOKED_MESSAGE'                  => '<br><br>Your order has been booked with the amount of %s. Your new TID for the booked amount: %s',
    'NOVALNET_INVALID_CONFIG_ERROR'                   => 'Please fill in all the mandatory fields',
    'NOVALNET_INVALID_SEPA_CONFIG_ERROR'              => 'SEPA Due date is not valid ',
    'NOVALNET_PREPAYMENT_INVALID_DUE_DATE_ERROR'      => 'Please enter valid due date',
    'NOVALNET_DEFAULT_ERROR_MESSAGE'                  => 'Payment was not successful. An error occurred',
    'NOVALNET_IFRAME_CONFIGURATION_TITLE'             => 'Form appearance',
    'NOVALNET_IFRAME_LABEL'                           => 'Label',
    'NOVALNET_IFRAME_INPUT_FIELD'                     => 'Input',
    'NOVALNET_IFRAME_STYLE_CONFIGURATION_TITLE'       => 'CSS settings for Credit Card iframe',
    'NOVALNET_IFRAME_CSS'                             => 'CSS Text',
    'NOVALNET_BARZAHLEN'                              => 'Novalnet Barzahlen/viacash',
    'NOVALNET_BARZAHLEN_DUE_DATE_TITLE'               => 'Slip expiry date (in days)',
    'NOVALNET_BARZAHLEN_DUE_DATE_DESCRIPTION'         => 'Enter the number of days to pay the amount at store near you. If the field is empty, 14 days will be set as default',
    'NOVALNET_BARZAHLEN_DUE_DATE_UPDATE_TITLE'        => 'Change the amount / slip expiry date',
    'NOVALNET_BARZAHLEN_DUE_DATE_LABEL'               => 'Slip expiry date',
    'NOVALNET_BARZAHLEN_DUE_DATE'                     => '<br>Slip expiry date: ',
    'NOVALNET_BARZAHLEN_PAYMENT_STORE'                => '<br><br>Store(s) near you<br><br>',
    'NOVALNET_CONFIRM_SLIPDATE_UPDATE'                => 'Are you sure you want to change the order amount / slip expiry date?',
    'NOVALNET_INVALID_SLIPEDATE'                      => 'Please enter valid slip expiry date ',
    'NOVALNET_AMOUNT_DATE_UPDATED_MESSAGE'            => '<br><br><br>The transaction has been updated with amount %s and due date %s',
    'NOVALNET_AMOUNT_SLIP_EXPIRY_DATE_UPDATED_MESSAGE' => '<br><br><br>The transaction has been updated with amount %s and slip expiry date with %s',
    'NOVALNET_ADMIN_MENU'                             => 'Novalnet updates',
    'NOVALNET_ADMIN_UPDATE_VERSION'                   => '<h2><b>Novalnet Payment Module V11.4.4</b></h2>',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE'                       =>'Thank you for updating to the latest version of Novalnet Payment Modules. This version introduces some great new features and enhancements.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_IT'                    =>'We hope you enjoy it!',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_KEY'                   =>'Product Activation Key',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_KEY_DESC'              =>'Novalnet introduces Product Activation Key to fill entire merchant credentials automatically on entering the key into the Novalnet Global Configuration.To get the Product Activation Key',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_IP'                    =>'IP Address Configuration',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_IP_DESC'               =>'For all API access (Auto configuration with Product Activation Key, loading Credit Card iframe, Transaction API access, Transaction status enquiry, and update), it is required to configure a server IP address in Novalnet Admin Portal.',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_VENDOR_URL'            =>'Update of Notification & Webhook URL',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_VENDOR_URL_DESC'       =>'Notification & Webhook URL is required to keep the merchant’s database/system up-to-date and synchronized with Novalnet transaction status. It is mandatory to configure the Notification & Webhook URL in Novalnet Admin Portal.Novalnet system (via asynchronous) will transmit the information on each transaction and its status to the merchant’s system.',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_ONE_CLICK'             =>'One Click Shopping',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_ONE_CLICK_DESC'        =>'Want your customers to make an order with a single click? With Novalnet payment module, they can! This feature can make the end customer to make order more conveniently with saved account/card details.',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_ZERO_AMOUNT'           =>'Zero Amount Booking',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_ZERO_AMOUNT_DESC'      =>'Zero amount booking feature makes it possible for the merchant to sell variable amount product in the shop. Order will be processed with Zero amount initially, then the merchant can book the order amount later to complete the transaction.',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_CC_IFRAME'             =>'Credit Card Responsive Iframe',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_CC_IFRAME_DESC'        =>'Now, we have updated the Credit Card with the most dynamic features. With the little bit of code, we have made the Credit Card iframe content responsive friendly.The merchant can customize the CSS settings of the Credit Card iframe form.',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_KEY_DESCS'             =>'To get the Product Activation Key, please go to <a href=https://admin.novalnet.de target=_blank>Novalnet Admin Portal</a> - PROJECTS: Project Information - Shop Parameters: API Signature (Product activation key).',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_IP_DESCS'              =>'To configure an IP address, go to <a href=https://admin.novalnet.de target=_blank>Novalnet Admin Portal</a> - PROJECTS: Project Information - Project Overview: Payment Request IP\'s - Update Payment Request IP.',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_VENDOR_URL_DESCS'      =>'To configure Vendor Script URL, go to <a href=https://admin.novalnet.de target=_blank>Novalnet Admin Portal</a> - PROJECTS: Project Information - Project Overview - Vendor script URL / Notification & Webhook URL.',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_MORE'                  =>' But wait, there\'s more!',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_PAYPAL'                =>'PayPal',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_PAYPAL_DESE'           =>'To proceed transaction in PayPal payment, it is required to configure PayPal API details in Novalnet Admin Portal.',
    'NOVALNET_ADMIN_CONFIG_PAYMENT_MODULE_UPDATE_PAYPAL_DESES'          =>'To configure Paypal API details, please go to <a href=https://admin.novalnet.de target=_blank>Novalnet Admin Portal</a> - PROJECTS: Project Information - Payment Methods: Paypal - Configure.',

    'NOVALNET_PAYMENT_ACTION_TITLE'                                     => 'Payment action',
    'NOVALNET_PAYMENT_ACTION_DESCRIPTION'                               => 'Choose whether or not the payment should be charged immediately. Capture completes the transaction by transferring the funds from buyer account to merchant account. Authorize verifies payment details and reserves funds to capture it later, giving time for the merchant to decide on the order',
    'NOVALNET_CONFIG_IP_ERROR1'         => 'You need to configure your outgoing server IP address ',
    'NOVALNET_CONFIG_IP_ERROR2'         =>' at Novalnet. Please configure it in Novalnet admin portal or contact technic@novalnet.de',
    'NOVALNET_INVOICE_MULTI_REF_DESCRIPTION'            => '<br>Please use any one of the following references as the payment reference, as only through this way your payment is matched and assigned to the order:',
    'NOVALNET_PAYMENT_REFERENCE_1'                      => '<br>Payment Reference 1: ',
    'NOVALNET_PAYMENT_REFERENCE_2'                      => '<br>Payment Reference 2: ',
    'NOVALNET_IBAN'                                     => '<br>IBAN: ',
    'NOVALNET_BIC'                                      => '<br>BIC: ',
    'NOVALNET_BANK'                                     => '<br>Bank: ',
    'NOVALNET_ORDER_CONFIRMATION'                       => 'Order Confirmation - Your Order ',
    'NOVALNET_ORDER_CONFIRMATION1'                      => ' with ',
    'NOVALNET_ORDER_CONFIRMATION2'                      => ' has been confirmed',
    'NOVALNET_ORDER_CONFIRMATION3'                      => 'We are pleased to inform you that your order has been confirmed',
    'NOVALNET_PAYMENT_INFORMATION'                      => 'Payment Information:',
    'NOVALNET_PAYMENT_GUARANTEE_COMMENTS'               => 'This is processed as a guarantee payment<br>',
    'NOVALNET_PAYMENT_ACTION_CAPTURE'            => 'Capture',
    'NOVALNET_PAYMENT_ACTION_AUTHORIZE'          => 'Authorize',
];
?>
