<div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">

                    <h4>Create new payment</h4>


                    <div class="card-header-action">

                        @if ($go_all_payment_page == false)
                        <a href="#" wire:click="go_all_payment_page" class="btn btn-primary">
                            View All
                        </a>
                        @endif

                        @if ($goto_create_page == false)

                        <a href="#" wire:click="go_create_page" class="btn btn-primary">
                            create page
                        </a>
                        @endif

                        @if ($goto_in_activate_page == false)

                        <a href="#" wire:click="go_in_activate_page" class="btn btn-primary">
                            In-active page
                        </a>
                        @endif
                    </div>
                </div> --}}


                        @if ($goto_user_page == true)

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">

                                    <div class="card-header">
                                        <h4>Category</h4>
                                        <div class="card-header-form">
                                            <form>
                                                <div class="input-group">
                                                    <input type="text" wire:model="search" class="form-control"
                                                        placeholder="Search">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-primary"><i
                                                                class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class=" p-0">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tr>

                                                    <th> User name </th>
                                                    <th> phone</th>
                                                    <th> Coupanes</th>
                                                    <th>create</th>
                                                    <th>Add a Coupane</th>
                                                </tr>
                                                @foreach($users as $user)

                                                <tr>
                                                    {{-- <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                wire:change="addToPopular({{$category->id  }})"
                                                    @if (!empty($category->popular == true)) checked @endif

                                                    class="custom-control-input" id="checkbox-{{ $category->id }}">
                                                    <label for="checkbox-{{ $category->id }}"
                                                        class="custom-control-label">&nbsp;</label>
                                        </div>
                                        </td> --}}

                                        <td>
                                            <span>{{ $user->name }}</span>

                                        </td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            <span class="text-danger bold">{{ $user->coupanes->count() }}</span>
                                        </td>

                                        <td>{{ $user->created_at->diffForHumans() }}</td>

                                        <td><a href="#" wire:click="addCoineToUser({{ $user->id }})"
                                                class="btn btn-primary">Add
                                                Coupane</a></td>



                                        {{-- <td><a href="#" class="btn btn-primary">In active</a></td> --}}
                                        </tr>

                                        @endforeach

                                        </table>
                                        {{ $users->links() }}
                                    </div>
                                </div>

                            </div>
                        </div>
                        @elseif($addCoinToUser_page == true)
                        @livewire('admin.userwithcoupane.add-coupane-to-user')

                        @endif
                    </div>


                </div>
            </div>
        

</div>
