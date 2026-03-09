<?php
/**
 * Populate ACF values for new/changed fields (visual-fixes-v5b).
 *
 * Run with: wp eval-file wp-content/themes/profitsoft/populate-acf-values.php
 *
 * Only updates fields that are currently empty OR badge_text fields
 * that still contain emoji prefixes. Safe to run multiple times.
 */

if ( ! defined( 'ABSPATH' ) ) {
	echo "Run this script via WP-CLI: wp eval-file <path>\n";
	exit;
}

$front_page_id = (int) get_option( 'page_on_front' );
if ( ! $front_page_id ) {
	echo "Error: No front page set.\n";
	exit;
}

$languages = [ 'uk', 'en', 'de' ];

// --- SVG icons for feature badges ---
$icon_gear   = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M6.5 2.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm5 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM4 6.5A1.5 1.5 0 1 1 2.5 5 1.5 1.5 0 0 1 4 6.5zm2.5 0A1.5 1.5 0 1 1 5 5a1.5 1.5 0 0 1 1.5 1.5zm5 0A1.5 1.5 0 1 1 10 5a1.5 1.5 0 0 1 1.5 1.5zM6.5 13.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm5 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM14 6.5A1.5 1.5 0 1 1 12.5 5 1.5 1.5 0 0 1 14 6.5z"/></svg>';
$icon_chart  = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M1 14h2V6H1v8zm4 0h2V2H5v12zm4 0h2V8H9v6zm4 0h2V4h-2v10z"/></svg>';
$icon_link   = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M4.7 8.7l-2-2a1 1 0 0 0-1.4 1.4l2.7 2.7a1 1 0 0 0 1.4 0l2.7-2.7a1 1 0 0 0-1.4-1.4l-2 2zM11.3 7.3l2 2a1 1 0 0 1-1.4 1.4L9.2 8a1 1 0 0 1 0-1.4l2.7-2.7a1 1 0 0 1 1.4 1.4l-2 2z"/></svg>';
$icon_shield = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M8 1L2 4.5v4c0 3.5 2.6 6.4 6 7.5 3.4-1.1 6-4 6-7.5v-4L8 1zm0 2.2l4 2.3v3c0 2.6-1.9 4.8-4 5.7-2.1-.9-4-3.1-4-5.7v-3l4-2.3z"/></svg>';

// --- Per-language values ---
$values = [
	'uk' => [
		// characteristics_section.section_blocks[].badge_text (overwrite to remove emoji)
		'badge_texts' => [ 'Гнучкість', 'Аналітика', 'Інтеграції', 'Безпека' ],
		// characteristics_section.section_blocks[].badge_icon (new field)
		'badge_icons' => [ $icon_gear, $icon_chart, $icon_link, $icon_shield ],
		// characteristics_section.section_blocks[].text (shortened descriptions)
		'characteristics_texts' => [
			'Будь-який страховий продукт, схему нарахувань, процеси андеррайтингу та врегулювання можна налаштувати через конфігуратори без доопрацювання системи.',
			'Повна відповідність вимогам НБУ відповідно до Закону «Про страхування» (№ 1909-IX). Автоматичне формування звітності, інтеграція з державними реєстрами, підтримка електронних підписів та облік за лініями бізнесу.',
			'Автоматичний розрахунок нарахувань при будь-яких сценаріях: часткова оплата, розірвання, переукладення договору. Комісійні, повернення та звітність формуються коректно без ручного втручання.',
			'Вхід через браузер з підтримкою доменної авторизації (Active Directory). Гнучка рольова модель доступу: кожна дія доступна лише користувачам з відповідними дозволами.',
		],
		// modules_section.tiles[].description (new field)
		'module_descriptions' => [
			'Управління продажами, калькулятори, оформлення договорів',
			'Оцінка ризиків, затвердження умов, управління тарифами',
			'Автоматичний розрахунок та виплата комісій агентам',
			'Обробка збитків, виплати, регресні вимоги',
			'Контроль фінансових операцій відповідно до законодавства',
			'Добровільне медичне страхування та управління полісами',
			'Управління договорами перестрахування та розрахунками',
			'Бухгалтерський облік, звітність, управління фінансами',
		],
		// prices_section — card titles & descriptions
		'pricing_license_title' => 'Ліцензія',
		'pricing_license_text'  => 'На право безстрокового використання КСАСК «ProfITsoft»',
		'pricing_dev_title'     => 'Команда інженерів',
		'pricing_dev_text'      => 'Для доопрацювання КСАСК «ProfITsoft». Якщо потрібна більша команда, вартість збільшуватиметься.',
	],
	'en' => [
		'badge_texts' => [ 'Flexibility', 'Analytics', 'Integrations', 'Security' ],
		'badge_icons' => [ $icon_gear, $icon_chart, $icon_link, $icon_shield ],
		'characteristics_texts' => [
			'Description in English',
			'Description in English',
			'Description in English',
			'Description in English',
		],
		'module_descriptions' => [
			'Description in English',
			'Description in English',
			'Description in English',
			'Description in English',
			'Description in English',
			'Description in English',
			'Description in English',
			'Description in English',
		],
		'pricing_license_title' => 'License',
		'pricing_license_text'  => 'Description in English',
		'pricing_dev_title'     => 'Engineering Team',
		'pricing_dev_text'      => 'Description in English',
	],
	'de' => [
		'badge_texts' => [ 'Flexibilität', 'Analytik', 'Integrationen', 'Sicherheit' ],
		'badge_icons' => [ $icon_gear, $icon_chart, $icon_link, $icon_shield ],
		'characteristics_texts' => [
			'Beschreibung auf Deutsch',
			'Beschreibung auf Deutsch',
			'Beschreibung auf Deutsch',
			'Beschreibung auf Deutsch',
		],
		'module_descriptions' => [
			'Beschreibung auf Deutsch',
			'Beschreibung auf Deutsch',
			'Beschreibung auf Deutsch',
			'Beschreibung auf Deutsch',
			'Beschreibung auf Deutsch',
			'Beschreibung auf Deutsch',
			'Beschreibung auf Deutsch',
			'Beschreibung auf Deutsch',
		],
		'pricing_license_title' => 'Lizenz',
		'pricing_license_text'  => 'Beschreibung auf Deutsch',
		'pricing_dev_title'     => 'Ingenieurteam',
		'pricing_dev_text'      => 'Beschreibung auf Deutsch',
	],
];

