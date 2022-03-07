@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="col-xl-12">
            <div class="col-md-12">
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title" class="text-dark font-weight-bold">{{trans('main_trans.Email')}}</label>
                        <input type="email" wire:model="email" class="form-control">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title" class="text-dark font-weight-bold">{{trans('main_trans.Password')}}</label>
                        <input type="password" wire:model="password" class="form-control" >
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                @if($updateMode)
                    <button class="btn btn-outline-info pl-4 pr-4 mt-4 float-right font-weight-bold nextBtn pull-right" wire:click="firstStepSubmit_edit"
                            type="button">{{trans('main_trans.Next')}}
                    </button>
                @else
                    <button class="btn btn-outline-info pl-4 pr-4 mt-4 float-right font-weight-bold nextBtn pull-right" wire:click="FirstNextBtn"
                            type="button">{{trans('main_trans.Next')}}
                    </button>
                @endif

            </div>
        </div>
    </div>
