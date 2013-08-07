<?php

class TestController extends BaseController 
{
	public function oneToOneTest(){
		$main_object = ExObject::find(1);
		$small_object = $main_object->smallerExampleObject;
		return $small_object->example_string;
	}
}

