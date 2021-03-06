<?php
/**
 * Adds a new Currency symbol and name to Give payment options
 * @since 1.0
 * NOTE: Give supports all currencies that PayPal Standard offers
 * See here: https://developer.paypal.com/docs/classic/api/country_codes/
 * 
 * This adds the currency as an option in your currency settings 
 * and will output in your front-end forms. But it is up to your 
 * Payment Gateway to handle that currency correctly. 
 * This means that even though the form will show your currency, and 
 * you'll see the reports with this currency, your Payment processor 
 * may reflect something different.
 */

/*
 * Adds Costa Rican Colon currency to your Give settings
 */

add_filter('give_currencies', 'add_costarican_currency');

function add_costarican_currency($currencies) {

    $currencies['CRC'] = __( 'Costa Rican Col&oacute;n (&#8353;)', 'give' );

    return $currencies;
}

/*
 * Converts the currency code to the correct HTML character symbol
 * for the form output
 */

add_filter('give_currency_symbol', 'add_colon_symbol', 10,3);

function add_colon_symbol($currency = '') {

    switch ( $currency ) :
        case "CRC" :
            $symbol = '&#8353;';
            break;
    endswitch;

    return $currency;
}
