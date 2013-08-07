<?php

class ExampleController extends BaseController 
{
	public function exampleAction()
	{
		return View::make('example_view');
	}

	public function exampleRedirect()
	{
		return Redirect::to('/');
	}

	public function helloWorld()
	{
		return 'Hellow World.';
	}

	public function withObjectAndParameter($objectid)
	{
		$data['object'] = ExObject::find($objectid);
		return View::make('example_view_with_object', $data);
	}

	public function makeObject($intval = 0)
	{
		$an_object = new ExObject;
		$an_object->example_string = 'testing';
		$an_object->example_integer = $intval;
		$an_object->save();
		$data['objectid'] = $an_object->id;
		return View::make('object_created', $data);
	}

	public function deleteObject($objectid)
	{
		$gonner = ExObject::find($objectid);
		$data['objectid'] = $objectid;
		if(is_null($gonner)){
			return View::make('no_object_with_id', $data);
		}else{
			$gonner->delete();
			return View::make('object_deleted', $data);			
		}
	}

	public function makeSmallObject()
	{
		$an_object = new SmallerExampleObject;
		$an_object->example_string = 'Small Guy';
		$an_object->example_integer = 17;
		$an_object->ex_object_id = 1;
		$an_object->save();
		$data['objectid'] = $an_object->id;
		return View::make('object_created', $data);	
	}
}







