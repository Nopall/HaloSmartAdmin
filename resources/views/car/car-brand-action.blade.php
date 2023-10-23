<div>
    <button class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span> Edit</button>
    <button id="btn-delete-brand" class="btn btn-sm btn-danger" onclick="deleteById({{ $id }})">
        <div id="loading-indicator" class="spinner-border spinner-border-sm text-default d-none" role="status"></div>
        <span class="fa fa-trash"></span>
        Delete
    </button>
</div>
