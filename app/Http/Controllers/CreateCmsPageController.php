<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CmsPages;
use Session;
use App\Employees;
use Auth;

class CreateCmsPageController extends Controller {

	public function index() {
		$id = Auth::user()->id;
		$user = Employees::getUser($id);
		
		return view('createCmsPage')->with('user', $user)->with('route', 'logout')->with('route_name', 'Logout');
	}

	public function validateRequest($request) {
		$messages = [
			'url.required' => '* Url is required',
			'url.alpha' => '* Conatins only Alphabet',
			'url.min' => '* Url must be between 8 to 12',
			'url.max' => '* Url must be between 8 to 12',
			'content.required' => '* Content is required',
		];

		$rules = [
			'url' => 'required|alpha|min:2|max:30',
			'content' => 'required',
		];
		return $this->validate($request, $rules ,$messages);	
	}

	public function create(Request $request) {
		$this->validateRequest($request);

		$insertStatus = CmsPages::saveCmsPage($request);

		if($insertStatus) {
			$request->session()->flash('alert-success', 'Data suuccessfully inserted');

			return redirect()->route('cms_page');
		} else {
			$request->session()->flash('alert-danger', 'Something went Wrong');

			return redirect()->route('cms_page');
		}
	}

	public function view($url) {
		$id = Auth::user()->id;
		$user = Employees::getUser($id);

		$page = CmsPages::select('content')->where('url', $url)->firstOrFail();
		$content = $page['content'];

		return view('cmsPageShow')->with('content', $content)->with('user', $user)->with('route', 'logout')->with('route_name', 'Logout');
	}

	public function viewPageList() {

		$id = Auth::user()->id;
		$user = Employees::getUser($id);

		$getAllPageList = CmsPages::select('id','url', 'content')->get();
		
		return view('pagesDashboard')->with('getAllPageList',$getAllPageList)->with('user', $user)->with('route', 'logout')->with('route_name', 'Logout');
	}

	public function viewEditPage(Request $request) {

		$id = Auth::user()->id;
		$user = Employees::getUser($id);

		$getPageDetails = CmsPages::select('url', 'content')->where('id', $request['id'])->first();

		if($getPageDetails) {
			return view('createCmsPage')->with('getPageDetails', $getPageDetails)->with('user', $user)->with('route', 'logout')->with('route_name', 'Logout');
		} else {
			Session::flash('alert-danger', 'Something went wrong!');
			return view('createCmsPage')->with('route', 'logout')->with('route_name', 'Logout');
		}	
	}

	public function deletePage(Request $request) {

		$id = CmsPages::find($request['page_id']);
		if($id->delete()) {
			 $request->session()->flash('alert-success', 'Page was successful deleted!');
			return redirect()->route("view_page_list");
		} else {
			$request->session()->flash('alert-danger', 'Something went wrong');
			return redirect()->route("view_page_list");
		}


	}
}
