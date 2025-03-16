<?php

namespace Riskyworks\Polyimport\SetProductLanguage;

use Riskyworks\Polyimport\Core\BasicHandler;
use Exception;
use WC_Product;

class SetProductLanguageHandler extends BasicHandler
{
	public function __construct(
		private readonly ELanguageSource $language_source
	) {}

	private function get_product_language(WC_Product $product): string
	{
		switch ($this->language_source) {
			case ELanguageSource::ACF:

				if (!function_exists('get_field')) {
					throw new Exception('ACF is not installed');
				}

				return get_field('pl_lang', $product->get_id());
			case ELanguageSource::ATTRIBUTE:
				return $product->get_attribute('pl_lang');
			default:
				throw new Exception('Unknown language source');
		}
	}

	public function handle(): void
	{
		// loop through all products
		// get all products

		$products = wc_get_products([
			'limit' => -1,
		]);

		error_log('Setting product languages for ' . count($products) . ' products');

		foreach ($products as $product) {
			try {
				$pl_lang = $this->get_product_language($product);

				if (!$pl_lang) {
					error_log('No language set for product ' . $product->get_id());
					continue;
				}

				// @phpstan-ignore-next-line
				pll_set_post_language($product->get_id(), strtolower($pl_lang));
				error_log('Set language ' . $pl_lang . ' for product ' . $product->get_id());
			} catch (Exception $ex) {
				error_log($ex);
			}
		}
	}
}
