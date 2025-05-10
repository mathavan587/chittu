<div class="max-w-3xl mx-auto bg-white p-8 rounded shadow mt-10">
  <h2 class="text-2xl font-bold mb-6 text-purple-700 flex items-center gap-2">
    <i class="fas fa-file-alt"></i> <?= isset($term) ? 'Edit' : 'Add' ?> Terms
  </h2>

  <form method="post" action="<?= isset($term) ? base_url('terms/update/' . $term->id) : base_url('terms/store') ?>" class="space-y-6">
    <div>
      <label class="block mb-1">Title</label>
      <input type="text" name="title" class="w-full border rounded px-4 py-2"
        value="<?= isset($term) ? htmlspecialchars($term->title) : '' ?>" required>
    </div>

    <div>
      <label class="block mb-1">Content</label>
      <textarea name="content" rows="6" class="w-full border rounded px-4 py-2" required><?= isset($term) ? htmlspecialchars($term->content) : '' ?></textarea>
    </div>

    <div class="text-right">
      <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded">
        <i class="fas fa-save"></i> <?= isset($term) ? 'Update' : 'Create' ?>
      </button>
    </div>
  </form>
</div>