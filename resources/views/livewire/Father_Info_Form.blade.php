@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
        @endif
        <div class="col-xl-12" style="background-color: #c7eed8;">
            <div class="col-md-12">
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title" class="text-dark font-weight-bold">{{trans('main_trans.Name_Father')}}</label>
                        <input type="text" wire:model="Name_Father" class="form-control" >
                        @error('Name_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title" class="text-dark font-weight-bold">{{trans('main_trans.Name_Father_en')}}</label>
                        <input type="text" wire:model="Name_Father_en" class="form-control" >
                        @error('Name_Father_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title" class="text-dark font-weight-bold">{{trans('main_trans.Job_Father')}}</label>
                        <input type="text" wire:model="Job_Father" class="form-control">
                        @error('Job_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="title" class="text-dark font-weight-bold">{{trans('main_trans.Job_Father_en')}}</label>
                        <input type="text" wire:model="Job_Father_en" class="form-control">
                        @error('Job_Father_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title" class="text-dark font-weight-bold">{{trans('main_trans.National_ID_Father')}}</label>
                        <input type="text" wire:model="National_ID_Father" class="form-control">
                        @error('National_ID_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title" class="text-dark font-weight-bold">{{trans('main_trans.Passport_ID_Father')}}</label>
                        <input type="text" wire:model="Passport_ID_Father" class="form-control">
                        @error('Passport_ID_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title" class="text-dark font-weight-bold">{{trans('main_trans.Phone_Father')}}</label>
                        <input type="text" wire:model="Phone_Father" class="form-control">
                        @error('Phone_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity" class="text-dark font-weight-bold">{{trans('main_trans.Nationality_Father_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Father_id">
                            <option selected>{{trans('main_trans.Choose')}}...</option>
                            @foreach($Nationalities as $National)
                                <option value="{{$National->id}}">{{$National->Name}}</option>
                            @endforeach
                        </select>
                        @error('Nationality_Father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState" class="text-dark font-weight-bold">{{trans('main_trans.Blood_Type_Father_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Type_Father_id">
                            <option selected>{{trans('main_trans.Choose')}}...</option>
                            @foreach($Type_Bloods as $Type_Blood)
                                <option value="{{$Type_Blood->id}}">{{$Type_Blood->Name}}</option>
                            @endforeach
                        </select>
                        @error('Blood_Type_Father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputZip" class="text-dark font-weight-bold">{{trans('main_trans.Religion_Father_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Father_id">
                            <option selected>{{trans('main_trans.Choose')}}...</option>
                            @foreach($Religions as $Religion)
                                <option value="{{$Religion->id}}">{{$Religion->Name}}</option>
                            @endforeach
                        </select>
                        @error('Religion_Father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="text-dark font-weight-bold">{{trans('main_trans.Address_Father')}}</label>
                    <textarea class="form-control" wire:model="Address_Father" id="exampleFormControlTextarea1" rows="4"></textarea>
                    @error('Address_Father')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-outline-danger pl-4 pr-4 mt-4 mb-3 font-weight-bold nextBtn " type="button" wire:click="BackBtn(1)">
                    {{trans('main_trans.Back')}}
                </button>

                @if($updateMode)
                    <button class="btn btn-outline-info pl-4 pr-4 mt-4 float-right font-weight-bold nextBtn pull-right"
                            wire:click="secondStepSubmit_edit" type="button">{{trans('main_trans.Next')}}
                    </button>
                @else
                    <button class="btn btn-outline-info pl-4 pr-4 mt-4 float-right font-weight-bold nextBtn" type="button"
                            wire:click="SecondNextBtn">{{trans('main_trans.Next')}}
                    </button>
                @endif

            </div>
        </div>
    </div>

