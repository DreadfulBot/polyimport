<?php

namespace Riskyworks\Polyimport\SetProductLanguage;

use Riskyworks\Polyimport\Core\BasicHandler;
use Riskyworks\Polyimport\Logger;
use Exception;

class SetProductLanguageHandler extends BasicHandler
{
	private Logger $logger;
	/**
	 * SetProductLanguageHandler constructor.
	 */
	public function __construct()
	{
		$this->logger = Logger::forClass(self::class);
	}

	public function handle(): void
	{
		// loop through all products
		// get all products

		$products = wc_get_products([
			'limit' => -1,
		]);

		$this->logger->info('Setting product languages for ' . count($products) . ' products');

		foreach ($products as $product) {
			try {
				// get acf field pl_lang for this product
				$pl_lang = get_field('pl_lang', $product->get_id());

				if (!$pl_lang) {
					$this->logger->warning('No language set for product ' . $product->get_id());

					continue;
				}

				// @phpstan-ignore-next-line
				pll_set_post_language($product->get_id(), strtolower($pl_lang));
				$this->logger->info('Set language ' . $pl_lang . ' for product ' . $product->get_id());
			} catch (Exception $ex) {
				$this->logger->exception($ex);
			}
		}
	}
}
