@extends('dashboard')

@section('admin-content')
<head>
<style>
        .container{
            max-width: 100%;
            background-color: #266867; 
            border-radius: 8px; 
            max-width: 100%;
            color: #F8F8F8;
        }
        input{
            background-color: #1C3C3F;
             color: #F8F8F8; 
             border: none; 
             padding: 10px;
        }
        h1{
            color: #F8F8F8;
        }
        #edit {
    color: #F8F8F8;
}
    </style>
</head>
<div class="container">

    <h1 class="text-xl font-semibold text-[#266867] mb-4" id="edit">Create New Project</h1>
    
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label for="title" class="block font-medium text-[#F8F8F8]">Title:</label>
        <input type="text" name="title" id="title" required style="background-color: #1C3C3F; color: #F8F8F8; border: none; padding: 10px;">
    </div>

    <div>
        <label for="description" class="block font-medium text-[#266867]">Description:</label>
        <textarea name="description" id="description" required style="background-color: #1C3C3F; color: #F8F8F8; border: none; padding: 10px; width: 100%;"></textarea>
    </div>

    <div id="imageContainer" class="space-y-2">
        <label class="block font-medium text-[#266867]">Images:</label>
        <div class="image-input flex items-center space-x-2">
            <input type="file" name="images[]" required accept="image/*" style="background-color: #1C3C3F; color: #F8F8F8; border: none; padding: 10px;">
            <button type="button" class="remove-image p-1 text-white bg-[#F58800] rounded hover:bg-[#051821]">✕</button>
        </div>
    </div>

    <button type="button" id="addImage" class="mt-2 p-2 bg-[#F58800] text-white rounded hover:bg-[#051821]">Add Another Image</button>
    <button type="submit" class="mt-4 p-2 bg-[#F58800] text-white rounded hover:bg-[#051821]">Create</button>
</form>
</div>

<script>
    document.getElementById('addImage').addEventListener('click', function () {
        const imageContainer = document.getElementById('imageContainer');
        
        const newImageInput = document.createElement('div');
        newImageInput.classList.add('image-input', 'flex', 'items-center', 'space-x-2');
        newImageInput.innerHTML = `
            <input type="file" name="images[]" accept="image/*" required style="background-color: #1C3C3F; color: #F8F8F8; border: none; padding: 10px;">
            <button type="button" class="remove-image p-1 text-white bg-[#F58800] rounded hover:bg-[#051821]">✕</button>
        `;

        imageContainer.appendChild(newImageInput);

        // Add event listener to remove button
        newImageInput.querySelector('.remove-image').addEventListener('click', function () {
            newImageInput.remove();
        });
    });

    // Add remove functionality to initial remove button
    document.querySelectorAll('.remove-image').forEach(button => {
        button.addEventListener('click', function () {
            button.parentElement.remove();
        });
    });
</script>
@endsection
