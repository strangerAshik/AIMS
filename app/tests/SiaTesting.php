<?php

class SiaTesting extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', 'dashboard');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

}
