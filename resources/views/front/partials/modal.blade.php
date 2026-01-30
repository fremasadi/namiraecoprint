{{-- resources/views/front/partials/modal.blade.php --}}

<div class="modal" id="modal">
    <div class="modal-content">
        <button class="close-modal" onclick="closeModal()">&times;</button>

        <div class="modal-body">
            {{-- Modal Image --}}
            <div class="modal-image-container">
                <img id="modalImage" src="" alt="" class="modal-image">
            </div>

            {{-- Modal Text Content --}}
            <div class="modal-text-container">
                <h2 class="modal-title" id="modalTitle"></h2>
                <div class="modal-description" id="modalDescription"></div>
            </div>
        </div>
    </div>
</div>
