=== ABE - CAF Donate ===
Contributors: Abigegg
Tags: donations, charity, caf
Requires at least: 4.7
Tested up to: 5.5
Stable tag: 4.3
Requires PHP: 7.0
License: MIT
License URI: https://opensource.org/licenses/MIT

This is a really simple plugin which makes it easy to generate URLs for the CAF donation system. 

For example, you might have a donate button on your site that lets users select from pre-defined amounts - £5, £10, £25 etc. This plugin lets you generate a URL for each amount so you can direct your user to a CAF form pre-filled with the correct parameters.

== Setup ==

1. Install and activate the plugin.
2. Go to Settings > CAF Donations and enter your charity's donation URL in the box. This normally looks like this: https://cafdonate.cafonline.org/10805
3. Now you can generate donation URLs in your code using the abe_caf_get_donation_link() function! See below.
 
== Example usage ==

Once you've set up the plugin and entered your charity's CAF url, you can call the `abe_caf_get_donation_link` function like so:

`
abecaf_get_donation_link( $amount, $regular );
`


Generate the URL to make a one-off £10 donation:
`
abecaf_get_donation_link( 10, false );

// "https://cafdonate.cafonline.org/10742?caf_donationamount=10&caf_paymenttype=single"
`


Generate the URL to make a recurring £25 donation:
`
abecaf_get_donation_link( 25, true );

// "https://cafdonate.cafonline.org/10742?caf_donationamount=25&caf_paymenttype=regular"
`

== License == 

Copyright 2020 A Big Egg (David Hewitson Ltd)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.