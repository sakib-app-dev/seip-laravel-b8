<x-master>
    <x-slot:title>
        Category Details
    </x-slot:title>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Category Edit</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Export PDF</button>
            </div>
            <a href="{{ route('categories.index') }}">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span data-feather="list"></span>
                    List
                </button>
            </a>
        </div>
    </div>

    <x-forms.errors />

    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="nameInput" class="form-label">Title</label>
          
            <input 
            name="name" 
            type="text" 
            class="form-control" 
            id="nameInput" 
            value="{{ old('name', $category->name) }}"
            >

            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
            
        </div>
        
        <div class="mb-3 form-check">
            <input 
            name="is_active" 
            type="checkbox" 
            class="form-check-input" 
            id="isActiveInput"
            @if($category->is_active) checked @endif
            >
            <label class="form-check-label" for="isActiveInput">Is Active ?</label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</x-master>