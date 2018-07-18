<?php

namespace App\Http\Requests;

use App\Project;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $result = ['status' => 'error' ,'data' => implode(PHP_EOL ,$validator->errors()->all())];
        throw new HttpResponseException(response()->json($result, 200));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(\Request::route()->getName() == 'admin.projects') {
            return [
                'ar_name' => 'required',
                'en_name' => 'required',
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:20000',
                'location_id' => 'not_in:0',
                'ar_description' => 'required',
                'en_description' => 'required'
            ];
        }else{
            return [
                'ar_name' => 'required',
                'en_name' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:20000',
                'location_id' => 'not_in:0',
                'ar_description' => 'required',
                'en_description' => 'required'
            ];
        }
    }

    public function messages()
    {
        if(\Request::route()->getName() == 'admin.projects') {
            return [
                'ar_name.required' => 'Please enter project name in arabic',
                'en_name.required' => 'Please enter project name in english',
                'image.required' => 'You must upload an image',
                'image.image' => 'Please enter image',
                'image.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
                'image.max' => ' Image size should be less than 2MB',
                'ar_description.required' => 'Please enter project description in arabic',
                'en_description.required' => 'Please enter project description in english',
                'location_id.not_in' => 'You must select a location'
            ];
        }else{
            return [
                'ar_name.required' => 'Please enter project name in arabic',
                'en_name.required' => 'Please enter project name in english',
                'image.image' => 'Please enter image',
                'image.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
                'image.max' => ' Image size should be less than 2MB',
                'ar_description.required' => 'Please enter project description in arabic',
                'en_description.required' => 'Please enter project description in english',
                'location_id.not_in' => 'You must select a location'
            ];
        }
    }

    public function store(){
        $project = new Project();

        $file = $this->image;
        $destination = storage_path('uploads/projects');

        if (!empty($file)) {
//            @unlink($destination . "/{$event->image}");
            $project->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $project->image);
            Image::make($destination.'/'.$project->image)->resize(262 ,309)->save($destination.'/'.$project->image);
        }

        $project->location_id = $this->location_id;
        $project->slug = str_slug($this->en_name);

        if ($project->save()){
            $project->details()->create([
                'name' => $this->en_name,
                'description' => $this->en_description,
                'lang' => 'en'
            ]);

            $project->details()->create([
                'name' => $this->ar_name,
                'description' => $this->ar_description,
                'lang' => 'ar'
            ]);
        }
    }

    public function edit($id){
        $project = Project::find($id);

        $file = $this->image;
        $destination = storage_path('uploads/projects');

        if (!empty($file)) {
            @unlink($destination . "/{$project->image}");
            $project->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $project->image);
            Image::make($destination.'/'.$project->image)->resize(262 ,309)->save($destination.'/'.$project->image);
        }

        $project->location_id = $this->location_id;

        $project->save();

        $project->english()->update([
            'name' => $this->en_name,
            'description' => $this->en_description
        ]);

        $project->arabic()->update([
            'name' => $this->ar_name,
            'description' => $this->ar_description
        ]);

    }
}
