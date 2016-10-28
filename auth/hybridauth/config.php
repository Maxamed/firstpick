<?php

/**
 * HybridAuth
 * http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
 * (c) 2009-2015, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
 */
// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

return
		array(
			"base_url" => "http://topbins.local/auth/hybridauth/",
			"providers" => array(
				"Google" => array(
					"enabled" => true,
					"keys" => array("id" => "", "secret" => ""),
				),
				"Facebook" => array(
					"enabled" => true,
					"keys" => array("id" => "760229594115367", "secret" => "1b87a49e309931d22c85a19a49f0a4d4"),
					"trustForwarded" => false
				),
				"Twitter" => array(
					"enabled" => true,
					"keys" => array("key" => "cH1dmEiCPbmwHmh1Pa6ux6M8V", "secret" => "dY9IUagodXvkj2ffEPTCjXDsdfa7NNqPCnb9regIHJz73TszEj"),
					"includeEmail" => false
				),
				"Foursquare" => array(
					"enabled" => false,
					"keys" => array("id" => "", "secret" => "")
				),
			),
			// If you want to enable logging, set 'debug_mode' to true.
			// You can also set it to
			// - "error" To log only error messages. Useful in production
			// - "info" To log info and error messages (ignore debug messages)
			"debug_mode" => false,
			// Path to file writable by the web server. Required if 'debug_mode' is not false
			"debug_file" => "",
);
