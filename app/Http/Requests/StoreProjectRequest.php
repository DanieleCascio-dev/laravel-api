<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=> ['required', 'max:250', 'min:4'],
            'description' => ['max:5000'],
            'type_id'=>'nullable',
            'technologies'=>'exists:technologies,id'

        ];
    }

    public function message(){
        return [
            'title.required'=>'A title is reuired!',
            'title.max'=> 'Title max lenght is 250 chars!',
            'title.min'=> 'Title min lenght is 4 chars!',
            'description.max'=> 'Description max lenght is 5000 chars!',
            'technologies.exists'=>'The tehcnologies you have selected does not exist!'
            
        ];
    }
}
