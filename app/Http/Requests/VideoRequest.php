<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VideoRequest extends Request
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
            'title' => 'required',
            'deskripsi' => 'required|min:5',
            'file_video' => 'required',
            'id_kelas' => 'required',
            'id_admin' => 'required',

        ];
    }

    public function messages()
    {
      return [
            'title.required'    => 'Title harus diisi.',
            'deskripsi.required'    => 'Deskripsi harus diisi.',
            'deskripsi.min'    => 'Deskripsi harus lebih dari 5 kata.',
            'file_video.required' => 'File Video harus diisi .',
            'id_kelas.required' => 'ID Kelas harus diisi .',
            'id_admin.required' => 'ID Admin harus diisi .',
      ];
    }
}
