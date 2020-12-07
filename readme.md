A Big Egg - CAF donate
===

This is a really simple plugin which makes it easy to generate URLs for the CAF donation system. 

For example, you might have a donate button on your site that lets users select from pre-defined amounts - £5, £10, £25 etc. This plugin lets you generate a URL for each amount so you can direct your user to a CAF form pre-filled with the correct parameters.

## Setup

1. Install and activate the plugin.
2. Go to Settings > CAF Donations and enter your charity's donation URL in the box. This normally looks like this: https://cafdonate.cafonline.org/10805
3. Now you can generate donation URLs in your code using the abe_caf_get_donation_link() function! See below.
 
## Example usage

Once you've set up the plugin and entered your charity's CAF url, you can call the `abe_caf_get_donation_link` function like so:

```php
abe_caf_get_donation_link( $amount, $regular );
```


Generate the URL to make a one-off £10 donation:
```php
abe_caf_get_donation_link( 10, false );

// "https://cafdonate.cafonline.org/10742?caf_donationamount=10&caf_paymenttype=single"
```


Generate the URL to make a recurring £25 donation:
```php
abe_caf_get_donation_link( 25, true );

// "https://cafdonate.cafonline.org/10742?caf_donationamount=25&caf_paymenttype=regular"
```