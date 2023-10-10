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
    <div class="mb-3">
        <label for="lt_type" class="form-label">Type</label>
        <select class="form-control" id="lt_type" rows="3" wire:model="lt.lt_type_id">
            @foreach(config('livewire-ticket.lt_type') as $key=>$value)
                <option value="{{$key}}">{{$value}}</option>
            @endforeach

        </select>
    </div>


    @if(isset($editing))
        <div class="row">
            <div class="col-6">
                @foreach($lt->lt_comments as $c)
                    <div class="card">
                        <div class="card-body">
                            <div class="card-text">
                                {{ $c->comment }}
                            </div>
                            <div class="card-footer">
                                {{ $c->user->email }}
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
            <div class="mb-3">
                <label for="lt_state" class="form-label">State</label>
                <select class="form-control" id="lt_state" rows="3" wire:model="lt.lt_state_id">
                    @foreach(config('livewire-ticket.lt_state') as $key=>$value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach

                </select>
            </div>
    @endif

    <button type="submit" wire:click="save" class="btn btn-success">Save</button>
    @endif
</div>