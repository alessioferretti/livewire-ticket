<?php

namespace AlessioFerretti\LivewireTicket\Livewire;

use AlessioFerretti\LivewireTicket\Models\LtTicket;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class LtTicketTable extends DataTableComponent
{

    public string $editRouteName;
    public array $editParameters;
    public function builder(): Builder
    {
       return LtTicket::withCount('lt_comments');
    }

    public function mount($editRouteName='', $editParameters=[]){
         $this->editParameters=$editParameters;
         $this->editRouteName=$editRouteName;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),

            Column::make("Subject", "subject")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Created", "user.email")
                ->sortable(),
            Column::make("lt_type_id", "lt_type_id")
                ->hideIf(true)
                ->sortable(),
            Column::make("lt_state_id", "lt_state_id")
                ->hideIf(true)
                ->sortable(),
            Column::make("Type")
                ->label(
                    fn($row, Column $column) => config('livewire-ticket.lt_type')[$row->lt_type_id]
                )
                ->sortable(),

            Column::make("State")
                ->label(
                    fn($row, Column $column) => "<span style='color:".config('livewire-ticket.lt_state')[$row->lt_state_id]['color']."'>"
                        .config('livewire-ticket.lt_state')[$row->lt_state_id]['state'].
                        "</span>"
                )
                ->html()
                ->sortable(),
            Column::make("Comments")
                ->label(
                    fn($row, Column $column) =>$row['lt_comments_count']
                )
                ->html()
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),

            Column::make('Action')
                ->hideIf($this->editRouteName=='')
                ->label(fn($row) =>
                "<a href='".route($this->editRouteName, array_merge($row->toArray(),$this->editParameters))."' class='btn btn-primary btn-sm'>Edit</a>"
                )
            ->html()
            ,
        ];
    }
}
