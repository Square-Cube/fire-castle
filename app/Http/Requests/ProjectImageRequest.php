<?php

namespace App\Http\Requests;

use App\ProjectImage;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class ProjectImageRequest extends FormRequest
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
        if(\Request::route()->getName() == 'admin.projects.images') {
            return [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:20000'
            ];
        }else{
            return [
                'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:20000'
            ];
        }
    }

    public function messages()
    {
        if(\Request::route()->getName() == 'admin.projects.images') {
            return [
                'image.required' => 'You must upload an image',
                'image.image' => 'Please enter image',
                'image.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
                'image.max' => ' Image size should be less than 2MB'
            ];
        }else{
            return [
                'image.image' => 'Please enter image',
                'image.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
                'image.max' => ' Image size should be less than 2MB'
            ];
        }
    }

    public function store($id){
        $image = new ProjectImage();

        $file = $this->image;
        $destination = storage_path('uploads/projects');

        if (!empty($file)) {
//            @unlink($destination . "/{$event->image}");
            $image->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $image->image);
            Image::make($destination.'/'.$image->image)->resize(464 ,320)->save($destination.'/'.$image->image);
        }

        $image->project_id = $id;

        $image->save();
    }

    public function edit($id){
        $image = ProjectImage::find($id);

        $file = $this->image;
        $destination = storage_path('uploads/projects');

        if (!empty($file)) {
            @unlink($destination . "/{$image->image}");
            $image->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $image->image);
            Image::make($destination.'/'.$image->image)->resize(464 ,320)->save($destination.'/'.$image->image);
        }

        $image->save();
    }
}
