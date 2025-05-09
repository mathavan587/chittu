<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<!-- Form Container -->
<div class="max-w-3xl mx-auto bg-white p-8 rounded shadow mt-10">
  <h2 class="text-2xl font-bold mb-6 flex items-center gap-2 text-purple-700">
    <i class="fas fa-pen-nib"></i>
    <?= isset($blog) ? 'Edit Blog' : 'Add Blog' ?>
  </h2>

  <form method="post" 
        action="<?= isset($blog) ? base_url('blog/update/' . $blog->id) : base_url('blog/store') ?>" 
        enctype="multipart/form-data"
        class="space-y-6">
    
    <!-- Title -->
    <div>
      <label class="block mb-1 font-medium text-gray-700">
        <i class="fas fa-heading mr-1 text-gray-500"></i> Title
      </label>
      <input type="text" name="title" required
             value="<?= isset($blog) ? htmlspecialchars($blog->title) : '' ?>"
             class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-purple-500 focus:outline-none" />
    </div>

    <!-- Content -->
    <div>
      <label class="block mb-1 font-medium text-gray-700">
        <i class="fas fa-align-left mr-1 text-gray-500"></i> Content
      </label>
      <textarea name="content" rows="6"
                class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-purple-500 focus:outline-none"><?= isset($blog) ? htmlspecialchars($blog->content) : '' ?></textarea>
    </div>

    <!-- Image Upload -->
    <div>
      <label class="block mb-1 font-medium text-gray-700">
        <i class="fas fa-image mr-1 text-gray-500"></i> Blog Image
      </label>
      <input type="file" name="image" accept="image/*"
             class="w-full border border-gray-300 rounded px-4 py-2 file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:bg-purple-100 file:text-purple-700 hover:file:bg-purple-200" />
      
      <?php if (!empty($blog->image)): ?>
        <div class="mt-2">
          <img src="<?= base_url('uploads/blogs/' . $blog->image) ?>" alt="Blog Image" class="w-32 rounded shadow">
        </div>
      <?php endif; ?>
    </div>

    <!-- Submit Button -->
    <div class="text-right">
      <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded shadow inline-flex items-center">
        <i class="fas fa-save mr-2"></i>
        <?= isset($blog) ? 'Update Blog' : 'Create Blog' ?>
      </button>
    </div>

  </form>
</div>
