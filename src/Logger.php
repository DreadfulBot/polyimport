<?php

namespace Riskyworks\Polyimport;

use Logging\ALog;

class Logger extends ALog
{
	public function logs_root_folder(): string
	{
		return constant('PI_PLUGIN_PATH') . 'logs';
	}

	public function get_site_url(): ?string
	{
		return null;
	}
}
