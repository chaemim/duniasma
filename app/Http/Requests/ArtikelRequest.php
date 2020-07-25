<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArtikelRequest extends Request
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
          'id_kategori' => 'required',
          'id_admin' => 'required',
          'featured_img' => 'mimes:jpg,jpeg,png|max:2000',
        ];
    }

    public function messages()
    {
        return [
          'title.required'    => 'Title harus diisi.',
          'deskripsi.required'    => 'Deskripsi harus diisi.',
          'deskripsi.min'    => 'Deskripsi harus lebih dari 5 kata.',
          'id_kategori.required' => 'ID Kategori harus diisi .',
          'id_admin.required' => 'ID Admin harus diisi .',
          'featured_img.mimes' => 'Format : Jpg , Jpeg dan png',
          'featured_img.max' => 'Max : 2 Mb'
        ];
    }
}
