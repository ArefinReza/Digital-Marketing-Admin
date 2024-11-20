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
    <h1 class="text-xl font-semibold mb-4" id="edit">Edit Project</h1>
    
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        
        <div>
            <label for="title" class="block font-medium">Title:</label>
            <input type="text" name="title" id="title" value="{{ $project->title }}" required style="background-color: #1C3C3F; color: #F8F8F8; border: none; padding: 10px;">
        </div>

        <div>
            <label for="description" class="block font-medium text-[#F8F8F8]">Description:</label>
            <textarea name="description" id="description" required style="background-color: #1C3C3F; color: #F8F8F8; border: none; padding: 10px; width: 100%;">{{ $project->description }}</textarea>
        </div>
        
        <div id="imageContainer" class="space-y-2">
            <label class="block font-medium text-[#F8F8F8]">Current Images:</label>
            @if(is_array($project->images))
                @foreach ($project->images as $image)
                    <div class="image-input flex items-center space-x-2">
                        <img src="{{ asset('storage/' . $image) }}" width="80" alt="Project Image" class="project-image">
                        <button type="button" class="remove-image p-1 text-white bg-[#F58800] rounded hover:bg-[#051821]">✕</button>
                        <input type="hidden" name="removed_images" id="removedImages" value="[]">

                        
                    </div>
                @endforeach
            @endif
        </div>

        <div>
            <label for="images" class="block font-medium text-[#F8F8F8]">Upload New Images:</label>
            <input type="file" name="images[]" multiple class="block w-full text-white mt-1 bg-[#1C3C3F] p-2 rounded">
        </div>
        
        <button type="button" id="addImage" class="mt-2 p-2 bg-[#F58800] text-white rounded hover:bg-[#051821]">Add Another Image</button>
        <button type="submit" class="mt-4 p-2 bg-[#F58800] text-white rounded hover:bg-[#051821]">Update</button>
    </form>
</div>

<script>
    const removedImages = [];

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

    // Existing images remove functionality
    document.querySelectorAll('.remove-image').forEach(button => {
    button.addEventListener('click', function () {
        const imageUrl = button.previousElementSibling.src; // Get image URL
        button.parentElement.remove(); // Remove the image preview from the DOM

        // Add removed image URL to the hidden input
        const removedImagesField = document.getElementById('removedImages');
        const removedImages = JSON.parse(removedImagesField.value); // Parse current value
        removedImages.push(imageUrl); // Add the URL of the removed image
        removedImagesField.value = JSON.stringify(removedImages); // Update the field value
    });


    });
</script>

@endsection
