<?php

class ReagentController extends BaseController {

	public function add()
	{
		$relationship = DB::table('relationship')->lists('title');
		return View::make('reagent.addReagent')->with('relationship', $relationship);
	}


	public function store()
	{
		$newReagent = Input::all();
		
		$rules = array(
			'name'  		    =>  'required|min:3',
			'family' 		    =>  'required|min:3',
			'gender' 		    =>  'required',
			'address'		    =>  'required|',
			'mobile'		    =>  'required|numeric',
			'shsh' 			    =>  'required|numeric',
			'nationalCode'   	=>  'numeric',
			'fatherName' 	    =>  'required',
			'relationShipId'  	=>  'required'
    	);

    	$messages = array(
		    'same'          => 'فیلد ":attribute" باید با فیلد ":other" یکسان باشد.',
		    'required'      => 'پر کردن فیلد ":attribute" اجباری می باشد ',
		    'min'           => 'فیلد ":attribute" حداقل باید ":min" کاراکتر باشد.', 
		    "numeric"       => "در فیلد :attribute باید مقدار عددی وارد شود ",
		    'unique'        => 'این ":attribute" قبلا ثبت شده است لطفا نام دیگری را انتخاب نمایید.'
		);				

		$validator = Validator::make($newReagent , $rules , $messages);

		if ($validator->fails())
		{
			$messages = $validator->messages();
			return Redirect::back()->withInput(Input::all())
            	->withErrors($messages);
		}

		$reagent = new Reagent;
		$reagent->name              = Input::get('name');
		$reagent->family            = Input::get('family');
		$reagent->nationalCode      = Input::get('nationalCode');
		$reagent->relationShipId    = Input::get('relationShipId');
		$reagent->fatherName        = Input::get('fatherName');
		$reagent->shsh              = Input::get('shsh');
		$reagent->mobile            = Input::get('mobile');
		$reagent->gender            = Input::get('gender');
		$reagent->address           = Input::get('address');
		if($reagent->save()){
			return Redirect::route('deceasedAdd_step2');
		}
		return Redirect::back()->withInput(Input::all())->with('message','در ذخیره اطلاعات مشکلی پیش آمده است.');
	}

}