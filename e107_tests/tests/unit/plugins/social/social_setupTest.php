<?php
/**
 * e107 website system
 *
 * Copyright (C) 2008-2020 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 */

class social_setupTest extends \Codeception\Test\Unit
{
	public function _before()
	{
		include_once(e_PLUGIN . "social/SocialLoginConfigManager.php");
		include_once(e_PLUGIN . "social/social_setup.php");
	}

	public function testUpgradeProviderNameNormalization()
	{
		e107::getConfig()->set(SocialLoginConfigManager::SOCIAL_LOGIN_PREF, SOCIAL_LOGIN_LEGACY_DATA);
		$social_setup = new social_setup();
		$this->assertTrue($social_setup->upgrade_required());
		$this->assertIsArray(e107::getConfig()->getPref(SocialLoginConfigManager::SOCIAL_LOGIN_PREF . "/AOL"));
		$this->assertIsNotArray(e107::getConfig()->getPref(SocialLoginConfigManager::SOCIAL_LOGIN_PREF . "/AOL-OpenID"));

		$social_setup->upgrade_pre();
		$this->assertFalse($social_setup->upgrade_required());
		$this->assertIsNotArray(e107::getConfig()->getPref(SocialLoginConfigManager::SOCIAL_LOGIN_PREF . "/AOL"));
		$this->assertIsArray(e107::getConfig()->getPref(SocialLoginConfigManager::SOCIAL_LOGIN_PREF . "/AOL-OpenID"));
	}

	/**
	 * @see https://github.com/e107inc/e107/pull/4099#issuecomment-590579521
	 */
	public function testUpgradeFixSteamXupBug()
	{
		$db = e107::getDb();
		$db->insert('user', [
			'user_loginname' => 'SteambB8047',
			'user_password' => '$2y$10$.u22u/U392cUhvJm2DJ57.wsKtxKKj3WsZ.x6LsXoUVHVuprZGgUu',
			'user_email' => '',
			'user_xup' => 'Steam_https://steamcommunity.com/openid/id/76561198006790310',
		]);
		$insertId = $db->lastInsertId();

		$social_setup = new social_setup();
		$this->assertTrue($social_setup->upgrade_required());
		$social_setup->upgrade_pre();

		$result = $db->retrieve('user', '*', 'user_id=' . $insertId);
		$this->assertEquals('Steam_76561198006790310', $result['user_xup']);
		$this->assertFalse($social_setup->upgrade_required());
	}
}
const SOCIAL_LOGIN_LEGACY_DATA =
array(
	'FakeProviderNeverExisted' =>
		array(
			'enabled' => '1',
		),
	'AOL' =>
		array(
			'enabled' => '1',
		),
	'Facebook' =>
		array(
			'keys' =>
				array(
					'id' => 'a',
					'secret' => 'b',
				),
			'scope' => 'c',
			'enabled' => '1',
		),
	'Foursquare' =>
		array(
			'keys' =>
				array(
					'id' => 'a',
					'secret' => 'b',
				),
			'enabled' => '1',
		),
	'Github' =>
		array(
			'keys' =>
				array(
					'id' => 'a',
					'secret' => 'b',
				),
			'scope' => 'c',
			'enabled' => '1',
		),
	'Google' =>
		array(
			'keys' =>
				array(
					'id' => 'a',
					'secret' => 'b',
				),
			'scope' => 'c',
			'enabled' => '1',
		),
	'LinkedIn' =>
		array(
			'keys' =>
				array(
					'id' => 'a',
					'secret' => 'b',
				),
			'enabled' => '1',
		),
	'Live' =>
		array(
			'keys' =>
				array(
					'id' => 'a',
					'secret' => 'b',
				),
			'enabled' => '1',
		),
	'OpenID' =>
		array(
			'enabled' => '1',
		),
	'Steam' =>
		array(
			'keys' =>
				array(
					'key' => 'a',
				),
			'enabled' => '1',
		),
	'Twitter' =>
		array(
			'keys' =>
				array(
					'key' => 'a',
					'secret' => 'b',
				),
			'enabled' => '1',
		),
	'Yahoo' =>
		array(
			'keys' =>
				array(
					'id' => 'a',
					'secret' => 'b',
				),
			'enabled' => '1',
		),
);