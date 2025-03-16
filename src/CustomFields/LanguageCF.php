<?php

namespace Riskyworks\Polyimport\CustomFields;

class LanguageCF
{
	public function __construct()
	{
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
		}
	}
}
