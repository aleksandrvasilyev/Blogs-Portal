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
//        dd($this->route('post')->id);
//        $post = $this->route('post');
        $post = Post::find($this->route('post')->id);
//        dd($post);
        return $post && $post->author->id == auth()->id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
//        dd(request()['pinned']);
//        request()['pinned'] = filter_var(request()['pinned'], FILTER_VALIDATE_BOOLEAN);

        return [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'thumbnail' => 'image',
            'slug' => ['string', 'max:255', Rule::unique(Post::class)->ignore($this->id)],
            'user_id' => 'integer',
            'category_id' => 'integer',
            'status' => 'string',
            'views' => 'integer',
            'pinned' => 'boolean',
            'edited' => 'boolean'
        ];
    }
}
