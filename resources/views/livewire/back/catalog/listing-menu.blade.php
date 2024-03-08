<div class="col-md-12">
    <div class="card">
        <div class="d-flex card-header align-items-center justify-content-between">
            <h5 class="mb-0">Menu Items</h5>

            <button type="button" class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="ti ti-plus me-2"></i> Add Menu Item </button>

        </div>

        <div class="card-body">
            <div class="row mb-4 collapse" id="collapseExample" wire:ignore.self>
                <div class="col-md-6">
                    <div class="row col ">
                        <div class="position-relative">
                            <ul class="nav nav-pills position-absolute langimg me-0 mb-2" id="menu-title-tab" role="tablist">
                                @foreach(ag_lang() as $lang)
                                    <li class="nav-item">
                                        <a class="btn btn-icon btn-sm btn-link-primary ms-2 @if ($lang->code == current_locale()) active @endif" id="menu-title-{{ $lang->code }}-tab" data-bs-toggle="pill" href="#menu-title-{{ $lang->code }}" role="tab" aria-controls="menu-title-{{ $lang->code }}" aria-selected="true">
                                            <img src="{{ asset('assets/flags/' . $lang->code . '.png') }}" />
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="tab-content" id="menu-title-tabContent">
                                @foreach(ag_lang() as $lang)
                                    <div class="tab-pane fade show @if ($lang->code == current_locale()) active @endif" id="menu-title-{{ $lang->code }}" role="tabpanel" aria-labelledby="menu-title-{{ $lang->code }}-tab">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="title-{{ $lang->code }}">Title @include('back.layouts.partials.required')</label>
                                                <input type="text" class="form-control" id="title-{{ $lang->code }}" wire:model="new_item.title.{{ $lang->code }}" placeholder="{{ $lang->code }}" />
                                            </div>

                                            <div class="col-12 mt-3">
                                                <label for="description-{{ $lang->code }}">Description</label>
                                                <textarea id="description-{{ $lang->code }}" class="form-control" rows="8" data-always-show="true" wire:model="new_item.description.{{ $lang->code }}" placeholder="{{ $lang->code }}" data-placement="top"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Group</label>
                        <select class="form-select" wire:model="new_item.group">
                            <option>Select...</option>
                            @foreach ($groups as $group)
                                <option value="{{ $group }}">{{ $group }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Or enter a new group</label>
                        <div class="input-group">
                            <input type="text" class="form-control" wire:model="new_group" placeholder="Left Button">
                            <button class="btn btn-outline-secondary" type="button" wire:click="addNewGroup()">Save</button>
                        </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-md-6">
                        <label for="title">Price</label>
                        <input type="text" class="form-control" wire:model="new_item.price" placeholder="..." />
                    </div>



                    <div class="form-group col-md-6">
                        <label for="title">Sort order</label>
                        <input type="text" class="form-control" wire:model="new_item.sort" placeholder="..." />
                    </div>
                    </div>


                    <div class="form-check form-switch custom-switch-v1 ">
                        <input type="checkbox" class="form-check-input input-success" id="status-swich" wire:model="new_item.status">
                        <label class="form-check-label" for="status-swich">Status</label>
                    </div>




                </div>

                <div class="col-md-12">
                    <button type="button" class="btn btn-info my-2" wire:click="addItem({{ $should_update }})">
                        {{ __('Save') }} <i class="ti ti-check ml-1"></i>
                    </button>
                    @if ($should_update)
                        <button data-bs-toggle="collapse" href="#collapseExample" type="button" class="btn btn-warning my-2" wire:click="cancelEdit()">
                            {{ __('Cancel Edit') }} <i class="ti ti-backspace ml-1"></i>
                        </button>
                    @endif
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">


                    @if ( ! empty($items))

                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">



                                    <thead class="thead-light">
                                    <tr>
                                        <th style="width: 80%;">{{ __('Title') }} </th>
                                        <th class="text-end">{{ __('Group') }}</th>
                                        <th class="text-end">{{ __('Price') }}</th>
                                        <th class="text-end">{{ __('Sort') }}</th>

                                        <th class="text-end">{{ __('Actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    @foreach ($items as $key => $item)
                                        <tr>
                                            <td>
                                                {{$item['title'][current_locale()]}}
                                            </td>
                                            <td>
                                                {{$item['group']}}
                                            </td>
                                            <td>
                                                {{$item['price']}}
                                            </td>
                                            <td>
                                                {{$item['sort']}}
                                            </td>

                                            <td class="text-end font-size-sm">

                                                <ul class="list-inline me-auto mb-0">

                                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                                                        <a data-bs-toggle="collapse" href="#collapseExample" wire:click="editItem({{ $key }})" class="avtar avtar-xs btn-link-danger btn-pc-default">
                                                            <i class="ti ti-edit-circle f-18"></i>
                                                        </a>
                                                    </li>

                                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                                                        <a wire:click="removeItem({{ $key }})" class="avtar avtar-xs btn-link-danger btn-pc-default">
                                                            <i class="ti ti-trash f-18"></i>
                                                        </a>
                                                    </li>
                                                </ul>



                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                        </div>
                    @endif

                </div>
            </div>

            <input type="hidden" name="menu" value="{{ json_encode($items) }}">
        </div>
    </div>
</div>

