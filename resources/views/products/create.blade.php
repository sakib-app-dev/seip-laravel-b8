<x-master>
    <x-slot:title>
        Product Create
    </x-slot>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product Create</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('categories.index') }}">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span data-feather="list"></span>
                    List
                </button>
            </a>
        </div>
    </div>

    <x-forms.errors />

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <x-forms.select name="category_id" label="Category" :options="$categories" :selected="old('category_id')" required/>

        <x-forms.input type="text" name="title" label="Title" :value="old('title')" required placeholder="Enter name" />

        <x-forms.input type="file" name="image" label="Image"/>

        {{-- select, checkbox, radio, texarea --}}

        <x-forms.textarea name="description" :value="old('description')" label="Description" />

        <div class="mb-3 form-check">
            <input name="is_active" type="checkbox" class="form-check-input" id="isActiveInput">
            <label class="form-check-label" for="isActiveInput">Is Active ?</label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</x-master>