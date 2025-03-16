<?php

namespace Riskyworks\Polyimport\CustomFields;

use Riskyworks\Polyimport\Logger;

class LanguageCF
{
	private Logger $logger;


	public function __construct()
	{
		$this->logger = Logger::forClass(self::class);

		if (function_exists('acf_add_local_field_group')) {
			acf_add_local_field_group(array(
				'key' => 'product_details',
				'title' => 'Product Details',
				'fields' => array(
					array(
						'key' => 'pl_lang',
						'label' => 'Language',
						'name' => 'pl_lang',
						'type' => 'text',
						'instructions' => 'Enter the language of the product',
						'required' => 1,
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'product',
						),
					),
				),
			));
		} else {
			$this->logger->error('ACF plugin is not installed');
		}
	}
}
