<?php

namespace Riskyworks\Polyimport\SetProductLanguage;

use Riskyworks\Polyimport\SetProductLanguage\SetProductLanguageHandler;

class SetProductLanguageAction
{
	public function __construct()
	{
		add_action('admin_post_pi_set_product_language', [$this, 'SetProductsLanguages']);
	}

	public function SetProductsLanguages(): void
	{
		(new SetProductLanguageHandler())->handle();

		$callback_url = filter_input(INPUT_POST, 'callback_url', FILTER_VALIDATE_URL);

		if ($callback_url) {
			wp_redirect($callback_url);
		} else {
			wp_redirect(admin_url());
		}
	}
}
