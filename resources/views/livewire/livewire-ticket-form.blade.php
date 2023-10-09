<div>
    @if($done)
    <div class="mb-3 alert alert-success" role="alert">
        Ticket saved!
    </div>
    @else
    <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" class="form-control" id="subject" placeholder="Subject of ticket" wire:model="lt.subject">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" rows="3" wire:model="lt.description"></textarea>
    </div>
    <button type="submit" wire:click="save" class="btn btn-success">Save</button>
    @endif
</div>