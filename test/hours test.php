  
<?php
//login_form_test.php
include_once 'includes/settings.php';
require_once 'simpletest/autorun.php';
require_once 'simpletest/web_tester.php';

class HoursForm extends WebTestCase {

	  function testCorrectData() {
		$this->get(VIRTUAL_PATH . '/login.php');
		$this->assertResponse(200);

        $this->setField("name", "John");
		$this->setField("password", "john123");
		$this->clickSubmit("Login");

		$this->assertResponse(200);
		$this->assertText("Welcome, John");
	}
	
 	 function testFailedPassword() {
		$this->get(VIRTUAL_PATH . '/login.php');
		$this->assertResponse(200);

		$this->setField("hours", "2");
		$this->setField("rat", "50");//incorrect password
		$this->clickSubmit("Show Pay");

		$this->assertResponse(200);
		$this->assertText("Login and/or password is incorrect");
	}

}
