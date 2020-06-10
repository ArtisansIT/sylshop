<div>
    {{-- Be like water. --}}
    <div class="row">
        <div class="col-12">
           
            <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center">
                      #
                    </th>
                    <th> Name</th>
                    <th>Picture</th>
                    <th>Created_at</th>
                    <th>Edit</th>
                    <th>image update</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categorys as $category)
                        
                    <tr>
                      <td>
                        {{ $loop->index+1 }}
                      </td>
                      <td>{{ $category->name }}</td>
                      <td>
                        @if (isset($category->image->url))
                            
                        <img alt="image" src="{{ asset('images/'.$category->image->url) }}" width="35">
                        @endif
                      </td>
                      <td>{{ $category->created_at->diffForHumans() }}</td>
                      <td><a href="#" 
                        onclick="updatePrompt('{{ $category->name }}') || event.stopImmediatePropagation()"
                        wire:click="updateTitle({{ $category->id }}, newTitle)"
                        class="btn btn-primary">Edit</a></td>
                      <td><a href="#" 
                       
                        wire:click="updateImage({{ $category->id }})"
                        class="btn btn-primary">Update Image</a></td>
                      <td><a href="#"
                        onclick="confirm('Are you want To delete') || event.stopImmediatePropagation()"
                        wire:click="deleteCategory({{ $category->id }})"
                        class="btn btn-primary">Delete</a></td>
                    </tr>
                    @endforeach
                   
                </tbody>
              </table>

                           

        </div>
    </div>

    


    <script>
    let newTitle = '';
    function updatePrompt(title){
        event.preventDefault();
        newTitle ='';
        const todo = prompt('Update Title' , title);
        if(todo === null || todo.trim() === ''){
            newTitle = '';
            return false;
        }
        newTitle = todo;
        return true;
    }
    </script>
</div>

