<div>
    @php
        $i = 1;
    @endphp
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap mb-0">
                <thead>
                    <tr>
                        <th>Ordre</th>
                        <th>Nom</th>
                        <th>Date d'ajout</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menusOperateurs as $menuOpera)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>
                           
                        </td>
                        
                        <td>
                            <button style="border: unset!important;" wire:click="delete({{$menuOpera->id}})"> <i class="fa fa-trash text-danger"></i> </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div wire:loading wire:target="delete">
            <div id="loading" class="">
                <div class="loading"></div>
              </div>
        </div>
</div>
    