foreach ( $languages as $lang ) {
	if ( ! function_exists( 'pll_get_post' ) ) {
		echo "Polylang not active. Falling back to front page ID only.\n";
		$page_id = $front_page_id;
	} else {
		$page_id = pll_get_post( $front_page_id, $lang );
	}

	if ( ! $page_id ) {
		echo "No page for $lang — skipping.\n";
		continue;
	}

	$lang_values = $values[ $lang ];
	$updated     = 0;

	// --- Update characteristics_section.section_blocks ---
	$char_section = get_field( 'characteristics_section', $page_id );
	$blocks       = ! empty( $char_section['section_blocks'] ) ? $char_section['section_blocks'] : [];

	if ( $blocks ) {
		$changed = false;
		foreach ( $blocks as $i => &$block ) {
			// badge_icon — only set if empty
			if ( empty( $block['badge_icon'] ) && isset( $lang_values['badge_icons'][ $i ] ) ) {
				$block['badge_icon'] = $lang_values['badge_icons'][ $i ];
				$changed = true;
				$updated++;
			}
			// badge_text — overwrite if it contains emoji (starts with non-ASCII)
			if ( isset( $lang_values['badge_texts'][ $i ] ) ) {
				$current = trim( $block['badge_text'] ?? '' );
				if ( empty( $current ) || preg_match( '/^[\x{1F000}-\x{1FFFF}]/u', $current ) ) {
					$block['badge_text'] = $lang_values['badge_texts'][ $i ];
					$changed = true;
					$updated++;
				}
			}
			// text — always overwrite with shortened descriptions
			if ( isset( $lang_values['characteristics_texts'][ $i ] ) ) {
				$block['text'] = $lang_values['characteristics_texts'][ $i ];
				$changed = true;
				$updated++;
			}
		}
		unset( $block );

		if ( $changed ) {
			$char_section['section_blocks'] = $blocks;
			update_field( 'characteristics_section', $char_section, $page_id );
		}
	}

	// --- Update modules_section.tiles[].description ---
	$modules_section = get_field( 'modules_section', $page_id );
	$tiles           = ! empty( $modules_section['tiles'] ) ? $modules_section['tiles'] : [];

	if ( $tiles ) {
		$changed = false;
		foreach ( $tiles as $i => &$tile ) {
			if ( empty( $tile['description'] ) && isset( $lang_values['module_descriptions'][ $i ] ) ) {
				$tile['description'] = $lang_values['module_descriptions'][ $i ];
				$changed = true;
				$updated++;
			}
		}
		unset( $tile );

		if ( $changed ) {
			$modules_section['tiles'] = $tiles;
			update_field( 'modules_section', $modules_section, $page_id );
		}
	}

	// --- Update prices_section — card titles & descriptions ---
	$prices_section = get_field( 'prices_section', $page_id );

	if ( $prices_section ) {
		$changed = false;

		// License card (prices_list[0])
		if ( ! empty( $prices_section['prices_list'][0] ) ) {
			$prices_section['prices_list'][0]['title'] = $lang_values['pricing_license_title'];
			$prices_section['prices_list'][0]['text']  = $lang_values['pricing_license_text'];
			$changed = true;
			$updated += 2;
		}

		// Dev support card (prices_list_for_dev[0])
		if ( ! empty( $prices_section['prices_list_for_dev'][0] ) ) {
			$prices_section['prices_list_for_dev'][0]['title'] = $lang_values['pricing_dev_title'];
			$prices_section['prices_list_for_dev'][0]['text']  = $lang_values['pricing_dev_text'];
			$changed = true;
			$updated += 2;
		}

		if ( $changed ) {
			update_field( 'prices_section', $prices_section, $page_id );
		}
	}

	echo "Updated $lang (page $page_id): $updated fields.\n";
}

echo "Done.\n";
