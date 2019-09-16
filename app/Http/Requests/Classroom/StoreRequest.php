<?php

namespace App\Http\Requests\Classroom;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'class' => 'required|unique:classrooms',
        ];
    }

    protected function getValidatorInstance()
    {
        $data = $this->all();
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWQYZ';
        $data['slug'] = substr(str_shuffle($permitted_chars), 0, 6);

        $this->getInputSource()->replace($data);
        return parent::getValidatorInstance();
    }
}
