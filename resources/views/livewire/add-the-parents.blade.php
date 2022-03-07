<div>
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif

    @if ($catchError)
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
                {{ $catchError }}
        </div>
    @endif

        @if($show_table)
            @include('livewire.Parent_Table')
        @else
            <button type="button" class="btn btn-outline-danger btn-lg font-weight-bold mt-3 mb-3" wire:click="BackToParentsTable">
                {{ trans('main_trans.BackToParentsTable') }}
            </button>

            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button"
                           class="btn btn-circle font-weight-bold {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                        <p class="font-weight-bold">{{ trans('main_trans.Step1') }}</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button"
                           class="btn btn-circle font-weight-bold {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                        <p class="font-weight-bold">{{ trans('main_trans.Step2') }}</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-3" type="button"
                           class="btn btn-circle font-weight-bold {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}">3</a>
                        <p class="font-weight-bold">{{ trans('main_trans.Step3') }}</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-4" type="button"
                           class="btn btn-circle font-weight-bold {{ $currentStep != 4 ? 'btn-default' : 'btn-success' }}">4</a>
                        <p class="font-weight-bold">{{ trans('main_trans.Step4') }}</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-5" type="button"
                           class="btn btn-circle font-weight-bold {{ $currentStep != 5 ? 'btn-default' : 'btn-success' }}"
                           disabled="disabled">5</a>
                        <p class="font-weight-bold">{{ trans('main_trans.Step5') }}</p>
                    </div>
                </div>
            </div>


    @include('livewire.Email_Info_Form')

    @include('livewire.Father_Info_Form')

    @include('livewire.Mother_Info_Form')

    @include('livewire.Parents_Attachment')


        <div class="row setup-content bg-dark {{ $currentStep != 5 ? 'displayNone' : '' }}" id="step-5">
            @if ($currentStep != 5)
                <div style="display: none" class="row setup-content" id="step-5">
                    @endif
                    <div class="col-xl-12 text-center mt-5 mb-5">
                        <div class="col-md-12">
                            <h3 class="text-white" style="font-family: 'Cairo', sans-serif;">{{ trans('main_trans.MassesConform') }}</h3><br>

                            <input type="hidden" wire:model="Parent_id">

                            <button class="btn btn-outline-danger mt-2 pl-4 pr-4 m-1 font-weight-bold nextBtn " type="button"
                                    wire:click="BackBtn(4)">{{ trans('main_trans.Back') }}</button>

                            @if($updateMode)
                                <button class="btn btn-outline-info mt-1 pl-4 pr-4 font-weight-bold "
                                        wire:click="submitForm_edit" type="button">{{trans('main_trans.Finish')}}
                                </button>
                            @else
                                <button class="btn btn-outline-info mt-1 pl-4 pr-4 font-weight-bold " type="button"
                                        wire:click="submitForm">{{ trans('main_trans.Finish') }}
                                </button>
                            @endif

                        </div>
                    </div>
                </div>
        </div>


      @endif





</div>
