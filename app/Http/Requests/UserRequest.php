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
            'name' =>  ['sometimes', "required",'string', 'regex:/^[^0-9]+$/'],
            'email' => ['sometimes', "required",'string','email'],
            'newEmail' => ['sometimes', "required",'string','email', Rule::unique('users', 'email'),],
            'role' => ['sometimes', "required", "string"],
            'img' => ['sometimes','mimes:jpeg,png,jpg,gif','image','max:5120'],
            'teacherId' => ['sometimes', "required", "string"],

            'current_password' => ['sometimes','required',"min:8", 'current_password'],
            'password' => ['sometimes','required', Password::defaults(),"min:8", 'confirmed'],
            'resetPass' => ['sometimes','required',Password::defaults(),"min:8"],

            'address' => ['sometimes','required','string'],
            'age' => ['sometimes','required','numeric'],
            'phone' => ['sometimes','required','numeric',"digits:10"],
            'dateOfBirth' => ['sometimes','required','date'],
            'gender' => ['sometimes','required','string'],

            'departmentId' => ['sometimes','required','numeric'],
            'gradeId' => ['sometimes','required','numeric'],
            "education" => ['sometimes','required','string'],

            'nameDepartment' => ['sometimes','required','string',Rule::unique('departments', 'name'),],
            'codeDepartment' => ['sometimes','required','string',Rule::unique('departments', 'code'),],
            'nameGrade' => ['sometimes','required','string',Rule::unique('grades', 'name'),],

            "nameSubject" => ['sometimes','required','string',Rule::unique('subjects', 'name'),],
            "creditUnit" =>['sometimes','required','numeric'],
            "lessonCount" => ['sometimes','required','numeric'],

            "fee_1_credit" => ['sometimes','required','numeric'],
            "description" => ['sometimes','required','string'],
            "day" => ['sometimes','required','string'],
            "dateStartStudy" => ['sometimes','required','date'],
            "dateEndStudy" => ['sometimes','required','date'],
        ];
    }

    public function messages()
    {
        return [
            'required' => "Trường này không được bỏ trống",

            'name.regex' =>  'Tên chỉ chứa các ký tự',

            'email.email'=> 'Sai định dạng email',
            'newEmail.unique' => 'Email đã tồn tại! Vui lòng chọn email khác',

            'img.mimes' => 'Ảnh phải có dạng: jpeg,png,jpg,gif',
            'img.image' => "Vui lòng nhập file ảnh",
            'img.max' => "Ảnh có kích thước <5mb",

            'min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'current_password.current_password' => 'Mật khẩu hiện tại không đúng',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp',

            'numberic' => 'Vui long nhập số!',
            'date' => 'Vui lòng nhập theo thứ tự DD/MM/YY',

            'nameDepartment.unique' => 'Khoa đã tồn tại!',
            'codeDepartment.unique' => 'Mã khoa đã tồn tại!',
            'nameSubject.unique' => 'Môn học đã tồn tại!',
            'nameGrade.unique' => 'Lớp đã tồn tại!',
            "phone.digits" => "Số điện thoại gồm 10 số"
        ];
    }
}
