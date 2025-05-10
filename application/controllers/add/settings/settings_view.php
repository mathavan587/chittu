

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>


    <button id="addBtn" class="bg-green-500 text-white px-4 py-2 rounded mb-4">Add Setting</button>

    <table id="settingsTable" class="display w-full">
        <thead>
            <tr>
                <th>ID</th>
                <th>Categories</th>
                <th>Link</th>
                <th>File</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>

    <script>
    $(document).ready(function () {
        const table = $('#settingsTable').DataTable({
            ajax: {
                url: '<?= base_url('settings/get_settings') ?>',
                dataSrc: 'data'
            },
            columns: [
                { data: 'id' },
                { data: 'categories' },
                { data: 'link' },
                {
                    data: 'file_name',
                    render: function(data) {
                        return data ? `<a href="<?= base_url('uploads/') ?>${data}" target="_blank" class="text-blue-600 underline">Download</a>` : '—';
                    }
                },
                {
                    data: null,
                    render: function (row) {
                        return `
                            <button class="editBtn text-blue-600" data-id="${row.id}"><i class="fas fa-edit"></i></button>
                            <button class="deleteBtn text-red-600 ml-2" data-id="${row.id}"><i class="fas fa-trash-alt"></i></button>
                        `;
                    }
                }
            ]
        });

        $('#addBtn').click(function () {
            Swal.fire({
                title: 'Add Setting',
                html: `
                    <label class="block text-left mb-1 font-medium">Categories <span class="text-red-500">*</span></label>
                    <input id="swal-categories" class="swal2-input" placeholder="Categories">
                    <label class="block text-left mb-1 font-medium mt-3">Link <span class="text-red-500">*</span></label>
                    <input id="swal-link" class="swal2-input" placeholder="Link">
                    <label class="block text-left mb-1 font-medium mt-3">Upload File</label>
                    <input type="file" id="swal-file" class="swal2-file">
                `,
                showCancelButton: true,
                confirmButtonText: 'Save',
                preConfirm: () => {
                    const categories = $('#swal-categories').val().trim();
                    const link = $('#swal-link').val().trim();
                    const file = $('#swal-file')[0].files[0];

                    if (!categories || !link) {
                        Swal.showValidationMessage('Both Categories and Link are required');
                        return false;
                    }

                    const formData = new FormData();
                    formData.append('categories', categories);
                    formData.append('link', link);
                    if (file) formData.append('file', file);

                    return fetch('<?= base_url('settings/save') ?>', {
                        method: 'POST',
                        body: formData
                    }).then(response => {
                        if (!response.ok) throw new Error('Network error');
                        return response.json();
                    }).catch(() => {
                        Swal.showValidationMessage('Upload failed');
                    });
                }
            }).then(result => {
                if (result.isConfirmed) {
                    Swal.fire('Success!', 'Setting saved.', 'success');
                    table.ajax.reload();
                }
            });
        });

        $('#settingsTable').on('click', '.editBtn', function () {
            const id = $(this).data('id');

            $.getJSON('<?= base_url('settings/edit/') ?>' + id, function (data) {
                Swal.fire({
                    title: 'Edit Setting',
                    html: `
                        <input type="hidden" id="swal-id" value="${data.id}">
                        <label class="block text-left mb-1 font-medium">Categories</label>
                        <input id="swal-categories" class="swal2-input" value="${data.categories}">
                        <label class="block text-left mb-1 font-medium mt-3">Link</label>
                        <input id="swal-link" class="swal2-input" value="${data.link}">
                        <label class="block text-left mb-1 font-medium mt-3">Upload New File</label>
                        <input type="file" id="swal-file" class="swal2-file">
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Update',
                    preConfirm: () => {
                        const id = $('#swal-id').val();
                        const categories = $('#swal-categories').val().trim();
                        const link = $('#swal-link').val().trim();
                        const file = $('#swal-file')[0].files[0];

                        if (!categories || !link) {
                            Swal.showValidationMessage('Both fields are required');
                            return false;
                        }

                        const formData = new FormData();
                        formData.append('id', id);
                        formData.append('categories', categories);
                        formData.append('link', link);
                        if (file) formData.append('file', file);

                        return fetch('<?= base_url('settings/save') ?>', {
                            method: 'POST',
                            body: formData
                        }).then(response => {
                            if (!response.ok) throw new Error('Network error');
                            return response.json();
                        }).catch(() => {
                            Swal.showValidationMessage('Update failed');
                        });
                    }
                }).then(result => {
                    if (result.isConfirmed) {
                        Swal.fire('Updated!', 'Setting updated successfully.', 'success');
                        table.ajax.reload();
                    }
                });
            });
        });

        $('#settingsTable').on('click', '.deleteBtn', function () {
            const id = $(this).data('id');
            Swal.fire({
                title: 'Delete?',
                text: 'This action cannot be undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                if (result.isConfirmed) {
                    $.get('<?= base_url('settings/delete/') ?>' + id, function () {
                        table.ajax.reload();
                        Swal.fire('Deleted!', '', 'success');
                    });
                }
            });
        });
    });
    </script>
