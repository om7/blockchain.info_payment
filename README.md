# blockchain.info_payment
Php script that can send a bitcoin payment using the blockchain.info api

USER BEWARE:
Every time you run this script, it WILL send bitcoin to the target address specified.
So please use with caution, as there is no way to get your bitcoin back if you
send it by accident.

To use, simply change the following params:
$walletID = YOUR_WALLET_ADDRESS;
$password = YOUR_PASSWORD;

// The amount of bitcoin you want to send
$value = 17;
// Target payment address
$address = '1BYe1cDZMfJw7tqu27p7AG8mcjUBsdPhYy';

Then run the script.
