<button class="btn btn-outline-primary mb-3 btn-lg pull-right" wire:click="showformadd" type="button">{{ trans('main_trans.Add_Parent') }}</button>
<br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('main_trans.Email') }}</th>
            <th>{{ trans('main_trans.Name_Father') }}</th>
            <th>{{ trans('main_trans.Job_Father') }}</th>
            <th>{{ trans('main_trans.Name_Mother') }}</th>
            <th>{{ trans('main_trans.Job_Mother') }}</th>
            <th>{{ trans('main_trans.Phone_Father') }}</th>
            <th>{{ trans('main_trans.Processes') }}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0;?>
        @foreach ($my_parents as $my_parent)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $my_parent->email }}</td>
                <td>{{ $my_parent->Name_Father }}</td>
                <td>{{ $my_parent->Job_Father }}</td>
                <td>{{ $my_parent->Name_Mother }}</td>
                <td>{{ $my_parent->Job_Mother }}</td>
                <td>{{ $my_parent->Phone_Father }}</td>
                <td>
                    <button wire:click="edit({{ $my_parent->id }})" title="{{ trans('main_trans.Edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                    </button>
                    <button type="button" data-toggle="modal"
                            data-target="#delete{{ $my_parent->id }}"
                            class="btn btn-danger btn-sm" title="{{ trans('main_trans.Delete') }}"><i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>

            <!-- delete_modal_Sections -->
            <div class="modal fade"
                 id="delete{{ $my_parent->id }}"
                 tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;"
                                class="modal-title"
                                id="exampleModalLabel">
                                {{ trans('main_trans.delete_parents') }}
                            </h5>
                            <button type="button" class="close text-danger" data-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="font-weight-bold text-warning font-xxl">{{ trans('main_trans.Warning_Grade') }}</label>
                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
                                <button type="button" wire:click="delete({{ $my_parent->id }})" class="btn btn-danger">{{ trans('main_trans.Delete') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /End delete_modal_Sections -->

        @endforeach
    </table>

</div>

