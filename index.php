<?php

Kirby::plugin('schnti/plausible', [
	'areas' => [
		'plausible' => function ($kirby) {
			return [
				'label' => 'Analytics',
				'icon' => 'chart',
				'disabled' => false,
				'menu' => true,
				'link' => 'plausible',
				'views' => [
					[
						'pattern' => 'plausible',
						'action'  => function () {
							return [
								'component' => 'k-plausible-view',
								'title' => 'Analytics',
								'props' => [
									'sharedLink' => (option('schnti.plausible', [])['sharedLink'] ?? null)
								],
							];
						}
					]
				]
			];
		}
	],
	'snippets' => [
		'plausible' => __DIR__ . '/snippets/plausible.php'
	]
]);
