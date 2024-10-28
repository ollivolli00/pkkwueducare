<html>
 <head>
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-gray-100">
  <div class="flex">
   <!-- Sidebar -->
   <div class="w-1/5 bg-gray-200 h-[calc(100vh+800px)] flex flex-col items-center py-8">
    <div class="flex items-center mb-8">
     <img alt="Educare Logo" class="mr-2" height="40" src="img/logo.png" width="200"/>
    </div>
    <div class="flex flex-col items-center mb-8">
     <img alt="User Avatar" class="rounded-full mb-2" height="80" src="https://storage.googleapis.com/a1aa/image/ERQpynA4VbbrDVqqueT7TXE3RbEYCHyk4K5zrItCv4JNeOlTA.jpg" width="80"/>
    
     <span class="font-semibold">
     {{ $dataPerusahaan->namaperusahaan ?? 'Nama Perusahaan Tidak Tersedia' }}
</span>
<span class="text-gray-500">
{{ $dataPerusahaan->emailperusahaan ?? 'Email Perusahaan Tidak Tersedia' }}
</span>
    </div>
    <div class="w-full">
     <div class="flex items-center w-full py-4 px-6 bg-gray-400 text-white">
     <a class="flex items-center w-full py-4 px-6" href={{'dashboard'}}> 
     <i class="fas fa-upload mr-2">
      </i>
      <span>
       Upload
      </span>
     </a>
     </div>
     <div class="flex items-center w-full py-4 px-6">
     <a class="flex items-center w-full py-4 px-6" href={{'uplist'}}>
     <i class="fas fa-list mr-2">
      </i>
      <span>
       Uploaded List
      </span>
     </a>
      </div>
     <div class="flex items-center w-full py-4 px-6">
     <a class="flex items-center w-full py-4 px-6" href={{'applist-1'}}>
      <i class="fas fa-users mr-2">
      </i>
      <span>
       Applicants List
      </span>
      </a>
     </div>
    <div class="mt-auto mb-8">
     <div class="flex items-center w-full py-4 px-6">
     <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="flex items-center w-full py-4 px-6">
            <i class="fas fa-sign-out-alt mr-2"></i>
            <span>Log Out</span>
        </button>
    </form>
      </div>
     </div>
    </div>
   </div>
   <!-- Main Content -->
   <div class="w-4/5 p-8">
   <div class="bg-gray-300 h-40 flex justify-center items-center mb-8" style="max-width: 100%; max-height: 100%">
  <label class="cursor-pointer w-full h-full flex justify-center items-center relative">
    <i id="icon1" class="fas fa-plus text-4xl text-gray-500"></i>
    <input class="hidden" id="fileInput1" onchange="handleFileUpload(event, 'preview1', 'icon1', 'changeButton1')" type="file"/>
  </label>
  <img alt="File Preview" class="hidden relative w-full h-full object-cover" id="preview1" style="max-width: 100%; max-height: 100%; min-width: 100%; min-height: 100%; border-radius: 10px; object-fit: cover; object-position: center;">
  <button id="changeButton1" class="hidden absolute top-2 right-2 bg-white text-gray-800 px-3 py-1 text-sm rounded hover:bg-gray-100" onclick="triggerFileInput('fileInput1')">Change File</button>
</div>
    <div class="flex mb-8">
    <div class="w-1/4 flex justify-center items-center border-2 border-gray-400 relative">
  <label class="cursor-pointer w-full h-full flex justify-center items-center relative">
    <i id="icon2" class="fas fa-plus text-4xl text-gray-500 absolute"></i>
    <input class="hidden" id="fileInput2" onchange="handleFileUpload(event, 'preview2', 'icon2', 'changeButton2')" type="file"/>
  </label>
  <img alt="File Preview" class="hidden absolute top-0 left-0 w-full h-full object-cover" id="preview2" style="max-width: 100%; max-height: 100%; min-width: 100%; min-height: 100%; object-fit: cover; object-position: center;">
  <!-- Add a "Change File" button -->
  <button id="changeButton2" class="hidden absolute top-2 right-2 bg-white text-gray-800 px-3 py-1 text-sm rounded hover:bg-gray-100" onclick="triggerFileInput('fileInput1')">Change File</button>
