<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsPages extends Model
{
    protected $table = 'cms_pages'; 
	protected $fillable = ['url', 'content'];

	public static function saveCmsPage($data) {
		try {
			$insertData = CmsPages::updateOrCreate(['url' => $data['url']], ['url' => $data['url'], 'content' => $data['content']]
			);

			if($insertData){
				return true;	
			} else {
				return false;
			}
		}
		catch (\Exception $exception) {
			Log::error('Error in saveCmsPage() -> ' . $exception->getMessage());

			return false;
		}
	}
}
