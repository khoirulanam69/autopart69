<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let deleteModal = document.getElementById('deleteModal');
            let confirmDelete = document.getElementById('confirmDelete');
            let formToDelete;

            deleteModal.addEventListener('show.bs.modal', function(event) {
                let button = event.relatedTarget;
                let orderId = button.getAttribute('data-id');
                formToDelete = document.getElementById('deleteForm' + orderId);
            });

            confirmDelete.addEventListener('click', function() {
                formToDelete.submit();
            });
        });
    </script>
@endpush
