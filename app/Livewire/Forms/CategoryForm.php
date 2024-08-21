<?php

namespace App\Livewire\Forms;

use App\Actions\Admin\Category\SaveCategory;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Redirector;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class CategoryForm extends Form
{
    use WithFileUploads;

    public String $name = '';

    public ?String $parent = '';

    public $image;

    public ?String $imagePath = '';

    public ?Category $category;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required | max:255 | min:3',
            'parent' => 'nullable',
            'image' => 'nullable | image',
        ];
    }

    /**
     * Updates or stores the category
     * @param Category $category
     */
    public function save(Category $category): void
    {
        $saveCategoryAction = new SaveCategory();
        $saveCategoryAction->handle($this->validate(), $category);

        to_route('admin_category_edit', $category);
    }
}
