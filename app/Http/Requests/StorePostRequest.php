<?php

namespace App\Http\Requests;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(request()->pinned === 'false') {
            request()->pinned = false;
        }
        return [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'slug' => ['string', 'max:255', Rule::unique(Post::class)],
            'user_id' => 'integer',
            'category_id' => 'integer',
            'thumbnail' => 'image',
            'status' => 'string',
            'views' => 'integer',
            'pinned' => 'boolean',
            'edited' => 'boolean'
        ];
    }
}
