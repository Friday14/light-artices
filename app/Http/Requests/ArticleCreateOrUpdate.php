<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ArticleCreateOrUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:60',
            'short_description' => 'required|min:5|max:100',
            'description' => 'required|min:10|max:500'
        ];
    }
}