</div>
     <div class="w-3/4 flex flex-col justify-center pl-4">
      <input class="border-2 border-gray-400 p-2 mb-2" placeholder="Add Your Title" type="text"/>
      <input class="border-2 border-gray-400 p-2 mb-2" placeholder="Add Your Company Name" type="text"/>
      <input class="border-2 border-gray-400 p-2" placeholder="Add Your Deadline" type="text"/>
     </div>
    </div>
    <div class="flex mb-8">
     <div class="w-1/4 flex flex-col justify-center items-center border-2 border-gray-400 p-2">
      <i class="fas fa-pencil-alt mb-2">
      </i>
      <input class="border-2 border-gray-400 p-2 mb-2" placeholder="Add Your Requirements" type="text"/>
      <textarea class="border-2 border-gray-400 p-2" placeholder="Add Your Description"></textarea>
     </div>
     <div class="w-1/4 flex justify-center items-center border-2 border-gray-400 ml-4">
      <i class="fas fa-plus">
      </i>
     </div>
    </div>
    <div class="flex flex-col mb-8">
     <input class="border-2 border-gray-400 p-2 mb-2" placeholder="Add Your Title" type="text"/>
     <textarea class="border-2 border-gray-400 p-2" placeholder="Add Your Description"></textarea>
    </div>
    <div class="flex flex-col mb-8">
     <span class="text-gray-500 mb-2">
      (optional)
     </span>
     <div class="flex">
      <div class="w-1/4 flex flex-col justify-center items-center border-2 border-gray-400 p-2">
       <i class="fas fa-pencil-alt mb-2">
       </i>
       <textarea class="border-2 border-gray-400 p-2" placeholder="Add Your Description"></textarea>
      </div>
      <div class="w-1/4 flex justify-center items-center border-2 border-gray-400 ml-4">
       <i class="fas fa-plus">
       </i>
      </div>
     </div>
    </div>
    <div class="flex flex-col mb-8">
     <input class="border-2 border-gray-400 p-2 mb-2" placeholder="Add The Title of Your Scholarship Benefits" type="text"/>
     <div class="flex">
      <div class="w-1/4 flex flex-col justify-center items-center border-2 border-gray-400 p-2">
       <img alt="Upload Placeholder" class="h-20 w-20 mb-2" height="80" src="https://storage.googleapis.com/a1aa/image/Vkbk97mLl5quBVCQDiq1wN7NzRLvdAo1uCFgFKo5FHEHvT5E.jpg" width="80"/>
       <textarea class="border-2 border-gray-400 p-2" placeholder="Add Description"></textarea>
      </div>
      <div class="w-1/4 flex justify-center items-center border-2 border-gray-400 ml-4">
       <i class="fas fa-plus">
       </i>
      </div>
     </div>
    </div>
    <div class="flex justify-center">
     <button class="bg-blue-200 text-white py-2 px-8 rounded-full">
      DAFTAR
     </button>
    </div>
   </div>
  </div>
  <script>
  function handleFileUpload(event, previewId, iconId, changeButtonId) {
  const fileInput = event.target;
  const file = fileInput.files[0];
  const reader = new FileReader();
  reader.onload = function(event) {
    const previewImage = document.getElementById(previewId);
    const changeButton = document.getElementById(changeButtonId);
    const icon = document.getElementById(iconId);

    previewImage.src = event.target.result;
    previewImage.classList.remove('hidden');
    icon.classList.add('hidden');

    // Create the "Change File" button dynamically
    const changeFileButton = document.createElement('button');
    changeFileButton.textContent = 'Change File';
    changeFileButton.className = 'absolute top-2 right-2 bg-white text-gray-800 px-3 py-1 text-sm rounded hover:bg-gray-100';
    changeFileButton.addEventListener('click', function() {
      document.getElementById(fileInput.id).click(); // Simulate a click on the hidden file input
    });

    // Add the "Change File" button to the preview container
    previewImage.parentNode.appendChild(changeFileButton);
    // Adjust the width of the preview image to match the container width
    const containerWidth = previewImage.parentNode.offsetWidth;
    previewImage.style.width = `${containerWidth}px`;
    previewImage.style.height = 'auto'; // maintain aspect ratio
  };
  reader.readAsDataURL(file);
}
</script>

 </body>
</html>
