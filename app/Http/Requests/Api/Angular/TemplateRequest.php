<?php namespace App\Http\Requests\Api\Angular;

use App\Http\Requests\AbstractRequest;

class TemplateRequest extends AbstractRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // The user is always authorized to authenticate.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'template' => 'required',
        ];
    }
}
