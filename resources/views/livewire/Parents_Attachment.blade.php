@if($currentStep != 4)
    <div style="display: none;" class="row setup-content" id="step-4">
        @endif


        <div class="col-xs-12" style="background-color: #f8fafc;">
            <div class="col-md-12"><br>
                <h3 class="text-primary mb-3 mt-3 font-weight-bold">{{trans('main_trans.Attachments')}}</h3>
                <div class="form-group">
                    <input type="file" wire:model="photos" accept="image/*" multiple>
                </div>
                <br>

                @if($updateMode)
                    <table class="table center-aligned-table mb-0 table table-hover" style="text-align:center">
                        <thead>
                        <tr class="table-secondary">
                            <th scope="col">#</th>
                            <th scope="col">{{trans('main_trans.filename')}}</th>
                            <th scope="col">{{trans('main_trans.created_at')}}</th>
                            <th scope="col">{{trans('main_trans.Processes')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <input type="hidden" wire:model="Parent_id">
                        @foreach($Parent_images as $image)
                            <tr style='text-align:center;vertical-align:middle'>
                                <td>{{$loop->iteration}}</td>
                                <td><img class="card-img-top" src="{{URL::asset('attachments/parents/'.$GetParents->first()->National_ID_Father.'/'.$image->filename)}}" style="width: 140px;height: 103px;"></td>
                                <td>{{$image->created_at}}</td>
                                <td colspan="2">
                                    <button type="button" wire:click="delete_Photo({{ $image->id }})" class="btn btn-danger">{{ trans('main_trans.Delete') }}</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif




                <button class="btn btn-outline-danger pl-4 pr-4 mt-4 mb-3 font-weight-bold nextBtn " type="button" wire:click="BackBtn(3)">
                    {{trans('main_trans.Back')}}
                </button>

                @if($updateMode)
                    <button class="btn btn-outline-info pl-4 pr-4 mt-4 float-right font-weight-bold nextBtn pull-right"
                            wire:click="FourthStepSubmit_edit" type="button">{{trans('main_trans.Next')}}
                    </button>
                @else
                    <button class="btn btn-outline-info pl-4 pr-4 mt-4 float-right font-weight-bold nextBtn" type="button"
                            wire:click="FourthNextBtn">{{trans('main_trans.Next')}}
                    </button>
                @endif

            </div>
        </div>
    </div>
