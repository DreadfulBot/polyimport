<?php

namespace Riskyworks\Polyimport\SetProductLanguage;

use Riskyworks\Polyimport\Core\BasicHandler;

class SetProductLanguageHandler extends BasicHandler
{
	/**
	 * SetProductLanguageHandler constructor.
	 */
	public function __construct() {}

	public function handle(): void
	{
		// loop through all products
		// get all products

		$products = wc_get_products([
			'limit' => -1,
		]);

		foreach ($products as $product) {
			// get acf field pl_lang for this product

			$pl_lang = get_field('pl_lang', $product->get_id());

			if (!$pl_lang) {
				continue;
			}

			// @phpstan-ignore-next-line
			pll_set_post_language($product->get_id(), $pl_lang);
		}
	}
}
