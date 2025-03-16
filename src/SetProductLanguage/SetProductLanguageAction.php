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
	}
}
