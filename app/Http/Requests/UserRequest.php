<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
            'name' =>  ['sometimes', "required",'string', Rule::unique('users', 'name')],
            'hoTen' =>  ['sometimes', "required",'string', 'regex:/^[^0-9]+$/'],
            'newEmail' => ['sometimes', "required",'string','email', Rule::unique('users', 'email'),],
            'vaiTro' => ['sometimes', "required", "string"],
            'img' => ['sometimes',"required",'mimes:jpeg,png,jpg,gif,webp','image','max:5120'],
            "diaChi" => ['sometimes', "required", "string"],
            "ghiChu" => ['sometimes', "required",'string', 'max:20'],

            'newName' =>  ['sometimes', "required",'string'],
            'email' => ['sometimes', "required",'string','email'],

            'current_password' => ['sometimes','required',"min:8", 'current_password'],
            'password' => ['sometimes','required', Password::defaults(),"min:8", 'confirmed'],
            'resetPass' => ['sometimes','required',Password::defaults(),"min:8"],

            "danhMuc" =>  ['sometimes', "required",'string', Rule::unique('danh_mucs', 'ten')],
            "danhMucMoi" =>  ['sometimes', "required",'string'],

            "tenSP" => ['sometimes', "required",'string', Rule::unique('san_phams', 'ten')],
            "nhaSX" => ['sometimes', "required", "string"],
            "tonKho" => ['sometimes', "required", "numeric"],
            'namSX' => ['sometimes', 'required', 'string'],
            "giaNhap" => ['sometimes', "required", "numeric"],
            "giaBan" => ['sometimes', "required", "numeric"],
            "moTa" => ['sometimes', "required",'string', 'max:2000'],
            "baoHanh" => ['sometimes', 'required', 'string'],

            "tenSPmoi" => ['sometimes', "required",'string'],

            'sDT' => ['sometimes','required','numeric',"digits:10"],
            'ngaySinh' => ['sometimes','required','date'],
            'gender' => ['sometimes','required','string'],
        ];
    }

    public function messages()
    {
        return [
            'required' => "Trường này không được bỏ trống",
            "unique" => "Đã tồn tại!",

            'name.regex' =>  'Tên chỉ chứa các ký tự',
            'sDT.digits' => "Số điện thoại phải 10 số",

            'email.email'=> 'Sai định dạng email',
            'newEmail.unique' => 'Email đã tồn tại! Vui lòng chọn email khác',

            'img.mimes' => 'Ảnh phải có dạng: jpeg,png,jpg,gif,webp',
            'img.image' => "Vui lòng nhập file ảnh",
            'img.max' => "Ảnh có kích thước <5mb",

            'min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'current_password.current_password' => 'Mật khẩu hiện tại không đúng',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp',

            'numeric' => 'Vui long nhập số!',
            'date' => 'Vui lòng nhập theo thứ tự DD/MM/YY',
            "moTa.max" => "Vui lòng nhập dưới 2000 ký tự",
            "ghiChu.max" => "Vui lòng nhập dưới 20 ký tự",

            'nameDepartment.unique' => 'Khoa đã tồn tại!',
            'codeDepartment.unique' => 'Mã khoa đã tồn tại!',
            'nameSubject.unique' => 'Môn học đã tồn tại!',
            'nameGrade.unique' => 'Lớp đã tồn tại!',
            "phone.digits" => "Số điện thoại gồm 10 số"
        ];
    }
}
