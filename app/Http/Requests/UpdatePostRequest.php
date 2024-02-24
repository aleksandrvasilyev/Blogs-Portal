<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(!Post::where('user_id', auth()->user()->id)->where('id', request()->id)->firstOrFail()) {
            return false;
        }

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
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'slug' => ['required', 'string', 'max:255', Rule::unique(Post::class)->ignore($this->id)],
            'user_id' => 'integer',
            'category_id' => 'integer',
            'status' => 'string',
            'views' => 'integer',
            'pinned' => 'boolean',
            'edited' => 'boolean'
        ];
    }
}
