<div>
    @if($done)
    <div class="mb-3 alert alert-success" role="alert">
        Ticket saved!
        @if(isset($editing))

            <div class="btn btn-sm btn-secondary" wire:click="continueEditing">Continue editing</div>
        @endif
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
            <div class="mb-3">
                <label for="lt_state" class="form-label">State</label>
                <select class="form-control" id="lt_state" rows="3" wire:model="lt.lt_state_id">
                    @foreach(config('livewire-ticket.lt_state') as $key=>$value)
                        <option value="{{$key}}">{{$value['state']}}</option>
                    @endforeach

                </select>
            </div>
    @endif
    <button type="submit" wire:click="save" class="btn btn-success">Save</button>
    <hr/>
    @if(isset($editing))
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Log</strong>
                </div>

                <ul class="list-group list-group-flush" >
                    @foreach($lt->lt_logs as $l)
                        <li class="list-group-item">
                            <strong>{{ $l->created_at }} - {{ $l->user->email }} </strong>
                            <br/>
                            <span style="color: {{ config('livewire-ticket.lt_state')[$l->lt_state_id]['color'] }}">
                            {{ config('livewire-ticket.lt_state')[$l->lt_state_id]['state'] }}
                        </span>
                            @if($l->log)
                                <br />
                                {{ $l->log }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

        <div class="card mb-3">
            <div class="card-header">
                <strong>Comment</strong>
            </div>
            <ul class="list-group list-group-flush" >
        @foreach($lt->lt_comments as $c)
                    <li class="list-group-item">
                        <strong>{{ $c->created_at }} - {{ $c->user->email }}</strong>
                        <br />
                        {{ $c->comment }}

                    </li>

        @endforeach
            </ul>
        <div class="card-body">
            <label for="newComment" class="form-label">Add Comment</label>
            <textarea class="form-control" id="newComment" rows="3" wire:model="newComment"></textarea>
            <button class="btn btn-primary mt-3" wire:click="addComment">Add Comment</button>
        </div>
        </div>




    @endif


    @endif
</div>